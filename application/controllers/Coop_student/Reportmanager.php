<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportmanager  extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }
    public function index() {
        $data['data'] = $this->Report->Report_list();
        $this->template->view('Coop_student/Reportmanager_view',$data);

    }
    public function get_list(){
        $data['data'] = $this->Report->Report_list();
        print_r($data);
    }
}