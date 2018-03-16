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
        $user = $this->Login_session->check_login();
        if($user->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        //add breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function index()
    {
        $adviser_id = $this->Login_session->check_login()->login_value;
        $data['data'] = array();
        foreach ($this->Coop_Student->gets_coop_student_by_adviser($adviser_id) as $row){
            $tmp_array = array();
            $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
            $tmp_array['department'] = $this->Student->get_department($tmp_array['student']['department_id'])[0];
            $tmp_array['company'] = @$this->Company->get_company($row['company_id'])[0];
            $tmp_array['company_address'] = $this->Address->get_address_by_company($row['company_id'])[0];
            array_push($data['data'], $tmp_array);
        }
        $this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ ', '/Company/Daily_activity/index');
        $this->template->view('Adviser/Daily_activity_lists_student_view',$data);
    }

    public function lists($student_id)
    {
       if(!$this->Coop_Student->get_coop_student($student_id)){
           return $this->index();

       }
        $data['student'] = $this->Student->get_student($student_id)[0];
        $data['data'] = $this->Daily_Report->gets_report_by_student($student_id);
        $this->template->view('Adviser/Daily_activity_list_view',$data);
    }

    public function detail($id)
    {
        $data['data'] = @$this->Daily_Report->get_report($id)[0];

        if(!$data['data']){
            show_404();
        }
       $this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ ', '/Company/Daily_activity/detail');
       $this->template->view('Adviser/Daily_detail_view',$data);
    }

}