<?php
	class Homepage extends CI_Controller{

		function __construct() {
	    	parent::__construct();

	    	if(!$this->session->userdata('logged_in')) {
            	redirect('login');
         	}
	  	}

	  	public function my404() {
	  		$this->load->view('pages/my404');
	  	}


		public function index(){

			$data['title'] = 'Homepage';
			$data['tasks'] = $this->tasks_model->get_tasks_for_homepage();
			$data['todolists'] = $this->tasks_model->get_todolist_for_homepage();

			$this->load->view('templates/header');
			$this->load->view('pages/index', $data);
			$this->load->view('templates/footer');
		}

		
	}
?>