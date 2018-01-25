<?php
class Daily_activity extends CI_controller
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
        if($this->Login_session->check_login()->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
    {
        $student_id = $this->Login_session->check_login()->login_value;
        $data['data'] = $this->DB_coop_student_daily_activity->gets_by_student($student_id);
 
        $this->template->view('Coop_student/Daily_activity_coop_student_view',$data);
    }
    public  function edit($id){
        $data['data'] = $this->DB_coop_student_daily_activity->get($id);
        $this->template->view('Coop_student/Edit_Daily_activity_coop_student_view',$data);
    }

}