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

    public function lists()
    {
        $student_id = $this->Login_session->check_login()->login_value;
        $data['coop_student_daily'] = $this->Daily_Report->gets_report_by_student($student_id);
        $this->template->view('Coop_student/Daily_activity_coop_student_view',$data);
    }
    public function edit($id)
    {
        
        $this->template->view('Coop_student/Edit_Daily_activity_coop_student_view');
    }

    public function add() 
    {
        
    }

    public function datail($report_id)
    {
        $data['coop_student_daily_detail'] = $this->Daily_Report->get_report($report_id)[0];
        $this->template->view('Coop_student/Detail_Daily_activity_view',$data);
    }

    public function delete()
    {

    }

}