
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coop_Student extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'company') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        //add breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function coop_student_list()
    {
        $person_username = $this->Login_session->check_login()->login_value;
        $data['user_login'] = $this->Company_person_login->get_by_person_username($person_username)[0];
        $data['data'] = array();
        foreach($this->Coop_Student->gets_coop_student_by_company($data['user_login']['company_id']) as $row){
            $tmp_array = array();
            $tmp_array['coop_student'] = $row;
            $tmp_array['coop_student_name'] = $this->Student->get_student($row['student_id'])[0];
            $tmp_array['coop_student_job'] = $this->Job->get_job_title($row['job_id'])[0];
            $tmp_array['coop_student_company'] = $this->Company->get_company($row['company_id'])[0];
            $tmp_array['trainer'] = @$this->Trainer->get_trainer($row['trainer_id'])[0];
            array_push($data['data'], $tmp_array) ;
        }

        // print_r($data);
        $this->breadcrumbs->push('รายชื่อนิสิตสหกิจ', '/Company/Job_list_position/coop_student_list');
        $this->template->view('Company/Coop_student_list_view', $data);
    }

}  
  