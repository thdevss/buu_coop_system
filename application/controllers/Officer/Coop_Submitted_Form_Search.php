<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coop_Submitted_Form_Search extends CI_Controller {
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

        public function by_student()
        {
            $term_id =  $this->Login_session->check_login()->term_id;

            $data['data'] = array();
            $cache = array();
            foreach($this->Student->gets_department() as $tmp) {
                $cache['department'][$tmp['id']] = $tmp;
            }
            
            $document_active_arr = [];
            foreach($this->Form->gets_form($term_id) as $doc) {
                if($doc['document_active'] == 1) {
                    $document_active_arr[] = $doc['id'];
                }
            }
            // $document_active = implode(",", $document_active_arr);

            foreach($this->Coop_Student->gets_coop_student() as $r) {
                $row = array();
                //check document in document active
                $row['complete_form'] = false;
                
                $doc_count = $this->Coop_Submitted_Form_Search->search_form_by_student_and_codes($r['student_id'], $document_active_arr); //รอการเช็คสถานะ

                if(count($doc_count) >= count($document_active_arr)) {
                    $row['complete_form'] = true;
                }



                $row['student'] = $this->Student->get_student($r['student_id'])[0];
                $row['student']['id_link'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$row['student']['id']).'">'.$row['student']['id'].'</a>';
                $row['department'] = $cache['department'][$row['student']['department_id']];

                array_push($data['data'], $row);
            }
            
            // add breadcrumbs
            $this->breadcrumbs->push('ตรวจสอบเอกสารรายบุคคล', '/Officer/Coop_Submitted_Form_Search/by_student');

            $this->template->view('Officer/Document_student_check_view',$data);
        }

        public function get_by_student($student_id)
        {
            $array = array();
            $array['data'] = array();
            $rowsDocument = $this->Form->gets_form();
            foreach($rowsDocument as $doc) {
                $tmp['document_code'] = $doc['name'].' - '.$doc['document_name'];
                $tmp['file'] = '';
                $file = $this->Coop_Submitted_Form_Search->search_form_by_student_and_code($student_id, $doc['id']);
                if($file) {
                    $tmp['file'] = $file[0]['pdf_file'];
                }

                array_push($array['data'], $tmp);
            }

            echo json_encode($array);
        }

        public function get_by_form_code($form_code)
        {
            $array = array();
            $document = $this->Form->get_form($form_code)[0];
            if($document) {
                foreach($this->Coop_Student->gets_coop_student() as $r) {
                    
                    $row = array();
                    $row['student'] = $this->Student->get_student($r['student_id'])[0];
                    $row['student']['id_link'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$row['student']['id']).'">'.$row['student']['id'].'</a>';                
                    $row['form'] = @$this->Coop_Submitted_Form_Search->search_form_by_student_and_code($r['student_id'], $form_code)[0];

                    $row['form']['status'] = 'ยังไม่ส่ง';
                    if(@$row['form']['pdf_file']) {
                        $late_status = '';
                        if($row['form']['document_sent_date'] >= $document['document_deadline']) {
                            $late_status = ' (<span style="color: red;">ส่งช้า</span>)';
                        }
                        $row['form']['status'] = 'ส่งแล้ว'.$late_status;
                    }

                    array_push($array, $row);
                }
            }
            
            echo json_encode($array);
        }


        public function by_form()
        {
            // get form code
            $data['forms'] = $this->Form->gets_form();

            // $rowsDocument = $this->validate_assessment_coop->gets_document();
            // $checkDocument = array(
            //     'IN-S003'
            // );

            // $data['data'] = array();
            // foreach($this->validate_assessment_coop->list() as $row) {
            //     $row->document = false;
            //     $i=0;

            //     foreach($rowsDocument as $rox) {
            //         if(in_array($rox->name, $checkDocument)) {
            //             if(@$this->validate_assessment_coop->get_by_student($row->student_id, $rox->id)[0]) {
            //                 $i++;
            //             }
            //         }
            //     }

            //     if(count($checkDocument) == $i) {
            //         $row->document = true; 
            //     }

            //     array_push($data['data'], $row);
            // }
            // add breadcrumbs
            $this->breadcrumbs->push('ตรวจสอบเอกสารเเยกประเภท', '/Officer/Coop_Submitted_Form_Search/by_form');

            $this->template->view('Officer/Document_code_check_view', $data);
        }
        
 

}