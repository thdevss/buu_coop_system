<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_check_student extends CI_Controller {
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

    public function index($status = '')
    {
        if($status == 'error_train_id' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ไม่พบโครงการการอบรม';
        } else if($status != '' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        }  
        else {
            $data['status'] = '';
        }

        $data['data'] = array();
        //get student has test
        foreach($this->DB_train->gets() as $row) {
            //get train_type_id
            $tmp_array = array();
            $tmp_array['train'] = $row;
            $tmp_array['train_type'] = $this->DB_train_type->get($row->train_type_id);
            array_push($data['data'], $tmp_array);
        }

        $this->template->view('Officer/Train_check_student_view',$data);
    }

    public function check()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('train_id', 'train_id', 'trim|required|numeric');
        $this->form_validation->set_rules('note', 'Note', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            if(!$this->DB_train->get($this->input->post('train_id'))) {
                return $this->index('error_train_id');
                die();
            }

            //create train_set_check
            $train_set_check['train_id'] = $this->input->post('train_id');
            $train_set_check['note'] = $this->input->post('note');
            $train_set_check['datetime'] = date('Y-m-d H:i:s');
            
            $train_set_check_id = $this->DB_train_set_check->add($train_set_check);
            
            redirect('Officer/Train_check_student/check_student/'.$train_set_check_id);
        } else {
            return $this->index(validation_errors());
            die();
        }
    }

    public function check_student($check_id)
    {
        if(!$this->DB_train_set_check->get($check_id)) {
            return $this->index('error_train_id');
            die();
        }
        $data['check_id'] = $check_id;        

        $this->template->view('Officer/Train_check_student_form_view', $data);
    }

    public function ajax_get()
    {
        //get list
        //check train set
        $return['status'] = false;
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('train_set_check_id', 'train_set_check_id', 'trim|required|numeric');

        if ($this->form_validation->run() != FALSE) {
            $train_set_check_id = $this->input->post('train_set_check_id');
        
            $data['train_set_check'] = @$this->DB_train_set_check->get($train_set_check_id);
            if(!@$data['train_set_check']) {
                $return['status'] = false;
            } else {
                $return['status'] = true;
                
                $return['rows'] = array();
                //has
                foreach($this->DB_train_check_student->gets_student_by_id($train_set_check_id) as $row) {
                    $tmp = array();
                    $tmp['train_check'] = $row;
                    $tmp['student'] = $this->DB_student->get($row->student_id);
                    array_push($return['rows'], $tmp);
                }
            }
        } else {
            $return['status'] = false;
        }

        echo json_encode($return);

    }

    public function ajax_post()
    {
        $return['status'] = false;
        //post student
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('student_code', 'รหัสนิสิต', 'trim|required|numeric');
        $this->form_validation->set_rules('train_set_check_id', 'train_set_check_id', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            $return['status'] = true;

            //check student
            $data['student'] = @$this->DB_student->get($this->input->post('student_code'));
            if(!@$data['student']) {
                $return['status'] = false;                
            }


            //check train set
            $data['train_set_check'] = @$this->DB_train_set_check->get($this->input->post('train_set_check_id'));
            if(!@$data['train_set_check']) {
                $return['status'] = false;
            }

            //check train_check_student
            if(@$this->DB_train_check_student->get_by_student_train($this->input->post('student_code'), $this->input->post('train_set_check_id'))) {
                $return['status'] = false;
            }

            

            if($return['status']) {
                $return['student'] = $data['student'];                            
                //insert
                $array['train_id'] = $data['train_set_check']->train_id;
                $array['train_set_check_id'] = $this->input->post('train_set_check_id');
                $array['student_id'] = $this->input->post('student_code');
                $array['date_check'] = date('Y-m-d H:i:s');
                $array['term_id'] = $this->Login_session->check_login()->term_id;
                
                $this->DB_train_check_student->add($array);
                $return['entry_time'] = $array['date_check'];
            }
        } else {
            $return['status'] = false;            
        }

        
        echo json_encode($return);
    }





}