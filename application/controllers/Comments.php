<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller{

		function __construct() {
	    	parent::__construct();
            if(!$this->session->userdata('logged_in')) {
                redirect('login');
            }
	    }
	  
		public function create(){

			$data = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'content' => $this->input->post('content'),
                'work_id' => $this->input->post('work_id'),
                'date_created' => date("d-m-Y")
            );
         
        $this->comments_model->create_comment($data);

        $this->session->set_flashdata('changed_msg','<div class="alert alert-success text-center">Ваши изменения были сохранены!</div>');
        redirect('tasks/'.$this->input->post('work_id'));

		}


	}


?>