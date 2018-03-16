<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessmentstudent extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
		$user = $this->Login_session->check_login();
        if($user->login_type != 'company') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        //add breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

	public function index()
	{
		$company_id = $this->Company->gets_company($this->Login_session->check_login()->login_value)[0]['id'];
		$data['company'] = $this->Company->get_company($company_id)[0];
		$data['data'] = array();
		foreach($this->Coop_Student->gets_coop_student($data['company']['id']) as $row) {
			$tmp['assessment_student'] = $row;
			$tmp['company_job_position'] = $this->Job->get_job($tmp['assessment_student']['company_job_position_id'])[0];
			$tmp['student'] = $this->Student->get_student($tmp['assessment_student']['student_id'])[0];
			$tmp['department'] = $this->Student->get_department($tmp['student']['department_id'])[0];
			array_push($data['data'], $tmp);
		}
		
		$this->breadcrumbs->push('ประเมินผลการฝึกงานของนิสิตสหกิจ ', '/Company/Job_list_position/index');
		$this->template->view('company/Assessmentstudent_view', $data);
		
	}

	public function list_assessment()
	{
	
		
	}

	public function form()
	{	
		$this->breadcrumbs->push('ประเมินผลการฝึกงานของนิสิตสหกิจ ', '/Company/Job_list_position/index');
		$this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ ', '/Company/Job_list_position/form');
		$this->template->view('company/Assessmentstudentform_view');
	}
}  
  