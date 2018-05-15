<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coop_student_assessment extends CI_Controller {

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
		$data['data'] = $this->Coop_Student->gets_coop_student_by_company($data['company']['company_id']);

		

		// add breadcrumbs
		$this->breadcrumbs->push('รายชื่อนิสิตฝึกงานของนิสิตสหกิจ', '/Company/Coop_student_assessment/index');


		$this->template->view('Company/Coop_student_assessment_list_view', $data);
		
	}

	public function form($student_id)
	{	
		$data['status'] = [];
		$status = $this->session->flashdata('status');
        if($status == 'success') {
            $data['status'] = [
                'text' => 'สำเร็จ',
                'color' => 'success'
            ];
        } else if($status == 'error') {
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
			$tmp_array['questionnaire_item'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($row['coop_student_questionnaire_subject_id']);
			array_push($data['data'], $tmp_array);
		}
		
		$data['result'] = [];
		foreach($this->Coop_Student_Assessment_Form->get_coop_student_form_result($student_id) as $result) {
			$data['result'][$result['item_id']] = $result['coop_student_has_coop_student_questionnaire_item_score'];
		}
		// print_r($data);

		// add breadcrumbs
		$this->breadcrumbs->push('รายชื่อนิสิตฝึกงานของนิสิตสหกิจ', '/Company/Coop_student_assessment/index');
		$this->breadcrumbs->push('ประเมินผลการฝึกงานของนิสิตสหกิจ', '/Company/Coop_student_assessment/form');

		$this->template->view('Company/Coop_student_assessment_form_view', $data);
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
				'trainer_id' => $trainer['person_id'],
				'company_id' => $trainer['company_id'],
				'coop_student_has_coop_student_questionnaire_item_datetime' => date('Y-m-d H:i:s'),
				'term_id' => $term_id,
			];

			if(is_numeric($result)) {
				$insert['coop_student_has_coop_student_questionnaire_item_score'] = $result;
			} else {
				$insert['coop_student_has_coop_student_questionnaire_item_comment'] = $result;
			}
			
			$status = $this->Coop_Student_Assessment_Form->save_coop_student_form_result($insert);
		}
		
		if($status) {
			$this->session->set_flashdata('status', 'success');
			redirect('/Company/Coop_student_assessment/form/'.$student_id.'?status=success', 'refresh');
		} else {
			$this->session->set_flashdata('status', 'error');
			redirect('/Company/Coop_student_assessment/form/'.$student_id.'?status=error', 'refresh');
		}

	}
}  
  