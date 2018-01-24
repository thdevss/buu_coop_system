<?php
class Company_info extends CI_controller
{
        public function __construct()
        {
            parent::__construct();
            //check session
            if(!$this->Login_session->check_login()) {
                $this->session->sess_destroy();
                redirect('member/login');
            }

            //check priv
            if($this->Login_session->check_login()->login_type != 'company') {
                redirect($this->Login_session->check_login()->login_type);
                die();
            }
        }

        public function index()
        {
            $this->template->view('Company/Company_info_view');
        }
}