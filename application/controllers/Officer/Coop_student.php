<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coop_student extends CI_Controller {
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

    
        public function index()
        {   
            $data = array();

            // add breadcrumbs
            $this->breadcrumbs->push('รายชื่อนิสิตสหกิจ', '/Officer/Coop_student/index');

            $this->template->view('Officer/List_coop_student_view', $data);
        }

        public function ajax_list()
        {
            $cache = array();
            foreach($this->Student->gets_student() as $tmp) {
                $cache['student'][$tmp['id']]['fullname'] = $tmp['fullname'];
                $cache['student'][$tmp['id']]['id'] = $tmp['id'];
            }
            foreach($this->Job->gets_job() as $tmp) {
                $cache['job'][$tmp['id']]['position_title'] = $tmp['position_title'];
            }
            foreach($this->Company->gets_company() as $tmp) {
                $cache['company'][$tmp['id']]['name_th'] = $tmp['name_th'];
            }
            foreach($this->Trainer->gets_trainer() as $tmp) {
                $cache['trainer'][$tmp['id']]['fullname'] = $tmp['fullname'];
            }

            $return = array();
            $return['data'] = array();

            foreach($this->Coop_Student->gets_coop_student() as $row) {
                //get student
                $tmp_array = array();
                $tmp_array['student'] = $cache['student'][$row['student_id']];
                $tmp_array['student']['id'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$tmp_array['student']['id']).'">'.$tmp_array['student']['id'].'</a>';
                $tmp_array['job_position'] = $cache['job'][$row['company_job_position_id']];
                $tmp_array['company'] = @$cache['company'][$row['company_id']];

                if($row['trainer_id'] < 1) {
                    $tmp_array['trainer']['fullname'] = ' - ';
                } else {
                    $tmp_array['trainer'] = @$cache['trainer'][$row['trainer_id']];
                }

                // print_r($tmp_array);
                array_push($return['data'], $tmp_array);
            }
    
            echo json_encode($return['data']);
        }
    
    
    
    }