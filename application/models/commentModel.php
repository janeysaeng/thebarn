<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class commentModel extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	function createData() {
		$username = $this->input->post('username');
		$query = $this->db->query('SELECT id FROM users WHERE username = ' . '"' . $username .'"');
		

		if ($query->result() != null){

			foreach ($query->result() as $row){
	        	$data = array (
					'user_id' =>  $row->id,
					'message' => $this->input->post('message'),
				);
				$this->db->insert('comments', $data);
        	}
			
        	

		}
		
        
	}

	function isPresent(){
		$result = $this->db->query('SELECT username FROM users WHERE username = ' . '"' . $username .'"');
		if($result->result() != null){
			return 1;
		} else{
			return -1;
		}

	}

	function readData() {
        $query = $this->db->query('SELECT username,message FROM users,comments WHERE users.id = comments.user_id');
        return $query->result();
    }


    
    // function getData($id) {
    //     $query = $this->db->query('SELECT * FROM tbl_name WHERE `id` =' .$id);
    //     return $query->row();
    // }
}
