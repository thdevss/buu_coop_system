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

        public function index($status = '') //get coop student questionaire subject
        {   
            if($status == '') {
                $status = $this->input->get('status');
            }

            if( $status == 'success'){
                $data['status']['color'] = 'success';            
                $data['status']['text'] = 'เพิ่มสำเร็จ';
            }
            else {
                $data['status'] = '';
            }

            $data['coop_student_questionnaire_subject'] = $this->Coop_Student_Assessment_Form->gets_form_for_coop_student();
            $data['next_number'] = end($data['coop_student_questionnaire_subject'])['number'];
            $data['next_number'] = (int) $data['next_number']+1;

            $this->template->view('Officer/Assessment_student_Form_Subject_view',$data);

     
        }

        public function add_coop_student_questionnaire_subject() //insert coop student questionaire subject
        {
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');
            $term_id = $this->Term->get_current_term()[0]['term_id'];
            $array['term_id'] = $term_id; 

            $this->Coop_Student_Assessment_Form->save_coop_student_form_result($array);

            // return $this->index('success');
            redirect('Officer/Assessment_coop_student_Form/index/?status=success', 'refresh');
            

        }

        public function get_coop_student_questionnaire_item($id) //get coop student questionaire item ออกมาตาม id
        { 
            $data['subject'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_subject($id)[0];  
            $data['coop_student_questionnaire_item'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($id);
            $data['next_number'] = end($data['coop_student_questionnaire_item'])['number'];
            $data['next_number'] = (float) $data['next_number']+0.1;

            $this->template->view('Officer/Assessment_student_Form_item_view',$data);
        }

        public function add_coop_student_questionnaire_item() //insert coop student questionaire item
        {
            $array['subject_id'] =$this->input->post('subject_id');
            $array['subject_term_id'] =$this->input->post('subject_term_id');
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');

            $this->Coop_Student_Assessment_Form->insert_coop_student_questionnaire_item($array);

            redirect('Officer/Assessment_coop_student_Form/get_coop_student_questionnaire_item/'.$array['subject_id'], 'refresh');
        }
    }
?>