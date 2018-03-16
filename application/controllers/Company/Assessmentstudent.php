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

        // $this->breadcrumbs->unshift('ระบบสหกิจ', '/'); //home
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

	public function index()
	{
		$company_id = $this->Trainer->get_trainer($this->Login_session->check_login()->login_value)[0]['company_id'];
		$data['company'] = $this->Company->get_company($company_id)[0];
		$data['data'] = array();
		foreach($this->Coop_Student->gets_coop_student($data['company']['id']) as $row) {
			$tmp['assessment_student'] = $row;
			$tmp['company_job_position'] = $this->Job->get_job($tmp['assessment_student']['company_job_position_id'])[0];
			$tmp['student'] = $this->Student->get_student($tmp['assessment_student']['student_id'])[0];
			$tmp['department'] = $this->Student->get_department($tmp['student']['department_id'])[0];
			array_push($data['data'], $tmp);
		}
		
		// add breadcrumbs
		$this->breadcrumbs->push('รายชื่อนิสิตฝึกงานของนิสิตสหกิจ', '/Company/Assessmentstudent/index');

		$this->template->view('company/Assessmentstudent_view', $data);
		
	}

	public function list_assessment()
	{
	
		
	}

	public function form($student_id)
	{	

		$data['student_id'] = $student_id;
		$data['data'] = array();
		foreach($this->Coop_Student_Assessment_Form->gets_form_for_coop_student() as $row)
		{

			$tmp_array = array();
			$tmp_array['questionnaire_subject'] = $row;
			$tmp_array['questionnaire_item'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($row['id']);
			array_push($data['data'], $tmp_array);

		}
			// add breadcrumbs
			$this->breadcrumbs->push('รายชื่อนิสิตฝึกงานของนิสิตสหกิจ', '/Company/Assessmentstudent/index');
			$this->breadcrumbs->push('ประเมินผลการฝึกงานของนิสิตสหกิจ', '/Company/Assessmentstudent/form');

			$this->template->view('company/Assessmentstudentform_view', $data);
	}

	public function save()
	{
		print_r($_POST);
	}
}  
  