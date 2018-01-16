<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Validate_list_coop_student extends CI_Controller {
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

		public function index(){

            $data['data'] = $this->validate_assessment_coop->list();
        $this->template->view('Officer/validate_assessment_list_coop_view',$data);
     
        }
 

}