<?php
	class Pages extends CI_Controller{

		function __construct() {
	    	parent::__construct();

	    	if(!$this->session->userdata('logged_in')) {
            	redirect('login');
         	}
	  	}


		public function view($page = 'index'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}

?>