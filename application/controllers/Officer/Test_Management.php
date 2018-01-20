<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Management extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index($status = ''){

        if($status == 'error_student_id' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ไม่พบรหัสนิสิตในระบบ';
        } else if($status == 'error_coop_student') {
            $data['status']['color'] = 'danger';            
            $data['status']['text'] = 'เป็นนิสิตสหกิจ';
        } else if($status == 'error_student_pass'){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'นิสิตผ่านการสอบแล้ว';
        }
        else if($status == 'error_has_student'){
            $data['status']['color'] = 'danger';            
            $data['status']['text'] = 'มีนิสิตในรอบการสอบแล้ว';
        }
        else if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'เพิ่มสำเร็จ';
        }
        else if( $status == 'success_delete'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'ลบสำเร็จ';
        }
        else {
            $data['status'] = '';
        }

        $data['data'] = array();
        //get student has test
        foreach($this->DB_coop_test_has_student->gets() as $row) {
            //get student
            $tmp_array = array();
            $tmp_array['student'] = $this->DB_student->get($row->student_id);

            //get student field
            $tmp_array['student_field'] = $this->DB_student_field->get($tmp_array['student']->student_field_id);
            
            //get coop test
            $tmp_array['coop_test'] = $this->DB_coop_test->get($row->coop_test_id);

            // print_r($tmp_array);
            array_push($data['data'], $tmp_array);
        }

        $data['coop_test_list'] = $this->DB_coop_test->gets();

        $this->template->view('Officer/Test_Management_view',$data);

    }
    public function add(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('id','รหัสนิสิต','required|numeric|is_unique[coop_student.student_id]');
        if($this->form_validation->run() == false){
            return $this->index('error_coop_student');
            die('0');
            
        }else{
            $student_id = $this->input->post('id');
            $coop_test_id = $this->input->post('select');
            if(!@$this->DB_student->get($student_id)){
                return $this->index('error_student_id');
                die('error_student_id');
            }
            if(@$this->DB_coop_test_has_student->check_student_pass($student_id)){
                return $this->index('error_student_pass');
                die();
            }
            if(@$this->DB_coop_test_has_student->check_student($student_id,$coop_test_id)){
                return $this->index('error_has_student');
                die();
            }

            $term = $this->Login_session->check_login()->term_id;
            $array['coop_test_id'] = $coop_test_id;
            $array['coop_test_term_id'] = $term;
            $array['student_id'] = $student_id;
            $array['student_term_id'] = $term; 
            $array['coop_test_status'] = '0';
            $this->DB_coop_test_has_student->add($array);
            return $this->index('success');
        }

        

    }
    public function delete(){
        $array['student_id'] = $this->input->post('student_id');
        $array['coop_test_id'] = $this->input->post('coop_test_id');
        $this->DB_coop_test_has_student->delete($array);
        return $this->index('success_delete');
    }


}