<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class assessment_student extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'Teacher') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }
	public function index()
	{
		$data['data'] = $this->Teacher_Assessmentstudent->get_list(9);
		// print_r($data);
		$this->template->view('Teacher/assessment_student_view',$data);
		
	}
}  