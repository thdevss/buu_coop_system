<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Assessment_company_Form extends CI_Controller {
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

            $data['company_questionnaire_subject'] = $this->Company_Assessment_Form->gets_form_for_company();
            $data['next_number'] = end($data['company_questionnaire_subject'])['number'];
            $data['next_number'] = (int) $data['next_number']+1;

            // add breadcrumbs
            $this->breadcrumbs->push('จัดการแบบฟอร์มประเมินผลสถานประกอบการ', '/Officer/Assessment_company_Form/index');

            $this->template->view('Officer/Company_assessment_form_subject_view',$data);

     
        }
        

        public function add_company_questionnaire_subject() //insert coop student questionaire subject
        {
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');
            $term_id = $this->Term->get_current_term()[0]['term_id'];
            $array['term_id'] = $term_id; 
         
            if($this->Company_Assessment_Form->check_subject_dup($array['number'])) {
                //is dup, cant insert
                redirect('Officer/Assessment_company_Form/index/?status=error', 'refresh');                
                
            } else {
                //can insert
                $this->Company_Assessment_Form->save_company_form_result($array);
                redirect('Officer/Assessment_company_Form/index/?status=success', 'refresh');                
            }

            // return $this->index('success');
            

        }






        //item

        public function get_company_questionnaire_item($id) //get coop student questionaire item ออกมาตาม id
        { 
            $data['subject'] = $this->Company_Assessment_Form->get_company_questionnaire_subject($id)[0];  

            $data['company_questionnaire_item'] = $this->Company_Assessment_Form->get_company_questionnaire_item_by_subject($id);
            $data['next_number'] = end($data['company_questionnaire_item'])['number'];
            if($data['next_number'] < 1) {
                $data['next_number'] = $data['subject']['number'];
            }
            $data['next_number'] = (float) $data['next_number']+0.1;
           
            $data['form_subject'] = $this->Company_Assessment_Form->gets_form_for_company();

            // add breadcrumbs
            $this->breadcrumbs->push('จัดการแบบฟอร์มประเมินผลสถานประกอบการ', '/Officer/Assessment_company_Form/index');
            $this->breadcrumbs->push('จัดการหัวข้อย่อยแบบประเมินผลสถานประกอบการ', '/Officer/Assessment_company_Form/get_company_questionnaire_item'.$id);
        
            $this->template->view('Officer/Company_assessment_form_item_view',$data);
        }

        public function add_company_questionnaire_item() //insert coop student questionaire item
        {
            // name dup
            $array['subject_id'] =$this->input->post('subject_id');
            $array['term_id'] = $this->Term->get_current_term()[0]['term_id'];
            $array['number'] = $this->input->post('number');
            $array['title'] = $this->input->post('title');
            $array['type'] = $this->input->post('type');
            $array['description'] = $this->input->post('description');

            

            if($this->Company_Assessment_Form->check_item_dup($array['number'], $array['subject_id'])) {
                //is dup, cant insert
                echo "<script>alert('xxxxx')</script>";
            } else {
                //can insert
                $this->Company_Assessment_Form->insert_company_questionnaire_item($array);
            }

            redirect('Officer/Assessment_company_Form/get_company_questionnaire_item/'.$array['subject_id'], 'refresh');
        }

        public function delete_company_questionnaire_item($id) //delete coop student questionaire item
        {
            //delete
            $data = @$this->Company_Assessment_Form->get_company_questionnaire_item($id)[0];
            if(!$data) {
                //is dup, cant delete
                echo "<script>alert('xxxxx');window.history.back();</script>";
                die();
            } else {
                //can delete
                $this->Company_Assessment_Form->delete_item($id);
            }


            //new sort
            $this->Company_Assessment_Form->sort_item($data['subject_id']);
            

            redirect('Officer/Assessment_company_Form/get_company_questionnaire_item/'.$data['subject_id'], 'refresh');
            
            
        }

        public function update_company_questionnaire_item()
        {
            //update
            $item_id = $this->input->post('item_id');
            $array['title'] = $this->input->post('title');
            $array['type'] = $this->input->post('type');
            $array['descriptions'] = $this->input->post('descriptions');

            $data = @$this->Company_Assessment_Form->get_company_questionnaire_item($item_id)[0];
            if(!$data) {
                //is dup, cant edit
                echo "<script>alert('xxxxx');window.history.back();</script>";
                die();
            } else {
                //can edit
                $this->Company_Assessment_Form->update_item($item_id, $array);
            }
 
            redirect('Officer/Assessment_company_Form/get_company_questionnaire_item/'.$data['subject_id'], 'refresh');
        }

        public function get_ajax_item($id)
        {
            $return['data'] = @$this->Company_Assessment_Form->get_company_questionnaire_item($id)[0];
            echo json_encode($return);
        }
    }
?>