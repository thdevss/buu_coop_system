<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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

        // $this->breadcrumbs->unshift('ระบบสหกิจ', '/'); //home
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function edit_term()
    {
        $data['status'] = [];
        if($this->input->get('form_status') == 'success') {
            $data['status'] = [
                'text' => 'สำเร็จ',
                'color' => 'success'
            ];
        } else if($this->input->get('form_status') == 'error') {
            $data['status'] = [
                'text' => 'ผิดพลาด',
                'color' => 'warning'
            ];
        }

        // add breadcrumbs
        $this->breadcrumbs->push('จัดการปีการศึกษา', '/Officer/Setting/edit_term');
        $data['terms'] = $this->Term->gets_term();
        $this->template->view('officer/setting_term_view', $data);
    }

    public function post_current_term()
    {
        $return['status'] = false;
        $term_id = $this->input->post('term_id');
        if($this->Term->get_term($term_id)) {
            if($this->Term->set_current_term($term_id)) {
                $return['status'] = true;
            }
        }
        echo json_encode($return);
    }

    public function post_new_term()
    {
        //add term
        $insert['name'] = $this->input->post('semester')."/".$this->input->post('year');
        $insert['year'] = $this->input->post('year');
        $insert['semester'] = $this->input->post('semester');
        $insert['is_current'] = 0;
        if($this->Term->add_term($insert)) {
            redirect('Officer/setting/edit_term?form_status=success');
        } else {
            redirect('Officer/setting/edit_term?form_status=error');
        }
        //add student....
        //wait API
    }



    public function edit_document()
    {
        $status = $this->input->get('status');
        if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'ตั้งค่าสำเร็จ';
        } else if($status == 'error'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'ผิดพลาด';

        } else {
            $data['status'] = '';
        }
        // get coop_document
        $data['coop_document'] = $this->Form->gets_form();

        // add breadcrumbs
        $this->breadcrumbs->push('จัดการเอกสารที่นิสิตต้องส่ง', '/Officer/Setting/edit_document');
        
        $this->template->view('officer/setting_document_view',$data);
    }

    public function post_edit_document() 
    {
        $term_id =  $this->Login_session->check_login()->term_id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('document_id', 'เลขเอกสาร', 'required|numeric');
        $this->form_validation->set_rules('document_deadline_datetime', 'วันเวลากำหนดส่ง', 'required');

        if($this->form_validation->run()) {
            $document_id = $this->input->post('document_id');
            if($this->Form->get_form($document_id, $term_id)) {
                $updateArr = [
                    'document_deadline' => $this->input->post('document_deadline_datetime')
                ];
                $this->Form->update_form($document_id, $updateArr);
                redirect('Officer/setting/edit_document?status=success', 'refresh');
            } else {
                redirect('Officer/setting/edit_document?status=error', 'refresh');                
            }

        } else {
            redirect('Officer/setting/edit_document?status=error', 'refresh');
        }
    }

    public function update_document_status()
    {
        $term_id =  $this->Login_session->check_login()->term_id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('status', 'สถานะ', 'required|numeric|in_list[0,1]');
        $this->form_validation->set_rules('document_id', 'เลขเอกสาร', 'required|numeric');

        $return['status'] = false;

        if ($this->form_validation->run()) {
            //change in db
            $document_id = $this->input->post('document_id');
            if($this->Form->get_form($document_id, $term_id)) {
                $updateArr = [
                    'document_active' => $this->input->post('status')
                ];
                $this->Form->update_form($document_id, $updateArr);

                $return['status'] = true;                
            }
        }

        echo json_encode($return);
    }

    public function lists_job_title($status = ''){
        if($status == '') {
            $status = $this->input->get('status');
        }

        if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'เพิ่มสำเร็จ';
        }
        else if($status == 'dup_data'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'ไม่สามารถเพิ่มได้ข้อมูลซ้ำ';

        }
        else if($status == 'success_update'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'แก้ไขสำเร็จ';

        }
        else if($status == 'Success_delete'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'ลบสำเร็จ';

        }
        else {
            $data['status'] = '';
        }

        $data['form_type'] = 'insert';
        $data['company_job_title'] = $this->Job->gets_company_job_title();

        // add breadcrumbs
        $this->breadcrumbs->push('จัดการตำแหน่งงาน', '/Officer/Setting/lists_job_title');
        $this->breadcrumbs->push('เพิ่มตำแหน่งงาน', '/');
        

        $this->template->view('officer/Job_position_setting_view',$data);
    }

    public function add_job_title()
    {
        
        if($this->Job->check_dup_job_title($this->input->post('job_title'))){
            redirect('Officer/Setting/lists_job_title/?status=dup_data', 'refresh');
        }
        else {
            $array['job_title'] = $this->input->post('job_title');
            $this->Job->insert_job_title($array);
            return $this->lists_job_title('success');
            redirect('Officer/Setting/lists_job_title/?status=success', 'refresh');
        }

    }

    public function update_job_title($job_title_id = 0)
    {
        if($this->input->post('job_title_id')) {
            //update
            $job_title_id = $this->input->post('job_title_id');
            $array['job_title'] = $this->input->post('job_title');
            $this->Job->update_job_title($job_title_id, $array);
            redirect('Officer/Setting/lists_job_title/?status=success_update', 'refresh');
        } else {
            $data['form_type'] = 'update';
            $data['status'] = null;
            $data['job_title_by_id'] = $this->Job->get_company_job_title_by_job_title_id($job_title_id)[0];
            $data['company_job_title'] = $this->Job->gets_company_job_title();

            // add breadcrumbs
            $this->breadcrumbs->push('จัดการตำแหน่งงาน', '/Officer/Setting/lists_job_title');
            $this->breadcrumbs->push('แก้ไขตำแหน่งงาน', '/Officer/Setting/update_job_title'.$job_title_id);

            $this->template->view('officer/Job_position_setting_view',$data);
        }

    }

    public function delete_job_title($job_title_id)
    {
        $this->Job->delete_job_title($job_title_id);
        redirect('Officer/Setting/lists_job_title/?status=Success_delete', 'refresh');
    }

    public function lists_skill_name($status = '')
    {
        if($status == '') {
            $status = $this->input->get('status');
        }
        
        if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'เพิ่มสำเร็จ';
        }
        else if($status == 'dup_data'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'ไม่สามารถเพิ่มได้ข้อมูลซ้ำ';

        }
        else if($status == 'success_update'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'แก้ไขสำเร็จ';

        }
        else if($status == 'Success_delete'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'ลบสำเร็จ';

        }
        else {
            $data['status'] = '';
        }

        $data['form_type'] = 'insert';
        $data['skill'] = $this->Skill->gets_skill();

        // add breadcrumbs
        $this->breadcrumbs->push('จัดการประเภททักษะ', '/Officer/Setting/lists_skill_name');
        $this->breadcrumbs->push('เพิ่มประเภททักษะ', '/');

        $this->template->view('Officer/Skill_position_setting_view', $data);

    }

    public function add_skill_name()
    {
        if($this->Skill->check_dup_skill_name($this->input->post('skill_name'))){
            redirect('Officer/setting/lists_skill_name/?status=dup_data', 'refresh');
        }
        else{
        $array['skill_name'] = $this->input->post('skill_name');
        $this->Skill->insert_skill($array);
        redirect('Officer/setting/lists_skill_name/?status=success', 'refresh');
        }

    }

    public function update_skill_name($skill_id = 0)
    {
        if($this->input->post('skill_id')) {
            $skill_id = $this->input->post('skill_id');
            $array['skill_name'] = $this->input->post('skill_name');
            $this->Skill->update_skill($skill_id , $array);
            redirect('Officer/setting/lists_skill_name/?status=success_update', 'refersh');
        }
        else{
            $data['form_type'] = 'update';
            $data['status'] = null;
            $data['skill'] = $this->Skill->gets_skill();
            $data['skill_by_skill_id'] = $this->Skill->get_skill($skill_id)[0];

            // add breadcrumbs
            $this->breadcrumbs->push('จัดการประเภททักษะ', '/Officer/Setting/lists_skill_name');
            $this->breadcrumbs->push('แก้ไขประเภททักษะ', '/Officer/Setting/update_skill_name'.$skill_id);

            $this->template->view('Officer/Skill_position_setting_view',$data);

        }

    }

    public function delete_skill_name($skill_id)
    {
        $this->Skill->delete_skill($skill_id);
        redirect('Officer/setting/lists_skill_name/?status=Success_delete', 'refersh');

    }

    public function adviser_setting()
    {
        $data['adviser'] = $this->Adviser->gets_adviser();
        // print_r($data);

        // add breadcrumbs
        $this->breadcrumbs->push('เปลี่ยนสิทธิ์อาจารย์', '/Officer/Setting/adviser_setting');
        $this->breadcrumbs->push('เปลี่ยนสิทธิ์อาจารย์', '/');
        
        $this->template->view('Officer/Adviser_setting_view',$data);
    }

    public function post_adviser_setting()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status', 'สถานะ', 'required|numeric|in_list[0,1]');

        $return['status'] = false;

        if ($this->form_validation->run()) {
            //change in db
            $array['is_officer'] = $this->input->post('status');
            $adviser_id = $this->input->post('adviser_id');            
            $this->Adviser->update_adviser($adviser_id, $array);
            
            $return['status'] = true;
        }

        echo json_encode($return);

	} 
    
}