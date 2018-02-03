<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_result extends CI_Controller {

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


    public function index()
    {
        
        $this->template->view('Student/Register_result_view');
    }

  


}