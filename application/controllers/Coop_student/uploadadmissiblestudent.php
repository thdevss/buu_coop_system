<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uploadadmissiblestudent  extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index($docode)
	{
        if(!$data['doc_data'] = $this->Coop_document->get($docode)) {
            die('olo');
        }

        
        $this->template->view('Coop_student/uploadadmissiblestudent_view', $data);
       
    }

   public function upload(){
       
    $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'docx|pdf';
                $config['max_size']             = 500;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file-input'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        // $this->load->view('upload_form', $error);
                        print_r($error);
                        
                }
                else
                {
        
                        $data = array('upload_data' => $this->upload->data());

                        // $this->load->view('upload_success', $data);
                        print_r($this->upload->data());
                }
        
   }
}