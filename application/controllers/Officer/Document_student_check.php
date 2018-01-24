<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Document_student_check extends CI_Controller {
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

        public function index()
        {
            $rowsDocument = $this->validate_assessment_coop->gets_document();
            $checkDocument = array(
                'IN-S003', 'IN-S004', 'IN-S005'
            );

            $data['data'] = array();
            foreach($this->validate_assessment_coop->list() as $row) {
                $row->document = false;
                $i=0;

                foreach($rowsDocument as $rox) {
                    if(in_array($rox->name, $checkDocument)) {
                        if(@$this->validate_assessment_coop->get_by_student($row->student_id, $rox->id)[0]) {
                            $i++;
                        }
                    }
                }

                if(count($checkDocument) == $i) {
                    $row->document = true; 
                }

                array_push($data['data'], $row);
            }
            $this->template->view('Officer/Document_student_check_view',$data);
        }

        public function get_by_student($student_id)
        {
            $array = array();
            $array['data'] = array();
            $rowsDocument = $this->validate_assessment_coop->gets_document();
            foreach($rowsDocument as $row) {
                $tmp['document_code'] = $row->name;
                $tmp['file'] = '';
                $file = @$this->validate_assessment_coop->get_by_student($student_id, $row->id)[0];
                if($file) {
                    $tmp['file'] = $file->pdf_file;
                }

                array_push($array['data'], $tmp);
            }

            echo json_encode($array);
        }
 

}