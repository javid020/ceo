<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Tasks_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_tasks_for_homepage() {
			$select = " works.*,
					users.id as user_id,
					users.full_name as user_name,
					users.photo as user_img,
					users.role as user_role";

				$this->db->order_by('done', 'asc');
				$this->db->order_by('id', 'desc');
				return $this->db->select($select)
				->join('users', 'users.id = works.user_id', 'left')
				->get('works',3)->result_array();
		}

		public function get_todolist_for_homepage() {
			$this->db->where('done', 0);
			$query = $this->db->get('todolist');
			return $query->result_array();
		}


		public function get_tasks($id = FALSE) {
			if ($id === FALSE) {
				$select = " works.*,
					users.id as user_id,
					users.full_name as user_name,
					users.photo as user_img,
					users.role as user_role";

				
				$this->db->order_by('done', 'asc');
				$this->db->order_by('id', 'desc');
				return $this->db->select($select)
				->join('users', 'users.id = works.user_id', 'left')
				->get('works')
				->result_array();
			}

			$select = " works.*,
					users.id as user_id,
					users.full_name as user_full_name,
					users.photo as user_img,
					users.role as user_role";

			return $this->db->select($select)
			->join('users', 'users.id = works.user_id', 'left')
			->get_where('works', array('works.id' => $id))->row_array();
		}

		public function add_tasks($data) {
			return $this->db->insert('works', $data);
		}

		public function delete_tasks($id) {
			$this->db->where('id', $id);
			$this->db->delete('works');
			return true; 
		}

		public function update_task($idforupdate, $data) {
			$this->db->where('id', $idforupdate);
			$this->db->update('works', $data);
			return true; 
		}


		public function markasdone_tasks($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('works', $data);
			return true; 
		}

		public function markasdone_todos($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('todolist', $data);
			return true; 
		}

		public function delete_todos($id) {
			$this->db->where('id', $id);
			$this->db->delete('todolist');
			return true; 
		}

		public function add_todos($data) {
			return $this->db->insert('todolist', $data);
		}


}
?>