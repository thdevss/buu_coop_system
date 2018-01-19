<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_result extends CI_Controller {

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
        $data['coop_test'] = $this->DB_coop_test->gets();
   
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

              //แปลง Excel

            }
        } else {
            $data['status'] = '1';

  
        
        }

        $this->template->view('Officer/Test_result_view',$data);
        
       
    }
}