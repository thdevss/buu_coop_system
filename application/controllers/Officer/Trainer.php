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

    public function lists($company_id, $status = '')
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
        else if($status == 'success_update'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'แก้ไขสำเร็จ';

        }
        else if($status == 'error_delete'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'ลบไม่สำเร็จ';

        }
        else {
            $data['status'] = '';
        }

        $data['data'] = array();

        $data['company'] = $this->Company->get_company($company_id)[0];

        foreach($this->Trainer->gets_trainer_by_company($company_id) as $row) {
            $tmp_array = array();
            $tmp_array['company_person'] = $row;
            
            array_push($data['data'], $tmp_array);

        }
        // print_r($data);
        // add breadcrumbs
        $this->breadcrumbs->push('จัดการข้อมูลสถานประกอบการ', '/Officer/Company/index');
        $this->breadcrumbs->push('เจ้าหน้าที่ในบริษัท', '/Officer/Trainer/lists/'.$company_id);
        
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
                $this->Trainer->update_trainer($company_person_id, array(
                    'person_active' => 0
                ));
                // $this->Trainer->delete_trainer($company_person_id);
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
        $this->form_validation->set_rules('email','E-mail','required|valid_email|is_unique[company_person.email]');
        $this->form_validation->set_rules('company_id','company_id','required');
        $array['company_id'] = $this->input->post('company_id');

        $password_gen = generateStrongPassword(8);
        $password_gen_db = password_hash($password_gen, PASSWORD_DEFAULT);

        if($this->form_validation->run() == false){
            //get employee by email
            $company_person = $this->Trainer->get_trainer_by_email($this->input->post('email'))[0];
            if($company_person) {
                //update status active and gen new password
                $array['fullname'] = $this->input->post('fullname');
                $array['position'] = $this->input->post('position');
                $array['department'] = $this->input->post('department');
                $array['telephone'] = $this->input->post('telephone');
                $array['fax_number'] = $this->input->post('fax_number');
                $array['person_active'] = 1;
                $array['person_password'] = $password_gen_db;

                $this->Trainer->update_trainer($company_person['id'], $array);

                //sent email to person
                $to = $company_person['email'];
                $subject = 'แจ้งข้อมูลเข้าใช้งานระบบสหกิจศึกษา มหาวิทยาลัยบูรพา';
                $msg = 'Username: '.$company_person['person_username'].' | Password: '.$password_gen.' | '.site_url();
                echo $msg;
                // mail($to, $subject, $msg);

                // redirect('Officer/Trainer/lists/'.$array['company_id'].'/?status=success','refresh');
                

            } else {
                redirect('Officer/Trainer/lists/'.$array['company_id'].'/?status=error_input','refresh');
            }
            

        } else {
            //success
            $array['fullname'] = $this->input->post('fullname');
            $array['position'] = $this->input->post('position');
            $array['department'] = $this->input->post('department');
            $array['telephone'] = $this->input->post('telephone');
            $array['fax_number'] = $this->input->post('fax_number');
            $array['email'] = $this->input->post('email');
            $array['company_id'] = $this->input->post('company_id');
            $array['person_username'] = $this->input->post('email');

            $array['person_password'] = $password_gen_db;
            
            $this->Trainer->insert_trainer($array);

            //sent email to person
            $to = $array['email'];
            $subject = 'แจ้งข้อมูลเข้าใช้งานระบบสหกิจศึกษา มหาวิทยาลัยบูรพา';
            $msg = 'Username: '.$array['person_username'].' | Password: '.$password_gen.' | http://localhost:8080/';
            echo $msg;
            // mail($to, $subject, $msg);

        }
        
        // redirect('Officer/Trainer/lists/'.$array['company_id'].'/?status=success','refresh');
    }

    public function edit_form($trainer_id, $status = '')
    {
        if($status == '') {
            $status = $this->input->get('status');
        }

        if($status == 'error_update'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'แกไข้ไม่สำเร็จ';

        }
        else {
            $data['status'] = '';
        }
        //print_r($trainer_id);
        $data['person'] = $this->Trainer->get_trainer($trainer_id)[0];
        // print_r($data);

         // add breadcrumbs
         $this->breadcrumbs->push('จัดการข้อมูลสถานประกอบการ', '/Officer/Company/index');
         $this->breadcrumbs->push('เจ้าหน้าที่ในบริษัท', '/Officer/Trainer/lists/'.$trainer_id);
         $this->breadcrumbs->push('เเก้ไขข้อมูลเจ้าหน้าที่', '/');

         $this->template->view('Officer/Edit_person_trainer_view',$data);
    }

    public function edit($trainer_id)
    {
        $company_id = $this->input->post('company_id');
        // print_r($company_id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname','ชื่อ-นามสกุล','required');
        $this->form_validation->set_rules('position','ตำเเหน่ง','required');
        $this->form_validation->set_rules('email','E-mail','required|valid_email');
        if($this->form_validation->run() == false){

            redirect('Officer/Trainer/edit_form/'.$trainer_id.'/?status=error_update','refresh');
        } else {
            //success

            $array['fullname'] = $this->input->post('fullname');
            $array['email'] = $this->input->post('email');
            $array['position'] = $this->input->post('position');

            $this->Trainer->update_trainer($trainer_id,$array);
        }
        
            redirect('Officer/Trainer/lists/'.$company_id.'/?status=success_update','refresh');
    }

            

}






