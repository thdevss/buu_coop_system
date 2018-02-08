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
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
    {
        $teacher_id = $this->Login_session->check_login()->login_value;
        $data['data'] = array();
        foreach ($this->DB_coop_student->gets_by_teacher($teacher_id) as $row){
            $tmp_array = array();
            $tmp_array['student'] = $this->DB_student->get($row->student_id);
            $tmp_array['student_field'] = $this->DB_student_field->get($tmp_array['student']->student_field_id);
            $tmp_array['company'] = $this->DB_company->get($row->company_id);
            $tmp_array['company_address'] = $this->DB_company_address->get($row->company_id);
            array_push($data['data'], $tmp_array);
        }
        $this->template->view('Adviser/Daily_activity_view',$data);
    }
   public function list($student_id)
   {
       if(!$this->DB_coop_student->get($student_id)){
           return $this->index();

       }
        $data['student'] = $this->DB_student->get($student_id);
        $data['data'] = $this->DB_coop_student_daily_activity->gets_by_student($student_id);
        $this->template->view('Adviser/Daily_activity_list_view',$data);
   }
   public function detail($id)
   {
        $data['data'] = @$this->DB_coop_student_daily_activity->get($id);

        if(!$data['data']){
            show_404();
       }
       $this->template->view('Adviser/Daily_detail_view',$data);
   }

}