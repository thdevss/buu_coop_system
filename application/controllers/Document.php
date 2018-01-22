<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {
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

    public function index() {
        $this->load->view('Document/IN-S001_view');
    }

    public function in_s002() {
        $this->load->view('Document/IN-S002_view');
    }
}