<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

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
          //add ->breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }


    public function lists()
    {
        $data['company'] = $this->Company->gets_company();
        $data['job'] = $this->Job->gets_job_title();
        $student_id = $this->Login_session->check_login()->login_value;
        $data['skill_by_student'] = $this->Skill_Search->search_skill_by_student($student_id)[0];
        $data['skill'] = $this->Skill_Search->skill_by_id($data['skill_by_student']['skill_id'])[0];
        $data['data'] = array();

        foreach($this->Skilled_Job_Search->search_job_by_skill($data['skill']['skill_id']) as $row) {
        $temp = array();
        $temp['company_job_position'] = $this->Skilled_Job_Search->search_skill_by_job($row['company_job_position_id'])[0];
        $temp['company_name'] = $this->Company->get_company($row['company_job_position_company_id']);
        $temp['address_company'] = $this->Address->get_address_by_company($row['company_job_position_company_id'])[0];
        array_push($data['data'], $temp);

        }
            //add ->breadcrumbs
        $this->breadcrumbs->push('รายการสมัคร ตำแหน่งงาน และสถานประกอบการ', '/Student/Job/lists');
        $this->template->view('Student/Report_student_info_view',$data);
    }

    public function search()
    {

    }

    public function register_form_company()
    {
        //add ->breadcrumbs
        $this->breadcrumbs->push('รายการสมัคร ตำแหน่งงาน และสถานประกอบการ', '/Student/Job/lists');
        $this->breadcrumbs->push('แบบฟอร์มยื่นสมัครกับบริษัท', '/Student/Job/register_form_company');
        $this->template->view('Student/Register_form_company_view');
    }

    public function register_status()
    {
        $this->breadcrumbs->push('ประกาศผลการสมัครงาน', '/Student/Job/register_status');
        $this->template->view('Student/Register_result_view');
    }
   


}
