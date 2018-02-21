<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer extends CI_Controller {
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

    public function list($id, $status = '')
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

        foreach($this->Trainer->gets_trainer_by_company($id) as $row) {
            //get train_type_id
            $tmp_array = array();
            $tmp_array['company_person'] = $row;
            $tmp_array['company'] = $this->Company->get_company($row['company_id']);
            array_push($data['data'], $tmp_array);

           // print_r($data);
        }      
        $this->template->view('Officer/List_officer_company_view',$data);
    }
   
    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('company_person_id', 'company_person_id', 'trim|required|numeric');
        $this->form_validation->set_rules('company_id', 'company_id', 'trim|required|numeric');
        $company_id = $this->input->post('company_id');
    
        if ($this->form_validation->run() != FALSE) {
            $company_person_id = $this->input->post('company_person_id');

            if($this->DB_company_person->get($company_person_id)) {
                //delete
                $this->DB_company_person->delete($company_person_id);
                return $this->list($company_id, 'success_delete');
                die();
            } else {
                return $this->list($company_id, 'error_delete');
                die();
            }
        } else {
            return $this->list($company_id, 'error_delete');
            die();
        }
        
    }





}