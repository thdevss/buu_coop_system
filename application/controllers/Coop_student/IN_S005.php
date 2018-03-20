<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IN_S005 extends CI_Controller {
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

        
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

        public function index()
        {

           // $data['student_id'] = $student_id;
          //  $data['student'] = $this->Student->get_student($data['student_id'])[0];
            // $data['data'] = array();
            // foreach($this->Coop_Student_Assessment_Form->gets_form_for_coop_student() as $row)
            // {
    
            //     $tmp_array = array();
            //     $tmp_array['questionnaire_subject'] = $row;
            //     $tmp_array['questionnaire_item'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($row['id']);
            //     array_push($data['data'], $tmp_array);
    
            // }
                
                // add breadcrumbs
                 $this->breadcrumbs->push('แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา', 'Coop_student/IN_S005_view');
        

                $this->template->view('Coop_student/IN_S005_view', @$data);




                // add breadcrumbs
          
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
                $tmp_array['questionnaire_item'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($row['id']);
                array_push($data['data'], $tmp_array);
    
            }
                
                // add breadcrumbs
              
                $this->breadcrumbs->push('แบบการประเมินผลการฝึกงานของนิสิตสหกิจ', '/Coop_student/index/');

                $this->template->view('Adviser/Assessmentteacherform_view', @$data);
        }

}
