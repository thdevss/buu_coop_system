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

        //subject

        public function index($status = '') //get coop student questionaire subject
        {   
            if($status == '') {
                $status = $this->input->get('status');
            }

            if( $status == 'success'){
                $data['status']['color'] = 'success';            
                $data['status']['text'] = 'เพิ่มสำเร็จ';
            } else if( $status == 'error'){
                $data['status']['color'] = 'warning';            
                $data['status']['text'] = 'เลขหัวข้อซ้ำในระบบ';
            }
            else {
                $data['status'] = '';
            }

            $data['coop_student_questionnaire_subject'] = $this->Coop_Student_Assessment_Form->gets_form_for_coop_student();
            $data['next_number'] = end($data['coop_student_questionnaire_subject'])['number'];
            $data['next_number'] = (int) $data['next_number']+1;

            $this->template->view('Officer/Coop_student_assessment_form_subject_view',$data);

     
        }
        

        public function add_coop_student_questionnaire_subject() //insert coop student questionaire subject
        {
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');
            $term_id = $this->Term->get_current_term()[0]['term_id'];
            $array['term_id'] = $term_id; 
         
            if($this->Coop_Student_Assessment_Form->check_subject_dup($array['number'])) {
                //is dup, cant insert
                redirect('Officer/Assessment_coop_student_Form/index/?status=error', 'refresh');                
                
            } else {
                //can insert
                $this->Coop_Student_Assessment_Form->save_coop_student_form_result($array);
                redirect('Officer/Assessment_coop_student_Form/index/?status=success', 'refresh');                
            }

            // return $this->index('success');
            

        }






        //item

        public function get_coop_student_questionnaire_item($id) //get coop student questionaire item ออกมาตาม id
        { 
            $data['subject'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_subject($id)[0];  
            $data['coop_student_questionnaire_item'] = $this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item_by_subject($id);
            $data['next_number'] = end($data['coop_student_questionnaire_item'])['number'];
            $data['next_number'] = (float) $data['next_number']+0.1;
           
            $data['form_subject'] = $this->Coop_Student_Assessment_Form->gets_form_for_coop_student();
        
            $this->template->view('Officer/Coop_student_assessment_form_item_view',$data);
        }

        public function add_coop_student_questionnaire_item() //insert coop student questionaire item
        {
            // name dup
            $array['subject_id'] =$this->input->post('subject_id');
            $array['term_id'] = $this->Term->get_current_term()[0]['term_id'];
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');
            $array['type'] = $this->input->post('type');
            

            if($this->Coop_Student_Assessment_Form->check_item_dup($array['number'], $array['subject_id'])) {
                //is dup, cant insert
                echo "<script>alert('xxxxx')</script>";
            } else {
                //can insert
                $this->Coop_Student_Assessment_Form->insert_coop_student_questionnaire_item($array);
            }

            redirect('Officer/Assessment_coop_student_Form/get_coop_student_questionnaire_item/'.$array['subject_id'], 'refresh');
        }

        public function delete_coop_student_questionnaire_item($id) //delete coop student questionaire item
        {
            //delete
            $data = @$this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item($id)[0];
            if(!$data) {
                //is dup, cant delete
                echo "<script>alert('xxxxx');window.history.back();</script>";
                die();
            } else {
                //can delete
                $this->Coop_Student_Assessment_Form->delete_item($id);
            }


            //new sort
            $this->Coop_Student_Assessment_Form->sort_item($data['subject_id']);
            

            redirect('Officer/Assessment_coop_student_Form/get_coop_student_questionnaire_item/'.$data['subject_id'], 'refresh');
            
            
        }

        public function update_coop_student_questionnaire_item()
        {
            //update
            $item_id = $this->input->post('item_id');
            $array['title'] = $this->input->post('title');
            $array['type'] = $this->input->post('type');

            $data = @$this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item($item_id)[0];
            if(!$data) {
                //is dup, cant edit
                echo "<script>alert('xxxxx');window.history.back();</script>";
                die();
            } else {
                //can edit
                $this->Coop_Student_Assessment_Form->update_item($item_id, $array);
            }
 
            redirect('Officer/Assessment_coop_student_Form/get_coop_student_questionnaire_item/'.$data['subject_id'], 'refresh');
        }

        public function get_ajax_item($id)
        {
            $return['data'] = @$this->Coop_Student_Assessment_Form->get_coop_student_questionnaire_item($id)[0];
            echo json_encode($return);
        }
    }
?>