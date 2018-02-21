<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workplace extends CI_Controller {

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

    public function index($status = '')
    {
        if($status == '') {
            $status = $this->input->get('status');
        }

        if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'UPDATE สถานที่สำเร็จ';
        }else {
            $data['status'] = '';
        }

        $student_id = $this->Login_session->check_login()->login_value;
        $data['map'] = $this->Coop_Student->get_coop_student($student_id)[0];
        $this->template->view('Coop_student/Workplace_view',$data);
    }

    public function update()
    {
        // get
        $student_id = $this->Login_session->check_login()->login_value;
        $data['map'] = $this->Coop_Student->get_coop_student($student_id)[0];
        // update
        $array['site_latitude'] = $this->input->post('site_latitude');
        $array['site_longitude'] = $this->input->post('site_longitude');
        $this->Coop_Student->update_coop_student($student_id,$array);
        
        redirect('Coop_student/Workplace/index/?status=success','refresh');
    }
}