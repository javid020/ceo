<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}


		public function get_users($id = FALSE) {
			if ($id === FALSE) {
				$this->db->where('role !=', 'Administrator');
				$query = $this->db->get_where('users');
				return $query->result_array();
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

		public function get_users_works($id = FALSE) {
		if ($id === FALSE) {
			$query = $this->db->get_where('works');
			return $query->row_array();
		}

		$query = $this->db->get_where('works', array('user_id' => $id));
		return $query->result_array();
	}

	public function add_user($data) {
			return $this->db->insert('users', $data);
		}

		public function delete_user($id) {
			$this->db->where('id', $id);
			$this->db->delete('users');
			return true; 
		}

		public function update_user($idforupdate, $data) {
			$this->db->where('id', $idforupdate);
			$this->db->update('users', $data);
			return true; 
		}

		public function login($username, $password) {
			//validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}



}
?>