<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
            $tmp = $this->DB_company_person_login->get_by_username($this->Login_session->check_login()->login_value);
            $tmp = $this->DB_company_person->get($tmp->company_person_id);
            $data['data'] = $this->DB_company->get($tmp->company_id);
            $this->template->view('Company/Company_in_view');
       }
        public function add_job()
        {
            $this->template->view('Company/Company_info_job_view');
        }
}