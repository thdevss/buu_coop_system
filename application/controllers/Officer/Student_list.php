<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_list extends CI_Controller {

    public function index(){
        $data['data'] = array();
        
        foreach($this->DB_student->gets() as $row) {
            
            //get student
            $tmp_array = array();
            // student
            $tmp_array['student'] = $row;

            //get student field
            $tmp_array['student_field'] = $this->DB_student_field->get($row->student_field_id);
        


            // print_r($tmp_array);
            array_push($data['data'], $tmp_array);
            
        }


        $this->template->view('Officer/Student_list_view',$data);
    }
    public function detail(){

        $this->template->view('Officer/Student_detail_view');


    }
  }
