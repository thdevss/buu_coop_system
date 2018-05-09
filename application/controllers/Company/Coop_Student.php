
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coop_Student extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $user = $this->Login_session->check_login();
         
        if(!$user) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($user->login_type != 'company') {
            redirect($user->login_type);
            die();
        }
        //add breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function coop_student_list()
    {
        $tmp = $this->Trainer->get_trainer($this->Login_session->check_login()->login_value)[0];
        $company_id = $tmp['company_id'];

        $data['data'] = $this->Coop_Student->gets_coop_student_by_company($company_id);

        // print_r($data);
        $this->breadcrumbs->push('รายชื่อนิสิตสหกิจ', '/Company/Job_list_position/coop_student_list');
        $this->template->view('Company/Coop_student_list_view', $data);
    }

}  
  