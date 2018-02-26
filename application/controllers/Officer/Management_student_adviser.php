<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Management_student_adviser extends CI_controller{
    public function index()
    {
        $data = array();
        $data['adviser'] = @$this->Adviser->gets_adviser();
        $this->template->view('Officer/Management_student_adviser_view',$data);
    }
    public function ajax_list()
    {
        $return = array();
        //cache
        foreach(@$this->Adviser->gets_adviser() as $teacher) {
            $cache['adviser'][$teacher['id']] = $teacher;
        }
        foreach(@$this->Company->gets_company() as $company) {
            $cache['company'][$company['id']] = $company;
        }
        foreach(@$this->Address->gets_address() as $address) {
            $cache['address'][$address['company_id']] = $address;
        }
        foreach(@$this->Student->gets_student() as $student) {
            $cache['student'][$student['id']] = $student;
        }


        foreach($this->Coop_Student->gets_coop_student() as $row)
        {
            $tmp_array = array();
            // $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
            
            $tmp_array['student'] = $cache['student'][$row['student_id']];
            $tmp_array['student']['id_link'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$tmp_array['student']['id']).'">'.$tmp_array['student']['id'].'</a>';            
            if(!$row['adviser_id']) {
                $tmp_array['adviser']['fullname'] = '-';
            } else {
                $tmp_array['adviser'] = @$cache['adviser'][$row['adviser_id']];                
            }
            
            if(!$row['company_id']) {
                $tmp_array['company']['name_th'] = '-';
                $tmp_array['company_address']['province'] = '-';
                $tmp_array['company_address']['area'] = '-';
            } else {
                $tmp_array['company'] = @$cache['company'][$row['company_id']];
                $tmp_array['company_address'] = @$cache['address'][$row['company_id']];                
            }

            array_push($return, $tmp_array);
        }
        echo json_encode($return);        
    }



    public function ajax_change_status()
    {
        $data = array();
        $data['status'] = false;
        $data['msg'] = 'ผิดพลาด';
        $data['msg_icon'] = 'warning';
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('adviser','adviser','required');
        if($this->form_validation->run() != false){


            $adviser = $this->input->post('adviser');
            foreach($this->input->post('students') as $student_id) {
                if($this->Coop_Student->get_coop_student($student_id)) {
                    //update status
                    $this->Coop_Student->update_coop_student($student_id, array( 'adviser_id' => $adviser ));
                }
            }
            $data['status'] = true;
            $data['msg'] = 'เปลี่ยนสถานะสำเร็จ';
            $data['msg_icon'] = 'success';
            
            
        } else {
            $data['msg'] = validation_errors();            
        }

        echo json_encode($data);
    }
}
