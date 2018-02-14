<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

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


    public function lists()
    {
        
        $this->template->view('Student/Report_student_info_view');
    }

    public function register_form_company()
    {
        $this->template->view('Student/Register_form_company_view');
    }

    public function register_status()
    {
        
        $this->template->view('Student/Register_result_view');
    }


}