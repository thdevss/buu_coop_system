<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actionplanform extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'teacher') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

		public function index(){
         $data['data'] = $this->Teacher_Actionplanform->planform();
        $this->template->view('Teacher/Actionplanform_view',$data);
        }

        public function planform (){
        $data['data'] = $this->Teacher_Actionplanform->planform();
        print_r($data);
    }
}