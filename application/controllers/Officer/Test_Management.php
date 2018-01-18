<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Management extends CI_Controller {

    public function index(){

        $this->template->view('Officer/Test_Management_view');

    }
    public function get(){
        $data['data'] = $this->Test_Management->test_management();
        print_r($data);
    }

    public function get_by_student()
    {
        $data['data'] = array();
        //get student has test
        foreach($this->DB_Coop_test_has_student->gets() as $row) {
            //get student
            $tmp_array = array();
            $tmp_array['student'] = $this->DB_Student->get($row->student_id);

            //get student field
            $tmp_array['student_field'] = $this->DB_Student_field->get($tmp_array['student']->student_field_id);
            
            //get coop test
            $tmp_array['coop_test'] = $this->DB_Coop_test->get($row->coop_test_id);

            // print_r($tmp_array);
            array_push($data['data'], $tmp_array);
        }

        $this->template->view('Officer/Test_Management_view', $data);
    }


    //test management (lists, form)
    public function lists()
    {
        $data['data'] = $this->Coop_test->get_test_lists();
        $this->template->view('Officer/Coop_test_form_management_view',$data);
    }
    
    public function post_create()
    {
        $data['name'] = $this->input->post('name');
        $data['select'] = $this->input->post('select');
        $data['test_date'] = $this->input->post('test_date');
        print_r($data);
    }
    

}