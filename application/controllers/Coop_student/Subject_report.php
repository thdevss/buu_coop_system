<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_report  extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }
    public function form($status = ''){
        if($status == '') {
            $status = $this->input->get('status');
        }

        if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'บันทึกสำเร็จ';
        }
        else if($status == 'error_input'){
            $data['status']['color'] = 'warning';            
            $data['status']['text'] = 'เพิ่มไม่สำเร็จ';

        }

    
        else {
            $data['status'] = '';
        }
        $student_id = $this->Login_session->check_login()->login_value;
        // print_r($student_id);

        $data['subject_report'] = @$this->Subject_Report->get_report($student_id)[0];
        print_r($data);
        $this->template->view('Coop_student/Reportmanager_view', $data);
    }

    public function post_report(){

        // print_r($_POST);
        $student_id = $this->Login_session->check_login()->login_value;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject_th', 'หัวข้อภาษาไทย', 'required');
        $this->form_validation->set_rules('subject_en', 'หัวข้อภาษาอังกฤษ', 'required|alpha');
        $this->form_validation->set_rules('report_detail', 'รายละเอียดเนื้อหาของรายงาน', 'required');

        if ($this->form_validation->run() == FALSE)
                {
                    redirect('Coop_student/Subject_report/form/?status=error_input','refresh');

                }else{
                    $array['student_id'] = $student_id ;
                    $array['subject_th'] = $this->input->post('subject_th');
                    $array['subject_en'] = $this->input->post('subject_en');
                    $array['report_detail'] = $this->input->post('report_detail');

                    $this->Subject_Report->save($array);
                
                }
                    
                redirect('Coop_student/Subject_report/form/?status=success','refresh');
                }
}