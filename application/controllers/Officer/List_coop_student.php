<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_coop_student extends CI_Controller {
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

        // public function index()
        // {
        //     $data['data'] = $this->List_coop->list();
        //     $this->template->view('Officer/List_coop_student_view', $data);
            
        // }
        // public function test(){
        //     $data['data'] = $this->List_coop->list();
        //     print_r($data);
        // }

        // public function get(){
        //     $data['data'] = $this->Test_Management->test_management();
        //     print_r($data);
        // }
    
        public function index()
        {
            $data['data'] = array();
            //get student has test
            foreach($this->DB_coop_student->gets() as $row) {
                //get student
                $tmp_array = array();
                $tmp_array['student'] = $this->DB_student->get($row->student_id);
    
                //get student field
                $tmp_array['position_title'] = $this->DB_company_job_position->get($row->company_job_position_id)->position_title;
                
                //get coop test
                $tmp_array['company'] = $this->DB_company->get($row->company_id);
                
                //mentor
                $tmp_array['mentor_person_id'] = $this->DB_company_person->get($row->mentor_person_id);

                // print_r($tmp_array);
                array_push($data['data'], $tmp_array);
            }
    
            $this->template->view('Officer/List_coop_student_view', $data);
        }
    
    
        //test management (lists, form)
        public function lists()
        {
            $data['data'] = $this->Coop_test->get_test_lists();
            $this->template->view('Officer/Coop_test_form_management_view',$data);
        }
        
        public function post_create()
        {
            $data['name'] = $this->input->post('name');
            $data['select'] = $this->input->post('select');
            $data['test_date'] = $this->input->post('test_date');
            print_r($data);
        }
        
    
    }