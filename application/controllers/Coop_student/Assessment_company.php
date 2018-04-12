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
		foreach($this->Company_Assessment_Form->get_company_form_item_result_by_company_and_student($coop_student['company_id'], $student_id) as $result) {
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
			$sql_status = false;
			
			$sql_status = $this->Company_Assessment_Form->save_company_form_result($insert);
		}

		if($sql_status) {
			//chek=c if print
			if($this->input->post('print') == 1){
				$this->print_data();

			}else {
				redirect('/Coop_student/Assessment_company/form?status=success', 'refresh');
			}
			
		} else {
			redirect('/Coop_student/Assessment_company/form?status=error', 'refresh');;
		}
		
		// if($status) {
		// 	redirect('/Coop_student/Assessment_company/form?status=success', 'refresh');
		// } else {
		// 	redirect('/Coop_student/Assessment_company/form?status=error', 'refresh');
		// }

	}

	public function print_data()
    {
		$student_id = $this->Login_session->check_login()->login_value;
		$coop_student = $this->Coop_Student->get_coop_student($student_id)[0];
		$company = $this->Company->get_company($coop_student['company_id'])[0];
		// print_r($company);
		$items = array();
		foreach($this->Company_Assessment_Form->gets_form_for_company() as $row)
		{
			$tmp_array = array();
			// $items[] = $row;
			$items = array_merge($items, [[
				'number' => $row['number'],
				'title' => $row['title'],
				'sc5' => '',
				'sc4' => '',
				'sc3' => '',
				'sc2' => '',
				'sc1' => '',
			]]);
			foreach($this->Company_Assessment_Form->get_company_questionnaire_item_by_subject_and_student($row['id'], $student_id) as $result_item) {
				$item = [
					'number' => $result_item['number'],
					'title' => $result_item['title'],
					'sc5' => '',
					'sc4' => '',
					'sc3' => '',
					'sc2' => '',
					'sc1' => ''
				];

				if($result_item['score'] == '1') {
					$item['sc1'] = ' * ';
				} else if($result_item['score'] == '2') {
					$item['sc2'] = ' * ';
				} else if($result_item['score'] == '3') {
					$item['sc3'] = ' * ';
				} else if($result_item['score'] == '4') {
					$item['sc4'] = ' * ';
				} else if($result_item['score'] == '5') {
					$item['sc5'] = ' * ';
				}
				$items = array_merge($items, [$item]);
			}
		}
		// print_r($items);
		// die();
    
        $template_file = "template/IN-S008.docx";        
        $save_filename = "download/".$student_id."-IN-S008.docx";
        $data_array = [
			"company_name_th" => $company['name_th'],
			"term" => "2",
			"year" => "2560",
			"items" => $items,
			"no4" => $this->input->post('no4'),
			"no5" => $this->input->post('no5'),
			"no6_y" => '',
			"no6_n" => '',
			"no7" => $this->input->post('no7'),
		];

		if($this->input->post('no6') == "1") {
			$data_array['no6_y'] = ' * ';
		} else {
			$data_array['no6_n'] = ' * ';
		}
       
        // print_r($data_array);
        // die();

        $result = $this->service_docx->print_data($data_array, $template_file, $save_filename);
        // print_r($result);
        // redirect(base_url($result['full_url']), 'refresh');

        //insert to db
        $coop_document_id = $this->Form->get_form_by_name('IN-S008', $this->Login_session->check_login()->term_id)[0]['id'];
        $word_file = '/uploads/'.basename($save_filename);
        $this->Form->submit_document($student_id, $coop_document_id, NULL, $word_file, 1);

		// echo '<a href="'.base_url($result['full_url']).'">Download</a>';
        // redirect(base_url($result['full_url']), 'refresh');
        echo "
            <img src='".base_url('assets/img/loading.gif')."' />
            <script>
                window.location = '".base_url($result['full_url'])."';
                setTimeout(function(){
                    window.location = '".site_url()."';
                }, 1500);
            </script>
        ";


    }
}  
  