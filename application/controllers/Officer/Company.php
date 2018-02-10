<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
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
        if($status == 'success_insert' ) {
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการเพิ่มสถานประกอบการเรียบร้อย';
        } else if($status == 'error_add' ) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } else if($status != '' ) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } 
        else {
            $data['status'] = '';
        }

        $data['data'] = $this->Company->gets_company();
    
        $this->template->view('Officer/List_company_view',$data);
    }
     public function address($id){
            $data['data'] = $this->Address->get_address_by_company($id)[0];           
  
                // print_r($data);

            $this->template->view('Officer/Address_company_view',$data);
        
    }

    public function post_add()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('company_name', 'ชื่อสถานประกอบการ', 'trim|required|is_unique[company.name_th]');

        if ($this->form_validation->run() != FALSE) {
            
            $insert['name_th'] = $this->input->post('company_name');
            
 
            if($this->Company->insert_company($insert)) {
                return $this->index('success_insert');
                die();
            } else {
                return $this->index('error_add');
                die();
            }
        } else {
            return $this->index(validation_errors());
            die();
        }
    }

    

}