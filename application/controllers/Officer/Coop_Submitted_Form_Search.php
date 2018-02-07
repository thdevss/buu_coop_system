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
        if($this->Login_session->check_login()->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

        public function by_student()
        {
            $data['data'] = array();
            foreach($this->Coop_Student->gets_coop_student() as $r) {
                $row = array();
                $row['complete_form'] = true; //รอการเช็คสถานะ
                $row['student'] = $this->Student->get_student($r['student_id'])[0];
                $row['department'] = $this->Student->get_department($row['student']['department_id'])[0];

                
                

                array_push($data['data'], $row);
            }
            // $rowsDocument = $this->validate_assessment_coop->gets_document();
            // $checkDocument = array(
            //     'IN-S003', 'IN-S004', 'IN-S005'
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
            $array['data'] = array();
            foreach($this->Coop_Student->gets_coop_student() as $r) {
                $row = array();
                $row['student'] = $this->Student->get_student($r['student_id'])[0];
                $row['form'] = @$this->Coop_Submitted_Form_Search->search_form_by_student_and_code($r['student_id'], $form_code)[0];

                array_push($array['data'], $row);
            }
            // foreach($this->Coop_Student->gets_coop_student() as $r) {
            //     $row = array();
            //     $row['student'] = $this->Student->get_student($r['student_id'])[0];
            //     $row['form'] = @$this->Coop_Submitted_Form_Search->search_form_by_student_and_code($r['student_id'], $form_code)[0];

            //     array_push($array['data'], $row);
            // }

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
            $this->template->view('Officer/Document_code_check_view', $data);
        }
        
 

}