<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }


    public function index(){
        $student_id = $this->Login_session->check_login()->login_value;
        $data['student'] = $this->DB_student->get($student_id);    
        $data['student_field'] = $this->DB_student_field->get( $data['student']->student_field_id);
        $this->template->view('Student/Student_data_view',$data);
    }
  



}