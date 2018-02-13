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
            $tmp = $this->Company_person_login->get_by_username($this->Login_session->check_login()->login_value)[0];
            $tmp = $this->Trainer->get_trainer($tmp['company_person_id'])[0];
            $data['company'] = $this->Company->get_company($tmp['company_id'])[0];
            $data['company_address'] = $this->Address->get_address_by_company($data['company']['id'])[0];
            $data['company_person'] = $this->Trainer->get_trainer($data['company']['headoffice_person_id'])[0];
            $data['company_employee'] = $this->Trainer->gets_trainer_by_company($data['company']['id']);
            $data['company_job'] = $this->Job->gets_job_by_company($tmp['company_id']);
            $this->template->view('Company/Company_info_view', $data);
       }

        public function update()
        {
            $this->template->view('Company/Company_in_view');
        }
}