<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Train_register_management extends CI_Controller {

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

    public function index(){
        $data['data'] = $this->Train_register->register_Train();
        $this->template->view('Officer/Train_register_management_view',$data);
    }

    public function post_register_Train(){
        $data['name'] = $this->input->post('name');
        $data['select'] = $this->input->post('select');
        $data['test_date'] = $this->input->post('test_date');
        print_r($data);

        }

}