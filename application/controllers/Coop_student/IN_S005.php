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
            $data['student'] = $this->Student->get_student($student_id)[0];
            $data['rows'] = $this->Coop_Student->get_coop_student_plan($student_id);
                
            // add breadcrumbs
            $this->breadcrumbs->push('แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา', 'Coop_student/IN_S005_view');
            $this->template->view('Coop_student/IN_S005_view', @$data);




                // add breadcrumbs
        }


        public function save()
        {
            $student_id = $this->Login_session->check_login()->login_value;            
            $this->Coop_Student->delete_plan($student_id);
            for($i=0;$i<count($this->input->post('work_subject'));$i++) {
                if(@$this->input->post('date_period')[$i]) {
                    $insert['work_subject'] = $this->input->post('work_subject')[$i];
                    $insert['date_period'] = implode(",", $this->input->post('date_period')[$i]);
                    $this->Coop_Student->insert_plan($student_id, $insert);
                }
            }

            redirect('Coop_student/IN_S005/?status=success', 'refresh');
        }

}
