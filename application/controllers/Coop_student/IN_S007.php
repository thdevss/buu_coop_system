<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IN_S007 extends CI_Controller {
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

        
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function index()
    {
       $student_id = $this->Login_session->check_login()->login_value;
       $data['coop_student'] = @$this->Coop_Student->get_coop_student($student_id)[0];
       $data['student'] = @$this->Student->get_student($student_id)[0];
       $data['adviser'] = @$this->Adviser->get_adviser($data['coop_student']['adviser_id'])[0];
       $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];
       print_r($data);

        $this->breadcrumbs->push('แบบคำร้องทั่วไป', 'Coop_student/IN_S007_view');
        $this->template->view('Coop_student/IN_S007_view',$data);
    }
    
    public function save()
    {
            
    }

}
