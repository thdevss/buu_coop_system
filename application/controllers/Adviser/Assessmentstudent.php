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
        if($user->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

        public function index()
        {
            $adviser_id = $this->Login_session->check_login()->login_value;
            $data['data'] = array();
            foreach ($this->Coop_Student->gets_coop_student_by_adviser($adviser_id) as $row)
            {
                $tmp_array = array();
                $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
                $tmp_array['department'] = $this->Student->get_department($tmp_array['student']['department_id'])[0];
                $tmp_array['company'] = $this->Company->get_company($row['company_id'])[0];
                $tmp_array['company_address'] = $this->Address->get_address_by_company($row['company_id'])[0];
                array_push($data['data'],$tmp_array);
            }

                // add breadcrumbs
                $this->breadcrumbs->push('การประเมินผลการฝึกงานของนักศึกษา', '/Adviser/Assessmentstudent/index');

                $this->template->view('Adviser/Assessmentstudent_list_view',$data);
          
        }

        public function form($student_id)
        {	
    
            $data['student_id'] = $student_id;
            $data['student'] = $this->Student->get_student($data['student_id'])[0];
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
                $data['result'][$result['item_id']] = $result['score'];
            }
                
                // add breadcrumbs
                $this->breadcrumbs->push('การประเมินผลการฝึกงานของนักศึกษา', '/Adviser/Assessmentstudent/index');
                $this->breadcrumbs->push('แบบการประเมินผลการฝึกงานของนิสิตสหกิจ', '/Adviser/Assessmentstudent/form');

                $this->template->view('Adviser/Assessmentstudent_form_view', $data);
        }

}