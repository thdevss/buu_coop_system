<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_list_position extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'company') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        //add breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

	public function index()
	{
        
        $company = $this->Login_session->check_login()->login_value;
        $data['trainer_id'] = $this->Company_person_login->get_by_username($company)[0]['company_person_id'];
        $data['company_job_position_has_student'] = $this->Job->get_student_by_company_id($data['trainer_id']);
        //print_r($data);
		
        $this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ ', '/Company/Job_list_position/index');
		$this->template->view('Company/Job_list_position_view');
		
	}

}  
  