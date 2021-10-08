<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class commentController extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('commentModel');
    }

	public function index() {
        $data['result'] = $this->commentModel->ReadData();
		$this->load->view('commentView', $data);
    }

    public function create() {
        $isPresent = $this->commentModel->createData();
        redirect("commentController");
        // $query = $this->db->query('SELECT username,message FROM users,comments WHERE users.id = comments.user_id');

       
        // foreach($query->result() as $row){
        //         echo $row->username . ' ';
        //         echo $row->message . '|||';
        //     }

    }

    // public function edit($id) {
    //     $data['row'] = $this->Crud_model->getData($id);
    //     $this->load->view('crudEdit', $data);
    // }

    // public function update($id) {
    //     $this->Crud_model->updateData($id);
    //     redirect("CrudController");
    // }

    // public function delete($id) {
    //     $this->Crud_model->deleteData($id);
    //     redirect("CrudController");
    // }
    
}