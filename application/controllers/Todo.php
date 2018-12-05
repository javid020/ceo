<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

		function __construct() {
	    	parent::__construct();

	    	if(!$this->session->userdata('logged_in')) {
            	redirect('login');
         	}
	  	}

	public function done(){
		$id = $this->input->post('id');
		$data = array(
	        'done' => 1
		);
		$this->tasks_model->markasdone_todos($id,$data);
	}


	public function delete(){
		$id = $this->input->post('id');
		$this->tasks_model->delete_todos($id);
	}

	public function add(){
		$todo = $this->input->post('todo');

		$data = array(
                'title' => $todo,
                'done' => 0
            );
		
		$this->tasks_model->add_todos($data);
	}
}
