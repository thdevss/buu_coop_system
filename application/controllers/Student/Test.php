<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

	public function lists($status = '')
	{
        $student_id = $this->Login_session->check_login()->login_value;

        //get current test id
        $data['coop_test'] = $this->Test->gets_test();
        //check already register?
        $data['already_register'] = false;
        if($status == 'error_unknown' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดรอการตรวจสอบ';
        } else if($status == 'error_student_dup') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'คุณเคยลงทะเบียนไปแล้ว โปรดมาสอบตามวันเวลาที่นัดหมาย';
            $data['already_register'] = true;            
        } else if($status == 'success'){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ลงสมัครสอบเรียบร้อย โปรดมาสอบตามวันเวลาที่นัดหมาย';
            $data['already_register'] = true;            
        } else if(@$this->Test->check_student($student_id, $data['coop_test']->id)) {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'คุณเคยลงทะเบียนไปแล้ว โปรดมาสอบตามวันเวลาที่นัดหมาย';
            $data['already_register'] = true;
        }
        else {
            $data['status'] = '';
        }

        print_r($data);

		$this->template->view('student/test_register_view', $data);
		
    }
    
    public function register()
    {
        $student_id = $this->Login_session->check_login()->login_value;
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm','Confirm','required|in_list[1]');
        if($this->form_validation->run() == false){
            return $this->index('error_unknown');
            die();
        } else {
            //get current test id
            $data['coop_test'] = $this->DB_coop_test->get_open_register();
            $data['student'] = $this->DB_student->get($student_id);

            //check already register?
            if(@$this->DB_coop_test_has_student->check_student($student_id, $data['coop_test']->id)) {
                return $this->index('error_student_dup');
                die();
            }

            //register
            $array['coop_test_id'] = $data['coop_test']->id;
            $array['coop_test_term_id'] = $data['coop_test']->term_id;
            $array['student_term_id'] = $data['student']->term_id;
            $array['student_id'] = $data['student']->id;
            $array['coop_test_status'] = '0';
            
            $this->DB_coop_test_has_student->add($array);

            return $this->index('success');

        }
    }


    public function result()
    {
        $student_id = $this->Login_session->check_login()->login_value;
        
        $data = array();
        $data['rows'] = array();
        foreach($this->DB_coop_test_has_student->gets_by_student($student_id) as $row) {
            //get testdate
            $coop_test = $this->DB_coop_test->get($row->coop_test_id);

            $row->test_date = $coop_test->test_date;
            $row->name = $coop_test->name;
            
            array_push($data['rows'], $row);
        }
		$this->template->view('student/test_result_view', $data);        
    }
}  
  