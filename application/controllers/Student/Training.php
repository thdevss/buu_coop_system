<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function register()
    {
        $data['data'] = array();
        foreach($this->Training->get_current_register_period() as $row) {
            $row['train_type'] = $this->Training->get_type($row['train_type_id'])[0]['name'];
            
            array_push($data['data'], $row);
        }
   
        $this->template->view('Student/Train_register_view',$data);
        
    }
    
    public function check_hour(){
        $train_type = $this->get_student_stat_of_training()['train_type'];
        $data['train_type'] = array();
        foreach($train_type as $type) {
            $tmp['name'] = $type['name'];
            $tmp['total_hour'] = $type['total_hour'];
            $tmp['check_hour'] = 0;
            //calc total hour
            foreach($type['history'] as $history) {
                $tmp['check_hour'] += $history['check_hour'];
            }

            array_push($data['train_type'], $tmp);
        }

        // $data['train_type'] = $this->Training->gets_type();
        
        $this->template->view('Student/Check_hour_view', $data);
    }

    public function check_history(){
        
        // print_r($data);
        $data = $this->get_student_stat_of_training();
        $this->template->view('Student/Check_history_view', $data);
    }

    private function get_student_stat_of_training()
    {
        $student_id = $this->Login_session->check_login()->login_value;
        $data['train_type'] = array();
        foreach($this->Training->gets_type() as $type) {
            $type['history'] = array();
            foreach($this->Training->get_training_by_student_and_type($student_id, $type['id']) as $row) {
                $train_info = $this->Training->get_training($row['train_id'])[0];
                $row['train'] = $train_info;

                
                $row['is_complete_train'] = false;
                //count all checking in train id
                $check_count = count($this->Training_Check_Student->count_total_check_by_train($row['train_id']));
                //count student checking in train
                $student_count = count($this->Training_Check_Student->get_student_by_train($student_id, $row['train_id']));
                
                $row['total_hour'] = $train_info['number_of_hour'];

                $per_hour = $train_info['number_of_hour']/$check_count;
                
                if($student_count == $check_count) {
                    $row['is_complete_train'] = true;
                    $row['check_hour'] = $row['total_hour'];
                } else {
                    $row['check_hour'] = $per_hour*$student_count;
                    $row['is_complete_train'] = false;
                }

                array_push($type['history'], $row);
                
            }

            array_push($data['train_type'], $type);
        }

        return $data;
    }
}
