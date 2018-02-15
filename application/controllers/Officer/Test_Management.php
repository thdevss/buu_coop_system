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
        
        // foreach($this->DB_coop_test_has_student->gets() as $row) {
        //     //get student
        //     $tmp_array = array();
        //     $tmp_array['student'] = $this->DB_student->get($row->student_id);

        //     //get student field
        //     $tmp_array['student_field'] = $this->DB_student_field->get($tmp_array['student']->student_field_id);
            
        //     //get coop test
        //     $tmp_array['coop_test'] = $this->DB_coop_test->get($row->coop_test_id);

        //     // print_r($tmp_array);
        //     array_push($data['data'], $tmp_array);
        // }

        $data['coop_test_list'] = $this->Test->gets_test();

        $this->template->view('Officer/Test_Management_view',$data);

    }

    public function gets_student_by_test($test_id)
    {
        $data = array();
        foreach($this->Test->get_student_by_test($test_id) as $row) {
            //get student
            $tmp_array = array();
            $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];

            //get student field
            $tmp_array['department'] = $this->Student->get_department($tmp_array['student']['department_id'])[0];
            
            //get coop test
            $tmp_array['coop_test'] = $this->Test->get_test($row['coop_test_id'])[0];

            // print_r($tmp_array);
            array_push($data, $tmp_array);
        }

        echo json_encode($data);
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
            if(!@$this->Student->get_student($student_id)){
                return $this->index('error_student_id');
                die('error_student_id');
            }
            if(@$this->Test->check_test_pass_by_student($student_id)){
                return $this->index('error_student_pass');
                die();
            }
            if(@$this->Test->get_student_by_test_and_student($student_id, $coop_test_id)){
                return $this->index('error_has_student');
                die();
            }

            $term = $this->Term->get_current_term()[0]['id'];
            $this->Test->add_student($student_id, $coop_test_id);
            return $this->index('success');
        }
    }
    public function delete(){
        $array['student_id'] = $this->input->post('student_id');
        $array['coop_test_id'] = $this->input->post('coop_test_id');
        $this->Test->delete_student($array['student_id'], $array['coop_test_id']);
        return $this->index('success_delete');
    }


}