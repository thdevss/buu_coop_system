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
        $data['trainer_id'] = $tmp['person_id'];
        $data['company_status_Type'] = $this->Company->gets_company_status_type();
        // print_r($this->Job->get_student_by_company_id($data['trainer_id']));
        $this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ ', '/Company/Job_list_position/index');
		    $this->template->view('Company/Job_list_position_view', $data);
    }
    
    public function ajax_list()
    {
        $tmp = $this->Trainer->get_trainer($this->Login_session->check_login()->login_value)[0];
        $company_id = $tmp['company_id'];
        $data['trainer_id'] = $tmp['person_id'];

        $return['data'] = array();

        //cache here
        foreach($this->Company->gets_company_status_type() as $rrr) {
            $cache['company_status_type'][$rrr['company_status_id']] = $rrr;
        }
        foreach($this->Student->gets_department() as $rrr) {
            $cache['department'][$rrr['department_id']] = $rrr;
        }
        foreach($this->Job->gets_job_by_company($tmp['company_id']) as $rrr) {
            $cache['job_position'][$rrr['job_id']] = $rrr;
        }

        // foreach($this->Student->gets_student() as $row)
        foreach($this->Job->get_student_by_company_id($company_id) as $row)
        {
            $tmp_array = array();
            
            $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];

            // $tmp_array['student'] = $cache['student'][$row['student_id']];
            $tmp_array['student']['id_link'] = '<a href="'.site_url('Company/Job_list_position/student_detail/'.$tmp_array['student']['student_id']).'">'.$tmp_array['student']['student_id'].'</a>';            


            $tmp_array['job_position'] = array();
            $tmp_array['job_position'] = @$cache['job_position'][$row['job_id']];
            
            $tmp_array['company_status_type'] = $cache['company_status_type'][$row['company_status_id']];

            $company_type_Render = '<select name="company_status_type" onchange="change_company_type('.$row['student_id'].', this.value)">';
            foreach($cache['company_status_type'] as $key => $coop_type) {
                if($key == $row['company_status_id']) {
                    $company_type_Render .= '<option value="'.$key.'" selected>'.$coop_type['company_status_name'].'</option>';
                } else {
                    $company_type_Render .= '<option value="'.$key.'">'.$coop_type['company_status_name'].'</option>';
                }
            }
            $company_type_Render .= '</select>';

            $tmp_array['company_status_type']['status_name'] = str_replace(" ", "", $tmp_array['company_status_type']['company_status_name']);
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
                    $this->Job->update_student($student_id, array( 'company_status_id' => $status_type ));
                    $this->Student->update_student($student_id, array( 'company_status_id' => $status_type ));
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
        $data['student'] = @$this->Student->get_student($student_id)[0];
        $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];
        $data['coop_status_type'] = @$this->Student->get_by_coop_status_type($data['student']['coop_status_id'])[0];
        $data['coop_test_status'] = @$this->Test->get_test_result_by_student($data['student']['student_id'])[0];
        if($data['student']['company_status_id'] == 5)
        {
            $data['coop_student'] = @$this->Coop_Student->get_coop_student($student_id)[0];
            
            $data['company'] = @$this->Company->get_company($data['coop_student']['company_id'])[0];
            $data['trainer'] = @$this->Trainer->get_trainer($data['coop_student']['trainer_id'])[0];
            $data['adviser'] = @$this->Adviser->get_adviser($data['coop_student']['adviser_id'])[0];
            $data['job'] = $this->Job->get_job($data['coop_student']['job_id'])[0];
        }
        $data['train_type'] = array();
        $train_type = $this->Training->get_student_stat_of_training($student_id);

        foreach($train_type['train_type'] as $type) {
            $tmp['name'] = $type['train_type_name'];
            $tmp['total_hour'] = $type['train_type_total_hour'];
            $tmp['check_hour'] = 0;
            //calc total hour
            foreach($type['history'] as $history) {
                $tmp['check_hour'] += $history['check_hour'];
            }

            array_push($data['train_type'], $tmp);
        }

        $data['student_profile'] = $this->Student->get_student_data_from_profile($student_id);
        // print_r($data);
        // die();

        // add breadcrumbs
        $this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ', '/Company/Job_list_position/index');

        $this->breadcrumbs->push('รายละเอียดนิสิต', '/Company/Job_list_position/student_detail');

        $this->template->view('Company/Student_detail_view', $data);
       
    }

    public function training_history_student($student_id)
    {

        $data['train_type'] = array();
        $train_type = $this->Training->get_student_stat_of_training($student_id);
        foreach($train_type['train_type'] as $type) {
            $tmp['name'] = $type['train_type_name'];
            $tmp['total_hour'] = $type['train_type_total_hour'];
            $tmp['check_hour'] = 0;
            //calc total hour
            foreach($type['history'] as $history) {
                $tmp['check_hour'] += $history['check_hour'];
            }
            $tmp['history'] = $type['history'];

            array_push($data['train_type'], $tmp);
        }
        $this->breadcrumbs->push('รายละเอียดนิสิต', '/Company/Job_list_position/student_detail/'.$student_id);

        $this->breadcrumbs->push('รายละเอียดเกี่ยวกับประวัติการเข้ากิจกรรมอบรม ', '/Company/Job_list_position/index');

        $this->template->view('Officer/Training_history_student_view', $data);
    }

    



}  
  