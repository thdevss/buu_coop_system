<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_document extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
        }

        //check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
        
    }

    public function index()
    {
        $this->form();
    }

    public function form()
	{
        $student_id = $this->Login_session->check_login()->login_value;
        $document_code = $this->input->post('code');
        if(!$document_code) 
            $document_code = $this->input->get('code');

        if(!$data['document'] = $this->Form->get_form_by_name($document_code)[0]) {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        
        if($this->input->post('code')) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'docx|pdf';
            $config['max_size']             = 500;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file-input')) {
                $data['status'] = $this->upload->display_errors();
            } else {
                $file = $this->upload->data();            
                $data['status'] = 'success';

                //insert to db
                @$this->Coop_Submitted_Form_Search->delete_form_by_student_and_code($student_id, $data['document']['id']);
                $insert['pdf_file'] = '/uploads/'.$file['file_name'];
                $insert['coop_document_id'] = $data['document']['id'];
                $insert['student_id'] = $student_id;
                $this->Coop_Submitted_Form_Search->insert_form_by_student_and_code($insert);
            }
        } else {
            $data['status'] = '1';

        }
        //check old document        
        $data['old_document'] = @$this->Coop_Submitted_Form_Search->search_form_by_student_and_code($student_id, $data['document']['id'])[0];
        $this->breadcrumbs->push('อัพโหลดเอกสาร'.$data['document']['document_name'].' ('.$data['document']['name'].')', '/Coop_student/upload_document/?code='.$data['document']['name']);
        

        $this->template->view('Coop_student/upload_document_view', $data);
        
       
    }

}