<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment_company extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv

        $user = $this->Login_session->check_login();

        if($user->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        // $this->breadcrumbs->unshift('ระบบสหกิจ', '/'); //home

        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }


	public function form()
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

        $student_id = $this->Login_session->check_login()->login_value;            
        $coop_student = $this->Coop_Student->get_coop_student($student_id)[0];
        // $company = $this->Company->get_company($coop_student['company_id'])[0];


		$data['student_id'] = $student_id;
		$data['data'] = array();
		foreach($this->Company_Assessment_Form->gets_form_for_company() as $row)
		{
			$tmp_array = array();
			$tmp_array['questionnaire_subject'] = $row;
			$tmp_array['questionnaire_item'] = $this->Company_Assessment_Form->get_company_questionnaire_item_by_subject($row['id']);
			array_push($data['data'], $tmp_array);
		}
		
		$data['result'] = [];
		foreach($this->Company_Assessment_Form->get_company_form_result($coop_student['company_id']) as $result) {
			$data['result'][$result['item_id']] = $result['score'];
		}
		// print_r($data);

		// add breadcrumbs
		$this->breadcrumbs->push('แบบประเมินสถานประกอบการ', '/Coop_student/Assessment_company/form');

		$this->template->view('coop_student/Assessment_company_form_view', $data);
	}

	public function save()
	{
        $student_id = $this->Login_session->check_login()->login_value;            
        $coop_student = $this->Coop_Student->get_coop_student($student_id)[0];

		$term_id = $this->Login_session->check_login()->term_id;
		foreach($this->input->post('item') as $item_id => $result) {
			$insert = [
				'item_id' => $item_id,
				'student_id' => $student_id,
				'trainer_id' => $coop_student['trainer_id'],
				'company_id' => $coop_student['company_id'],
				'datetime' => date('Y-m-d H:i:s'),
				'term_id' => $term_id
			];

			if(is_numeric($result)) {
				$insert['score'] = $result;
			} else {
				$insert['comment'] = $result;
            }
            // print_r($insert);
			
			$status = $this->Company_Assessment_Form->save_company_form_result($insert);
		}
		
		if($status) {
			redirect('/Coop_student/Assessment_company/form?status=success', 'refresh');
		} else {
			redirect('/Coop_student/Assessment_company/form?status=error', 'refresh');
		}

	}
}  
  