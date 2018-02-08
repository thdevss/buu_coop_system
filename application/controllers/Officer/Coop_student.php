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
        if($this->Login_session->check_login()->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    
        public function index()
        {
            $data['data'] = array();
            //get student has test
            foreach($this->Coop_Student->gets_coop_student() as $row) {
                //get student
                $tmp_array = array();
                $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
    
                //get student field
                $tmp_array['position_title'] = $this->Job->get_job($row['company_job_position_id'])[0]['position_title'];
                
                //get coop test
                $tmp_array['company'] = $this->Company->get_company($row['company_id'])[0];
                
                //mentor
                $tmp_array['trainer'] = $this->Trainer->get_trainer($row['mentor_person_id'])[0];

                // print_r($tmp_array);
                array_push($data['data'], $tmp_array);
            }
    
            $this->template->view('Officer/List_coop_student_view', $data);
        }
    
    
    
    }