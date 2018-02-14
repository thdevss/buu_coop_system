<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Assessment_coop_student_Form extends CI_Controller {
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

        public function index() {
            $data['rows'] = array();
            foreach($this->Officer_Assessment_student->gets_subject() as $r) {
                $tmp['headline_name'] = $r->title;
                $tmp['headline_id'] = $r->id;
                
                $tmp['choice'] = array();
                foreach($this->Officer_Assessment_student->gets_child($r->id) as $rx) {
                    $rtmp['name'] = $rx->title;
                    $rtmp['id'] = $rx->id;
                    
                    array_push($tmp['choice'], $rtmp);
                }

                array_push($data['rows'], $tmp);
            }
            $this->template->view('Officer/Assessment_student_Form_view', $data);
     
        }
    }
?>