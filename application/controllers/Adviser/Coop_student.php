<?php
class Coop_student extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        //check session
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
        }

        //check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function index()
    {
        $adviser_id = $this->Login_session->check_login()->login_value;
        $data['data'] = $this->Coop_Student->gets_coop_student_by_adviser($adviser_id);


        // add breadcrumbs
        $this->breadcrumbs->push('รายชื่อนิสิตในสังกัด', '/Adviser/Coop_student/index');


        $this->template->view('Adviser/Coop_student_view',$data);
    }

}