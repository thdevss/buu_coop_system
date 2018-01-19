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

    public function index(){

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

            









        $term_id = $this->Login_session->check_login()->term_id;
        $data['coop_test_id'] = $this->input->post('select');
        $data['student_id'] = $this->input->post('id');
        $data['coop_test_status'] = 0;
        $data['coop_test_term_id'] = $term_id;
        $data['student_term_id'] = $term_id;
        $this->DB_coop_test_has_student->add($data);
        
        redirect('Officer/Test_Management/');
    }

}