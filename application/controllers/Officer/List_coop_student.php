<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_coop_student extends CI_Controller {
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
            $data['data'] = $this->List_coop->list();
            $this->template->view('Officer/List_coop_student_view', $data);
            
        }
        public function test(){
            $data['data'] = $this->List_coop->list();
            print_r($data);
        }


        // public function get_by_student($student_id)
        // {
        //     $array = array();
        //     $array['data'] = array();
        //     $rowsDocument = $this->validate_assessment_coop->gets_document();
        //     foreach($rowsDocument as $row) {
        //         $tmp['document_code'] = $row->name;
        //         $tmp['file'] = '';
        //         $file = @$this->validate_assessment_coop->get_by_student($student_id, $row->id)[0];
        //         if($file) {
        //             $tmp['file'] = $file->pdf_file;
        //         }

        //         array_push($array['data'], $tmp);
        //     }

        //     echo json_encode($array);
        // }
 

}