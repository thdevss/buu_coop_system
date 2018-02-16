<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Management_student_adviser extends CI_controller{
    public function index(){

                $data = array();
            // foreach($this->Coop_Student->gets_coop_student() as $row ){
            //     $tmp_array = array();
                
            //     $tmp_array['data'] = $row;
            //     $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
            //     $tmp_array['company_address'] = $this->Address->get_address_by_company($row['company_id'])[0];
            //     array_push($data, $tmp_array);
            // }
            $data['adviser'] = @$this->Adviser->gets_adviser();
            
            print_r($data);
           
            // $data['company_address'] = $this->Address->get_address_by_company( $data['coop_student']['company_id'])[0];
            // $data['student_name'] = $this->Student->get_student()
            
            $this->template->view('Officer/Management_student_adviser_view',$data);

       
    }
    public function ajax_list()
    {
        $return = array();
        foreach($this->Coop_Student->gets_coop_student() as $row)
         {
            $tmp_array = array();
            $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
            $tmp_array['adviser'] = @$this->Adviser->get_adviser($row['adviser_id'])[0];
            $tmp_array['company'] = @$this->Company->get_company($row['company_id'])[0];
            $tmp_array['company_address'] = $this->Address->get_address_by_company($row['company_id'])[0];
            
            // $tmp_array['action_box'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$row['id']).'" class="btn btn-info">รายละเอียด</a>';
            // $tmp_array['checkbox'] = '';
            
            // $tmp_array['student'] = $row;
            // $tmp_array['student']['gpax'] = '2.99';
            
            // $tmp_array['coop_student_type'] = $this->Student->get_by_coop_status_type($row['coop_status'])[0];
            // $tmp_array['department'] = $this->Student->get_department($row['department_id'])[0];
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
        $this->form_validation->set_rules('status','status','required|numeric');
        if($this->form_validation->run() != false){


            $status_type = $this->input->post('status');
            foreach($this->input->post('adviser') as $id) {
                if($this->Coop_Student->get_student($student_id)) {
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
}
