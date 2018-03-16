<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment_st_company extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        //add breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }
    public function index(){
        $this->breadcrumbs->push(' แบบประเมินบริษัท', '/Coop_student/Daily_activity/index');
        $this->template->view('Coop_student/Assessment_stcompany_view');
    }
    
}
