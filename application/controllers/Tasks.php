<?php
	class Tasks extends CI_Controller{

		function __construct() {
	    	parent::__construct();

            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }
	  	}

		public function index(){

			$data['title'] = 'Homepage';
			$data['tasks'] = $this->tasks_model->get_tasks();

			$this->load->view('templates/header');
			$this->load->view('tasks/index', $data);
			$this->load->view('templates/footer');
		}

        public function single_task($id = NULL){

            $data['title'] = 'Homepage';
            $data['tasks'] = $this->tasks_model->get_tasks($id);
            $data['comments'] = $this->comments_model->get_comments($id);

            if (empty($data['tasks'])) {
                show_404();
            }

            $this->load->view('templates/header');
            $this->load->view('tasks/single-task', $data);
            $this->load->view('templates/footer');
        }

		public function add(){

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

			$data['title'] = 'Add Task';
			$data['users'] = $this->user_model->get_users();

			$this->load->view('templates/header');
			$this->load->view('tasks/add', $data);
			$this->load->view('templates/footer');
		}

		public function create(){

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

			$config['upload_path']   = './assets/documents/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 20480;
            $config['overwrite']     = FALSE;
            $config['remove_spaces'] = TRUE;
            
            $this->load->library('upload', $config);


            if(!$this->upload->do_upload('userfile')){
                 
                $post_image = '';
            } else {
                $data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
            }  

            $post_image = str_replace(' ', '_', $post_image);   
            $post_image = preg_replace('/_+/', '_', $post_image);

            date_default_timezone_set('Asia/Baku');
            $data = array(
                'title' => strip_tags($this->input->post('title')),
                'description' => $this->input->post('desc'),
                'deadline' => strip_tags($this->input->post('deadline')),
                'attach' => $post_image,
                'user_id' => $this->input->post('assignto'),
                'date_created' => date("d-m-Y"),
                'type' => $this->input->post('jobtype')
            );
         
        $this->tasks_model->add_tasks($data);

        $this->session->set_flashdata('changed_msg','<div class="alert alert-success text-center">Ваши изменения были сохранены!</div>');
        redirect('tasks');
		}

        public function edit($id){

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

            $data['title'] = 'Edit Task';
            $data['task'] = $this->tasks_model->get_tasks($id);
            $data['users'] = $this->user_model->get_users();

            $this->load->view('templates/header');
            $this->load->view('tasks/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update() {

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

            //insert image
            $config['upload_path']   = './assets/documents/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 20480;
            $config['overwrite']     = FALSE;
            $config['remove_spaces'] = TRUE;
            
            $this->load->library('upload', $config);


            if(!$this->upload->do_upload('userfile')){
                 
                $post_image = $this->input->post('kohneattach');;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }  

            $post_image = str_replace(' ', '_', $post_image);   
            $post_image = preg_replace('/_+/', '_', $post_image);

            date_default_timezone_set('Asia/Baku');
            $data = array(
                'title' => strip_tags($this->input->post('title')),
                'description' => $this->input->post('desc'),
                'deadline' => strip_tags($this->input->post('deadline')),
                'attach' => $post_image,
                'user_id' => $this->input->post('assignto'),
                'date_created' => date("d-m-Y"),
                'type' => $this->input->post('jobtype')
            );
         
        $idforupdate = $this->input->post('idforupdate');
        $this->tasks_model->update_task($idforupdate,$data);

        $this->session->set_flashdata('changed_msg','<div class="alert alert-success text-center">Ваши изменения были сохранены!</div>');
        redirect('tasks');
    }

		public function delete($id) {

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

            $this->tasks_model->delete_tasks($id);
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
            redirect('tasks');
    	}

        public function markasdone($id) {

            $data = array(
                'done' => 1
            );

            $this->tasks_model->markasdone_tasks($id, $data);
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
            redirect('tasks');
        }
	}
?>