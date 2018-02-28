<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function edit_term(){
        $this->template->view('officer/setting_term_view',@$data);
    }
    public function edit_document(){
        // get coop_document
        $data['coop_document'] = $this->Form->gets_form();
        $this->template->view('officer/setting_document_view',$data);
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
            $this->template->view('Officer/Skill_position_setting_view',$data);

        }

    }

    public function delete_skill_name($skill_id)
    {
        $this->Skill->delete_skill($skill_id);
        redirect('Officer/setting/lists_skill_name/?status=Success_delete', 'refersh');

    }
    
}