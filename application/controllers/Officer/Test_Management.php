<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Management extends CI_Controller {

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


        $this->template->view('Officer/Test_Management_view',$data);

    }

}