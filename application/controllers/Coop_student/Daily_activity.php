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
        $this->template->view('Coop_student/Daily_activity_view', $data);
    }
    public function update($report_id)
    {
        $data['form_type'] = 'update';
        $data['row'] = $this->Daily_Report->get_report($report_id)[0];
        $this->template->view('Coop_student/Daily_activity_form_view', $data);
    }

    public function post_update()
    {
        $array = array();
        $report_id = $this->input->post('report_id');
        $data = $this->Daily_Report->get_report($report_id)[0];
        if($data) {
            if($this->Login_session->check_login()->login_value == $data['student_id']) {
                $array['activity_subject'] = $this->input->post('activity_subject');
                $array['activity_content'] = $this->input->post('activity_content');

                $this->Daily_Report->update_report($report_id, $array);
            } else {
                echo "<script>alert('not owner')</script>";
            }
        } else {
            //error
            echo "<script>alert('not found data')</script>";
        }
        
        
        redirect('Coop_student/Daily_activity/lists', 'refresh');  
    }

    public function add() 
    {
        $data['form_type'] = 'insert';
        $this->template->view('Coop_student/Daily_activity_form_view', $data);
    }

    public function post_add()
    {
        $array = array();
        $array['date'] = $this->input->post('date');
        if($array['date'] == '') {
            $array['date'] = date('Y-m-d H:i:s');
        }
        $array['activity_subject'] = $this->input->post('activity_subject');
        $array['activity_content'] = $this->input->post('activity_content');
        $array['student_id'] = $this->Login_session->check_login()->login_value;
        $array['term_id'] = $this->Term->get_current_term()[0]['term_id'];

        $this->Daily_Report->insert_report($array);
        redirect('Coop_student/Daily_activity/lists', 'refresh');        
    }

    public function datail($report_id)
    {
        $data['coop_student_daily_detail'] = $this->Daily_Report->get_report($report_id)[0];
        $this->template->view('Coop_student/Daily_activity_detail_view', $data);
    }

    public function delete($report_id)
    {
        $data = $this->Daily_Report->get_report($report_id)[0];
        if($data) {
            //has content
            //check student, owner
            if($this->Login_session->check_login()->login_value == $data['student_id']) {
                //delete
                $this->Daily_Report->delete_report($report_id);
            }
        }

        redirect('Coop_student/Daily_activity/lists', 'refresh');
    }

}