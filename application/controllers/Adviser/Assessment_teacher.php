<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assessment_teacher extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

        public function index()
        {
            $adviser_id = $this->Login_session->check_login()->login_value;
            $data['data'] = array();
            foreach ($this->Coop_Student->gets_coop_student_by_adviser($adviser_id) as $row)
            {
                $tmp_array = array();
                $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
                $tmp_array['department'] = $this->Student->get_department($tmp_array['student']['department_id'])[0];
                $tmp_array['company'] = $this->Company->get_company($row['company_id'])[0];
                $tmp_array['company_address'] = $this->Address->get_address_by_company($row['company_id'])[0];
                array_push($data['data'],$tmp_array);
            }
            $this->template->view('Adviser/Assessmentteacher_view',$data);
          
        }

}