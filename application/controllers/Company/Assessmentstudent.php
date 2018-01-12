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
    }

	public function index()
	{
		$data['data'] = $this->Assessmentstudent->get_list(9);
		// print_r($data);
		$this->template->view('Assessmentstudent/Assessmentstudent_view',$data);
		
	}

	public function list_assessment(){
		$data['data'] = $this->Assessmentstudent->get_list();
		
	}

	public function form(){
		$this->template->view('Assessmentstudent/Assessmentstudentform');
	}
}  
  