<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_list extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
        //check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        // $this->breadcrumbs->unshift('ระบบสหกิจ', '/'); //home
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function index(){

        $data['data'] = array();
        
        $data['coop_status_type'] = $this->Student->gets_coop_status_type();

        // add breadcrumbs
        $this->breadcrumbs->push('รายชื่อนิสิต', '/Officer/Student_list/index');

        $this->template->view('Officer/Student_list_view',$data);
    }

    public function ajax_list()
    {
        $return['data'] = array();

        //cache here
        foreach($this->Student->gets_coop_status_type() as $rrr) {
            $cache['coop_student_type'][$rrr['id']] = $rrr;
        }
        foreach($this->Student->gets_department() as $rrr) {
            $cache['department'][$rrr['id']] = $rrr;
        }
        foreach($this->Company->gets_company_status_type() as $rrr) {
            $cache['company_status_type'][$rrr['id']] = $rrr;
        }

        foreach($this->Student->gets_student() as $row)
        {
            $tmp_array = array();
            $tmp_array['action_box'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$row['id']).'" class="btn btn-info"><i class="fa fa-list-alt"></i> รายละเอียด</a>';
            $tmp_array['checkbox'] = '';
            
            $tmp_array['student'] = $row;
            $tmp_array['student']['gpax'] = '2.99';
            $tmp_array['student']['company_status'] = @$cache['company_status_type'][$row['company_status']]['status_name'];
            // $tmp_array['student']['company_status'] = $row['company_status'];
            
            
            if(!$row['coop_status']) {
                $row['coop_status'] = 1;
            }
            $tmp_array['coop_student_type'] = $cache['coop_student_type'][$row['coop_status']];
            $coop_type_Render = '<select onchange="change_coop_type('.$row['id'].', this.value)">';
            foreach($cache['coop_student_type'] as $key => $coop_type) {
                if($key == $row['coop_status']) {
                    $coop_type_Render .= '<option value="'.$key.'" selected>'.$coop_type['status_name'].'</option>';
                } else {
                    $coop_type_Render .= '<option value="'.$key.'">'.$coop_type['status_name'].'</option>';
                }
            }
            $coop_type_Render .= '</select>';
            $tmp_array['coop_student_type']['status_name'] = str_replace(" ", "", $tmp_array['coop_student_type']['status_name']);
            $tmp_array['coop_student_type']['select_box'] = $coop_type_Render;
            
            $tmp_array['department'] = $cache['department'][$row['department_id']];
            // $tmp_array['coop_student_type'] = $this->Student->get_by_coop_status_type($row['coop_status'])[0];
            // $tmp_array['department'] = $this->Student->get_department($row['department_id'])[0];
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
        $status_true = false;
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status','status','required|numeric');
        if($this->form_validation->run() != false){

            $term_id = $this->Term->get_current_term()[0]['term_id'];

            $status_type = (int) $this->input->post('status');
            foreach($this->input->post('students') as $student_id) {
                if($this->Student->get_student($student_id)) {
                    //update status
                    //check has coop student
                    $coop_student = $this->Coop_Student->get_coop_student($student_id);
                    if(count($coop_student) > 0) {
                        $this->Coop_Student->delete_coop_student($student_id);
                    }

                    if($status_type == 7) {
                        //get company job position tbl
                        $job = $this->Student->get_latest_register_job($student_id);
                        if(count($job) < 1) {
                            continue;
                        }
                        
                        $job = $job[0];
                        $student = $this->Student->get_student($student_id)[0];
                        
                        $array = [
                            'student_id' => $student_id,
                            'department_id' => $student['department_id'],
                            'term_id' => $term_id,

                            'company_id' => $job['company_job_position_company_id'],
                            'company_job_position_id' => $job['company_job_position_id'],

                            'trainer_id' => 0,
                            'adviser_id' => '',
                        ];
                        $status_true = $this->Coop_Student->insert_coop_student($array);
                        $status_true = $this->Student->update_student($student_id, array( 'coop_status' => $status_type ));                        
                        // echo $this->db->last_query();
                    } else {
                        $status_true = $this->Student->update_student($student_id, array( 'coop_status' => $status_type ));                        
                    }
                }
            }
            
            if($status_true) {
                $data['status'] = true;
                $data['msg'] = 'เปลี่ยนสถานะสำเร็จ';
                $data['msg_icon'] = 'success';
            }
            
            
        }

        echo json_encode($data);
    }



    public function student_detail($student_id)
    {
        $data['student'] = @$this->Student->get_student($student_id)[0];
        $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];
        $data['coop_status_type'] = @$this->Student->get_by_coop_status_type($data['student']['coop_status'])[0];
        $data['coop_test_status'] = @$this->Test->get_test_result_by_student($data['student']['id'])[0];
        if($data['student']['company_status'] == 5)
        {
            $data['coop_student'] = @$this->Coop_Student->get_coop_student($student_id)[0];
            
            $data['company'] = @$this->Company->get_company($data['coop_student']['company_id'])[0];
            $data['trainer'] = @$this->Trainer->get_trainer($data['coop_student']['trainer_id'])[0];
            $data['adviser'] = @$this->Adviser->get_adviser($data['coop_student']['adviser_id'])[0];
            $data['job'] = $this->Job->get_job($data['coop_student']['company_job_position_id'])[0];
        }
        $data['train_type'] = array();
        $train_type = $this->Training->get_student_stat_of_training($student_id);
        foreach($train_type['train_type'] as $type) {
            $tmp['name'] = $type['name'];
            $tmp['total_hour'] = $type['total_hour'];
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
        $this->breadcrumbs->push('รายละเอียดนิสิต', '/Officer/Student_list/student_detail');

        $this->template->view('Officer/Student_detail_view', $data);
       
    }

    public function training_history_student($student_id)
    {

        $data['train_type'] = array();
        $train_type = $this->Training->get_student_stat_of_training($student_id);
        foreach($train_type['train_type'] as $type) {
            $tmp['name'] = $type['name'];
            $tmp['total_hour'] = $type['total_hour'];
            $tmp['check_hour'] = 0;
            //calc total hour
            foreach($type['history'] as $history) {
                $tmp['check_hour'] += $history['check_hour'];
            }
            $tmp['history'] = $type['history'];

            array_push($data['train_type'], $tmp);
        }
        $this->template->view('Officer/Training_history_student_view', $data);
    }

    public function update_pass_subject()
    {
        $return['status'] = false;
        $student_id = $this->input->post('student_id');
        $student_pass_subject = $this->input->post('student_pass_subject');
        
        if( $this->Student->update_student($student_id, [ 'student_pass_subject' => $student_pass_subject ]) ) {
            $return['status'] = true;
        }
        echo json_encode($return);
    }

  }
