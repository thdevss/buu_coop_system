<?php

class Company extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
        }
    }
    public function index()
    {
        $this->template->view('company/index_view.php');
    }

}