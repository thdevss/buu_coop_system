<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
      
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function index($status= '')
    {
        if($status == '') {
            $status = $this->input->get('status');
        }

        if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'เพิ่มสำเร็จ';
        }
        else if($status == 'error'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'กรุณาเลือก';

        }
        else if($status == 'select_before'){
            $data['status']['color'] = 'info';            
            $data['status']['text'] = 'กรุณาเลือกทักษะ';

        }
        else {
            $data['status'] = '';
        }
        $student_id = $this->Login_session->check_login()->login_value;

        $data['has_skill'] = array();
        foreach($this->Skill_Search->search_skill_by_student($student_id) as $has_skill) {
            $data['has_skill'][] = $has_skill['skill_id'];
        }
        $data['skills'] = array();
        foreach ($this->Skill->gets_skill_category() as $row) {
            $tmp_array = array();
            $tmp_array = $row;
            $tmp_array['skills'] = $this->Skill->gets_skill_by_category_id($row['skill_category_id']);
            array_push($data['skills'], $tmp_array);
        }

        $this->breadcrumbs->push('ทักษะที่ถนัด', '/Student/Skill/index');
        // print_r($data);
        $this->template->view('Student/Skill_form_view',@$data);
    }

    public function save()
    {
        if(count($this->input->post('skill')) < '1') {
            redirect('Student/Skill/index/?status=error','refresh');
        }
        else
        {
            $student_id = $this->Login_session->check_login()->login_value;
            //delete old skill
            $this->Skill_Search->delete_by_student($student_id);
            foreach($this->input->post('skill') as $skill){
                $insert = array();
                $insert['student_id'] = $student_id;
                $insert['skill_id'] = $skill;
                $this->Skill_Search->insert_student_has_skill($insert);
            }
           
            redirect('Student/Skill/index/?status=success','refresh');
        }
    
        
    }
}