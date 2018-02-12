<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_list extends CI_Controller {

    public function index(){

        $data['data'] = array();
        foreach($this->Student->gets_student() as $row)
         {

            $tmp_array = array();
            $tmp_array['student'] = $row;
            $tmp_array['coop_student_type'] = $this->Student->get_by_coop_status_type($row['coop_status']);
            $tmp_array['department'] = $this->Student->get_department($row['department_id'])[0];
            array_push($data['data'], $tmp_array);
            
        }
        $data['coop_status_type'] = $this->Student->gets_coop_status_type();
        $this->template->view('Officer/Student_list_view',$data);
    }

    public function student_detail($student_id)
    {
        $data['student'] = $this->Student->get_student($student_id)[0];
        $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];
        $data['coop_status_type'] = @$this->Student->get_by_coop_status_type($data['student']['coop_status'])[0];
        $data['coop_test_status'] = @$this->Test->get_test_result_by_student($data['student']['id'])[0];
        if($data['student']['company_status'] == 1)
        {
            $data['coop_student'] = @$this->Coop_Student->get_coop_student($student_id)[0];
            
            $data['company'] = @$this->Company->get_company($data['coop_student']['company_id'])[0];
            $data['trainer'] = @$this->Trainer->get_trainer($data['coop_student']['mentor_person_id'])[0];
            $data['adviser'] = @$this->Adviser->get_adviser($data['coop_student']['adviser_id'])[0];
        }
   
        $this->template->view('Officer/Student_detail_view', $data);
       
    }

  }
