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
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
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
        else {
            $data['status'] = '';
        }
        
        $data['skill'] = $this->Skill->gets_skill();
        $this->template->view('Student/Skill_form_view',$data);
    }

    public function save()
    {
        if(count($this->input->post('skill')) < '1') {
            redirect('Student/Skill/index/?status=error','refresh');
        }
        else
        {
            $student_id = $this->Login_session->check_login()->login_value;
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