<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_cooperative extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
    {
        $data['company_name'] = $this->Company->gets_company();
        $data['department_name'] = $this->Student->gets_department();
        $this->template->view('Officer/Report_cooperative_view',$data);
    }

    public function search()
    {
        print_r($_POST);
        $company_id = $this->input->post('company_id');
        $department_id = $this->input->post('department_id');

        if($company_id =='0'||$deparment ==''){
            redirect('Officer/Report_cooperative/','refresh');
        } else{
            $data['company_by_id'] = $this->Company->get_company($company_id);
        }
      
    }

   
}