<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportmanager  extends CI_Controller {

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
    public function get_list(){
        $data['data'] = $this->Report->get_report($student_id);
        print_r($data);
    }
    public function post_report(){
        $student_id = '57660135';
        $data['subject_th'] =  $this->input->post('subject_th');
        $data['subject_en'] = $this->input->post('subject_en');
        $data['report_detail'] = $this->input->post('report_detail');
                
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject_th', 'หัวข้อภาษาไทย', 'required');
        $this->form_validation->set_rules('subject_en', 'หัวข้อภาษาอังกฤษ', 'required');
        $this->form_validation->set_rules('report_detail', 'รายละเอียดเนื้อหาของรายงาน', 'required');

        if ($this->form_validation->run() == FALSE)
                {
                    $return['status'] = 'error';
                    $return['row'] = @$this->Report->get_report($student_id)[0];
                    
                        $this->template->view('Coop_student/Reportmanager_view', $return);
                }
                else
                {
                    if(@$this->Report->get_report($student_id)[0]) {
                        //update
                        $this->Report->update($data,$student_id);
                        $return['status'] = 'successupdate';
                    } else {
                        //insert
                        $data['student_id'] = $student_id;
                        $this->Report->insert($data);
                        $return['status'] = 'successinsert';
                    }
                        $this->template->view('Coop_student/Reportmanager_view',$return);
                }     
    }
}