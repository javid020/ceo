<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Comments_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}


		public function create_comment($data){
			return $this->db->insert('comments', $data);
		}


		public function get_comments($id){
			$this->db->order_by('id desc');
			$query = $this->db->get_where('comments', array('work_id' => $id));
			return $query->result_array();
		}

		public function get_comments_num($courses_id){
			$query = $this->db->get_where('courses_comments', array('courses_id' => $courses_id));
			$query->result_array();
			return $query->num_rows();
		}
	}