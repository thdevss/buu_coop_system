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
        $user = $this->Login_session->check_login();
        if($user->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function lists($id, $status = '')
    {
        if($status == '') {
            $status = $this->input->get('status');
        }

        if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'เพิ่มสำเร็จ';
        }
        else if($status == 'error_input'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'เพิ่มไม่สำเร็จ';

        }
        else if($status == 'success_delete'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'ลบสำเร็จ';

        }
        else if($status == 'error_delete'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'ลบไม่สำเร็จ';

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
            $tmp_array['company'] = $this->Company->get_company($row['company_id'])[0];
            array_push($data['data'], $tmp_array);

        }
        
        // add breadcrumbs
        $this->breadcrumbs->push('จัดการข้อมูลสถานประกอบการ', '/Officer/Company/index');
        $this->breadcrumbs->push('เจ้าหน้าที่ในบริษัท', '/Officer/Trainer/lists/'.$id);
        
        $this->template->view('Officer/List_trainer_view',$data);
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

            if($this->Trainer->get_trainer($company_person_id)) {
                //delete
                $this->Trainer->delete_trainer($company_person_id);
                return $this->lists($company_id, 'success_delete');
                die();
            } else {
                return $this->lists($company_id, 'error_delete');
                die();
            }
        } else {
            return $this->lists($company_id, 'error_delete');
            die();
        }
        
    }

    public function add_employee()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname','ชื่อ-นามสกุล','required');
        $this->form_validation->set_rules('position','ตำเเหน่ง','required');
        $this->form_validation->set_rules('department','เเผนกงาน','required');
        $this->form_validation->set_rules('telephone','เบอร์โทร','required|numeric');
        $this->form_validation->set_rules('fax_number','FAX');
        $this->form_validation->set_rules('email','E-mail','required|valid_email');
        $this->form_validation->set_rules('company_id','company_id','required');
        $array['company_id'] = $this->input->post('company_id');
        if($this->form_validation->run() == false){

            redirect('Officer/Trainer/lists/'.$array['company_id'].'/?status=error_input','refresh');
        }
        else{

            $array['fullname'] = $this->input->post('fullname');
            $array['position'] = $this->input->post('position');
            $array['department'] = $this->input->post('department');
            $array['telephone'] = $this->input->post('telephone');
            $array['fax_number'] = $this->input->post('fax_number');
            $array['email'] = $this->input->post('email');
            $array['company_id'] = $this->input->post('company_id');
            $this->Trainer->insert_trainer($array);

        }
            redirect('Officer/Trainer/lists/'.$array['company_id'].'/?status=success','refresh');
    }

    public function edit()
    {
       

    }





}