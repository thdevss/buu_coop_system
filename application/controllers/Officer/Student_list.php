<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_list extends CI_Controller {

    public function index(){

        $data['data'] = array();
        
        $data['coop_status_type'] = $this->Student->gets_coop_status_type();
        $this->template->view('Officer/Student_list_view',$data);
    }

    public function ajax_list()
    {
        $return['data'] = array();
        foreach($this->Student->gets_student() as $row)
         {
            $tmp_array = array();
            $tmp_array['action_box'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$row['id']).'" class="btn btn-info">รายละเอียด</a>';
            $tmp_array['checkbox'] = '';
            
            $tmp_array['student'] = $row;
            $tmp_array['student']['gpax'] = '2.99';
            
            $tmp_array['coop_student_type'] = $this->Student->get_by_coop_status_type($row['coop_status'])[0];
            $tmp_array['department'] = $this->Student->get_department($row['department_id'])[0];
            array_push($return['data'], $tmp_array);
        }

        echo json_encode($return['data']);        
    }

    public function ajax_change_status()
    {
        $data = array();
        $data['status'] = false;
        $data['msg'] = 'ผิดพลาด';
        $data['msg_icon'] = 'warning';
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status','status','required|numeric');
        if($this->form_validation->run() != false){


            $status_type = $this->input->post('status');
            foreach($this->input->post('students') as $student_id) {
                if($this->Student->get_student($student_id)) {
                    //update status
                    $this->Student->update_student($student_id, array( 'coop_status' => $status_type ));
                }
            }
            $data['status'] = true;
            $data['msg'] = 'เปลี่ยนสถานะสำเร็จ';
            $data['msg_icon'] = 'success';
            
            
        }

        echo json_encode($data);
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

    public function training_history_student()
    {
        $this->template->view('Officer/Training_history_student_view');
    }

  }
