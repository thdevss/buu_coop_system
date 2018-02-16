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

        public function index($status = '') 
        {   
            if( $status == 'success'){
                $data['status']['color'] = 'success';            
                $data['status']['text'] = 'เพิ่มสำเร็จ';
            }
            else {
                $data['status'] = '';
            }

            $data['coop_student_questionnaire_subject'] = array();
            foreach($this->Coop_Student_Assessment_Form->gets_form_for_coop_student() as $row)
            {
               
                // $temp_array['coop_student_questionnaire_subject'][] = $row;
                array_push($data['coop_student_questionnaire_subject'], $row);

            }
            print_r($data);

            $this->template->view('Officer/Assessment_student_Form_Subject_view',$data);

     
        }

        public function add_coop_student_questionnaire_subject()
        {
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');
            $term_id = $this->Term->get_current_term()[0]['id'];
            $array['term_id'] = $term_id; 

            $this->Coop_Student_Assessment_Form->save_coop_student_form_result($array);

            return $this->index('success');

        }

        public function get_coop_student_questionnaire_item($id)
        { 
            $data['subject'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_subject($id)[0];  
            $data['coop_student_questionnaire_item'] = array();
            foreach($this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($id) as $row)
            {
               
                array_push($data['coop_student_questionnaire_item'], $row);

            }
            // echo $this->db->last_query();
            print_r($data);
            $this->template->view('Officer/Assessment_student_Form_item_view',$data);
        }

        public function add_coop_student_questionnaire_item()
        {
            $array['subject_id'] =$this->input->post('subject_id');
            $array['subject_term_id'] =$this->input->post('subject_term_id');
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');
            $this->Coop_Student_Assessment_Form->insert_coop_student_questionnaire_item($array);

            return $this->get_coop_student_questionnaire_item('success');
            
        }
    }
?>