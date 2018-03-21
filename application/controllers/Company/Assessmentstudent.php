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

	public function form($student_id)
	{	
		$data['status'] = [];
        if($this->input->get('status') == 'success') {
            $data['status'] = [
                'text' => 'สำเร็จ',
                'color' => 'success'
            ];
        } else if($this->input->get('status') == 'error') {
            $data['status'] = [
                'text' => 'ผิดพลาด',
                'color' => 'warning'
            ];
        }

		$data['student_id'] = $student_id;
		$data['data'] = array();
		foreach($this->Coop_Student_Assessment_Form->gets_form_for_coop_student() as $row)
		{
			$tmp_array = array();
			$tmp_array['questionnaire_subject'] = $row;
			$tmp_array['questionnaire_item'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($row['id']);
			array_push($data['data'], $tmp_array);
		}
		
		$data['result'] = [];
		foreach($this->Coop_Student_Assessment_Form->get_coop_student_form_result($student_id) as $result) {
			$data['result'][$result['item_id']] = $result['score'];
		}
		// print_r($data);

		// add breadcrumbs
		$this->breadcrumbs->push('รายชื่อนิสิตฝึกงานของนิสิตสหกิจ', '/Company/Assessmentstudent/index');
		$this->breadcrumbs->push('ประเมินผลการฝึกงานของนิสิตสหกิจ', '/Company/Assessmentstudent/form');

		$this->template->view('company/Assessmentstudentform_view', $data);
	}

	public function save()
	{
		$trainer = $this->Trainer->get_trainer($this->Login_session->check_login()->login_value)[0];
		$term_id = $this->Login_session->check_login()->term_id;
		$student_id = $this->input->post('student_id');
		foreach($this->input->post('item') as $item_id => $result) {
			$insert = [
				'item_id' => $item_id,
				'student_id' => $student_id,
				'company_person_id' => $trainer['id'],
				'company_id' => $trainer['company_id'],
				'datetime' => date('Y-m-d H:i:s'),
				'term_id' => $term_id
			];

			if(is_numeric($result)) {
				$insert['score'] = $result;
			} else {
				$insert['comment'] = $result;
			}
			
			$status = $this->Coop_Student_Assessment_Form->save_coop_student_form_result($insert);
		}
		
		if($status) {
			redirect('/Company/Assessmentstudent/form/'.$student_id.'?status=success', 'refresh');
		} else {
			redirect('/Company/Assessmentstudent/form/'.$student_id.'?status=error', 'refresh');
		}

	}
}  
  