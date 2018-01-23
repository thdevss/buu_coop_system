<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_company extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index($status = '')
    {
        if($status == 'success_delete' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการลบเรียบร้อย';
        } else if($status == 'error_delete' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } 
        else {
            $data['status'] = '';
        }

        $data['data'] = array();
        //get student has test
        $data['data'] = $this->DB_company->gets() ;
    
        $this->template->view('Officer/List_company_view',$data);
    }
   
    // public function delete()
    // {
    //     //check if exist
    //     $this->load->library('form_validation');        
    //     $this->form_validation->set_rules('id', 'id', 'trim|required|numeric');
        
    //     if ($this->form_validation->run() != FALSE) {
    //         $id = $this->input->post('id');            

    //         if($this->DB_train->get($id)) {
    //             //delete
    //             $this->DB_train->delete($id);
    //             return $this->index('success_delete');
    //             die();
    //         } else {
    //             return $this->index('error_delete');
    //             die();
    //         }
    //     } else {
    //         return $this->index('error_delete');
    //         die();
    //     }
        
    // }

    // public function edit($id)
    // {
    //     $data['data'] = $this->DB_train->get($id);
    //     $data['train_type'] = $this->DB_train_type->gets();
    //     $data['train_location'] = $this->DB_train_location->gets();
            
    //     $this->template->view('Officer/Edit_Train_list_view', $data);
    // }

    // public function add()
    // {
    //     $data['train_type'] = $this->DB_train_type->gets();
    //     $data['train_location'] = $this->DB_train_location->gets();
    //     $this->template->view('Officer/Add_Train_list_view', $data);
    // }

    // public function post_add()
    // {
    //     //insert
    // }

    // public function post_edit()
    // {
    //     //update
    // }





}