<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_cooperative extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
    {
        $data['company_name'] = $this->Company->gets_company();
        $data['department_name'] = $this->Student->gets_department();
        //    get all
        $data['reports'] = $this->get_stat_all();
        $data['current_department'] = array();

        $this->template->view('Adviser/Report_cooperative_view', $data);
    }

    public function search()
    {
        $company_id = $this->input->post('company_id');
        $department_id = $this->input->post('department_id');
        if($company_id == "0") {
            $data['reports'] = $this->get_stat_all();
        } else {
            $data['reports'] = $this->get_stat($company_id, $department_id);
        }
        $data['current_company'] = $company_id;
        $data['current_department'] = $department_id;
        
        $data['company_name'] = $this->Company->gets_company();        
        $data['department_name'] = $this->Student->gets_department();

        $this->template->view('Adviser/Report_cooperative_view', $data);
    }

    private function get_stat_all()
    {
        //cache
        $cache = array();
        $cache['company'] = $this->Company->gets_company();
        //cache
        $data = array();
        $data['department'] = array();

        foreach($this->Student->gets_department() as $department) {
            $tmp = array();
            $tmp['department_name'] = $department['name'];
            $tmp['company'] = array();
            //get company
            foreach($cache['company'] as $company) {
                $tmpc = array();
                $tmpc['company_name'] = $company['name_th'];
                $tmpc['total_student'] = count($this->Coop_Student->gets_coop_student_by_department_company($department['id'], $company['id']));
                array_push($tmp['company'], $tmpc);
            }
            array_push($data['department'], $tmp);
        }


        return $data['department'];
    }


    private function get_stat($company_id, $department_id)
    {
        //cache
        $cache = array();
        $cache['company'] = $this->Company->get_company($company_id);
        //cache
        $data = array();
        $data['department'] = array();

        foreach($this->Student->gets_department() as $department) {
            if($department_id) {
                if(!in_array($department['id'], $department_id)) {
                    continue;
                }  
            }
            
            $tmp = array();
            $tmp['department_name'] = $department['name'];
            $tmp['company'] = array();
            //get company
            foreach($cache['company'] as $company) {
                $tmpc = array();
                $tmpc['company_name'] = $company['name_th'];
                $tmpc['total_student'] = count($this->Coop_Student->gets_coop_student_by_department_company($department['id'], $company['id']));
                array_push($tmp['company'], $tmpc);
            }
            array_push($data['department'], $tmp);
        }


        return $data['department'];
    }

   
}