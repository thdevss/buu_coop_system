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
            $status = $this->input->get('status');
            if( $status == 'success'){
                $data['status']['color'] = 'success';            
                $data['status']['text'] = 'บันทึกสำเร็จ';
            }
            else if($status == 'error'){
                $data['status']['color'] = 'warning';            
                $data['status']['text'] = 'ผิดพลาด';
            }
            else {
                $data['status'] = '';
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
            $term_id = $this->Login_session->check_login()->term_id; 
            $this->Coop_Student->delete_plan($student_id);
            for($i=0;$i<count($this->input->post('plan_work_subject'));$i++) {
                if(@$this->input->post('plan_time_period')[$i]) {
                    $insert['term_id'] = $term_id;
                    $insert['plan_work_subject'] = $this->input->post('plan_work_subject')[$i];
                    $insert['plan_time_period'] = implode(",", $this->input->post('plan_time_period')[$i]);
                    $this->Coop_Student->insert_plan($student_id, $insert);
                }
            }

            //save

                if($this->input->post('print') == "1") {
                    //print page
                    $this->print_data();
                } else {
                    redirect('coop_student/IN_S005?status=success');
                }     
           
        }

        public function print_data()
        {
            $student_id = $this->Login_session->check_login()->login_value;
    
            $data['coop_student'] = @$this->Coop_Student->get_coop_student($student_id)[0];
            $data['student'] = @$this->Student->get_student($student_id)[0];
            $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];
            $data['company'] = @$this->Company->get_company($data['coop_student']['company_id'])[0];
            $term_id = $this->Login_session->check_login()->term_id;
            $template_file = "template/IN-S005.docx";
    
            $save_filename = "download/".$student_id."-IN-S005.docx";
            $data_array = [
                "student_fullname" => $data['student']['student_fullname'],
                "student_id" => $student_id,
                "department_name" => $data['department']['department_name'],
                "company_name" => $data['company']['company_name_th'],
            ];

            foreach($this->Coop_Student->get_coop_student_plan($student_id) as $i => $row) {
                $data_array['work_'.++$i] = $row['plan_work_subject'];
            }
    
            // print_r($data_array);
            // die();
    
            $result = $this->service_docx->print_data($data_array, $template_file, $save_filename);
    
            //insert to db
            $coop_document_id = $this->Form->get_form_by_name('IN-S005', $this->Login_session->check_login()->term_id)[0]['document_id'];
            $word_file = '/uploads/'.basename($save_filename);
            $this->Form->submit_document($student_id, $coop_document_id, NULL, $word_file);
    
    
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
