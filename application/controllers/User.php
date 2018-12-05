<?php
	class User extends CI_Controller{

		function __construct() {
	    	parent::__construct();
	  	}

		public function index(){
            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }

			$data['title'] = 'Users';
			$data['users'] = $this->user_model->get_users();

			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
		}

		public function add(){
            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }   

			$data['title'] = 'Add Task';

			$this->load->view('templates/header');
			$this->load->view('users/add', $data);
			$this->load->view('templates/footer');
		}

		public function create(){

            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

			$config['upload_path']   = './assets/img/avatars/';
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
                'full_name' => strip_tags($this->input->post('full_name')),
                'username' => $this->input->post('username'),
                'password' => strip_tags(md5($this->input->post('password'))),
                'photo' => $post_image,
                'email' => $this->input->post('email'),
                'biography' => $this->input->post('biography'),
                'role' => $this->input->post('role')
            );
         
        	$this->user_model->add_user($data);

        	$this->session->set_flashdata('changed_msg','<div class="alert alert-success text-center">Ваши изменения были сохранены!</div>');
        	redirect('user');
		}

		public function edit($id){

            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

            $data['title'] = 'Edit Task';
            $data['users'] = $this->user_model->get_users($id);

            $this->load->view('templates/header');
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update() {

            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

            $config['upload_path']   = './assets/img/avatars/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 20480;
            $config['overwrite']     = FALSE;
            $config['remove_spaces'] = TRUE;
            
            $this->load->library('upload', $config);


            if(!$this->upload->do_upload('userfile')){
                 
                $post_image = $this->input->post("profph");
            } else {
                $data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
            }  

            $post_image = str_replace(' ', '_', $post_image);   
            $post_image = preg_replace('/_+/', '_', $post_image);

            date_default_timezone_set('Asia/Baku');
            $data = array(
                'full_name' => strip_tags($this->input->post('full_name')),
                'username' => $this->input->post('username'),
                'photo' => $post_image,
                'email' => $this->input->post('email'),
                'biography' => $this->input->post('biography'),
                'role' => $this->input->post('role')
            );
         
        $idforupdate = $this->input->post('idforupdate');
        $this->user_model->update_user($idforupdate,$data);

        $this->session->set_flashdata('changed_msg','<div class="alert alert-success text-center">Ваши изменения были сохранены!</div>');
        redirect('user');
    }

    	public function delete($id) {

            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }

            if($this->session->userdata('user_id') != 1) {
                redirect(base_url());
            }

            $this->user_model->delete_user($id);
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
            redirect('user');
    	}

		public function single_profile($id){

            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }

			$data['title'] = 'Add Task';
			$data['user'] = $this->user_model->get_users($id);
			$data['works'] = $this->user_model->get_users_works($id);

			$this->load->view('templates/header');
			$this->load->view('users/profile', $data);
			$this->load->view('templates/footer');
		}


        public function login(){


            $data['title'] = 'Sign In';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('login/login', $data);
                $this->load->view('templates/footer');

            } else {
                
                // Get username
                $username = $this->input->post('username');
                // Get and encrypt the password
                $password = md5($this->input->post('password'));
                // Login user
                $user_id = $this->user_model->login($username, $password);
                if($user_id){
                    // Create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'login' => $username,
                        'logged_in' => true
                        );

                    $this->session->set_userdata($user_data);

                    redirect(base_url());
                } else {
                    // Set message
                    $this->session->set_flashdata('login_failed', 'Login is invalid');
                    redirect('login');
                }       
            }
        }

        public function logout() {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('login');

            redirect('login');
        }

	}
?>