<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessmentstudent extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
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
		
		$company_id = $this->Company->getByPerson($this->Login_session->check_login()->login_value)->id;
		$data['data'] = $this->Company_Assessmentstudent->get_list($company_id);
		// print_r($data);
		$this->template->view('Assessmentstudent/Assessmentstudent_view',$data);
		
	}

	public function list_assessment(){
		$data['data'] = $this->Company_Assessmentstudent->get_list();
		
	}

	public function form(){	
		$this->template->view('Assessmentstudent/Assessmentstudentform_view');
	}
}  
  