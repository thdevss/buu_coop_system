<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_list_position extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'company') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        //add breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

	public function index()
	{

        $tmp = $this->Trainer->get_trainer($this->Login_session->check_login()->login_value)[0];
        $company_id = $tmp['company_id'];
        $data['trainer_id'] = $tmp['id'];
        $data['company_status_Type'] = $this->Company->gets_company_status_type();
        // print_r($this->Job->get_student_by_company_id($data['trainer_id']));
        $this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ ', '/Company/Job_list_position/index');
		    $this->template->view('Company/Job_list_position_view', $data);
    }
    
    public function ajax_list()
    {
        $tmp = $this->Trainer->get_trainer($this->Login_session->check_login()->login_value)[0];
        $company_id = $tmp['company_id'];
        $data['trainer_id'] = $tmp['id'];

        $return['data'] = array();

        //cache here
        foreach($this->Company->gets_company_status_type() as $rrr) {
            $cache['company_status_type'][$rrr['id']] = $rrr;
        }
        foreach($this->Student->gets_department() as $rrr) {
            $cache['department'][$rrr['id']] = $rrr;
        }
        foreach($this->Job->gets_job_by_company($tmp['company_id']) as $rrr) {
            $cache['job_position'][$rrr['id']] = $rrr;
        }

        // foreach($this->Student->gets_student() as $row)
        foreach($this->Job->get_student_by_company_id($data['trainer_id']) as $row)
        {

            $tmp_array = array();
            
            $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
            $tmp_array['student']['gpax'] = '2.99';

            $tmp_array['job_position'] = array();
            $tmp_array['job_position']['position_title'] = @$cache['job_position'][$row['company_job_position_id']]['position_title'];
            
            $tmp_array['company_status_type'] = $cache['company_status_type'][$row['status']];

            $company_type_Render = '<select onchange="change_company_type('.$row['student_id'].', this.value)">';
            foreach($cache['company_status_type'] as $key => $coop_type) {
                if($key == $row['status']) {
                    $company_type_Render .= '<option value="'.$key.'" selected>'.$coop_type['status_name'].'</option>';
                } else {
                    $company_type_Render .= '<option value="'.$key.'">'.$coop_type['status_name'].'</option>';
                }
            }
            $company_type_Render .= '</select>';

            $tmp_array['company_status_type']['status_name'] = str_replace(" ", "", $tmp_array['company_status_type']['status_name']);
            $tmp_array['company_status_type']['select_box'] = $company_type_Render;
            
            $tmp_array['department'] = $cache['department'][$tmp_array['student']['department_id']];
            // $tmp_array['coop_student_type'] = $this->Student->get_by_coop_status_type($row['coop_status'])[0];
            // $tmp_array['department'] = $this->Student->get_department($row['department_id'])[0];

            // print_r($tmp_array);
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
                    $this->Job->update_student($student_id, array( 'status' => $status_type ));
                    $this->Student->update_student($student_id, array( 'company_status' => $status_type ));
                }
            }
            $data['status'] = true;
            $data['msg'] = 'เปลี่ยนสถานะสำเร็จ';
            $data['msg_icon'] = 'success';
            
            
        }

        echo json_encode($data);
    }



}  
  