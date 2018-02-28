<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_info extends CI_controller
{
       public function __construct()
        {
            parent::__construct();
            //check session
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

        public function step1($company_id) 
        {
            $data['company'] = $this->Company->get_company($company_id)[0];
            $data['company_address'] = $this->Address->get_address_by_company($data['company']['id'])[0];
            $data['form_url'] = site_url('officer/company_info/post_step1');
            
            $this->template->view('Company/info/step1_view', $data);
        }

        public function post_step1()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('company_id','Company ID','required');
            $this->form_validation->set_rules('name_th','(ภาษาไทย)','required');//required ต้องการไทย
            $this->form_validation->set_rules('name_en','(ภาษาอังกฤษ)','required|alpha');
            $this->form_validation->set_rules('number','ที่อยู่เลขที่','required|alpha_dash');//required ต้องการตัวเลขและเคนื่องหมาย'/'
            $this->form_validation->set_rules('building','อาคาร','required|alpha_numeric');//required ต้องการไทย
            $this->form_validation->set_rules('road','ถนน','required');//required ต้องการไทย
            $this->form_validation->set_rules('alley','ซอย','required|alpha_numeric');//required ต้องการไทย
            $this->form_validation->set_rules('district','แขวง','required');//required ต้องการไทย
            $this->form_validation->set_rules('area','เขต/อำเภอ','required');//required ต้องการไทย
            $this->form_validation->set_rules('province','จังหวัด','required');//required ต้องการไทย
            $this->form_validation->set_rules('postal_code','รหัสไปรษณีย์','required|min_length[5]|max_length[5]');
            $this->form_validation->set_rules('company_type','ประเภทกิจการ/ธุรกิจ/ผลิตภัณฑ์/ลักษณะการดำเนินงาน','required');
            $this->form_validation->set_rules('total_employee','จำนวนพนักงาน','required|is_natural_no_zero');
            if($this->form_validation->run() == false)
            {
                
                $this->step1($this->input->post('company_id'));
                
            }
            else
            {
                // update company
                $tmp['company_id'] = $this->input->post('company_id');
                $data['company'] = $this->Company->get_company($tmp['company_id'])[0];

                $company_id = $data['company']['id'];
                $array_company['name_th'] = $this->input->post('name_th');
                $array_company['name_en'] = $this->input->post('name_en');
                $array_company['company_type'] = $this->input->post('company_type');
                $array_company['total_employee'] = $this->input->post('total_employee');
                // update company address
                $array_company_address['number'] = $this->input->post('number');
                $array_company_address['building'] = $this->input->post('building');
                $array_company_address['road'] = $this->input->post('road');
                $array_company_address['alley'] = $this->input->post('alley');
                $array_company_address['district'] = $this->input->post('district');
                $array_company_address['area'] = $this->input->post('area');
                $array_company_address['province'] = $this->input->post('province');
                $array_company_address['postal_code'] = $this->input->post('postal_code');
                // update on table
                $this->Company->update_company($company_id , $array_company);
                $this->Address->update_address($company_id , $array_company_address);
                
                redirect('officer/company_info/step2/'.$company_id, 'refresh');
            }
        }

        //==================================================================//

        public function step2($company_id) 
        {
            $data['company'] = $this->Company->get_company($company_id)[0];

            $data['company_person'] = $this->Trainer->get_trainer($data['company']['headoffice_person_id'])[0];
            $data['company_employee'] = $this->Trainer->gets_trainer_by_company($data['company']['id']);

            $data['form_url'] = site_url('officer/company_info/post_step2');
            $this->template->view('Company/info/step2_view', $data);
        }

        public function post_step2()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('radios','radios','numeric');
            $this->form_validation->set_rules('company_id','Company ID','required');
            
            if($this->form_validation->run() == false) 
            {
                $this->step2($this->input->post('company_id'));
            }
            else
            {

                $tmp['company_id'] = $this->input->post('company_id');
                $data['company'] = $this->Company->get_company($tmp['company_id'])[0];
                // update company_contact_person_id 
                $company_id = $data['company']['id'];
                $array_company['contact_person_id'] = $this->input->post('contact_person_id');
                // update on table
                $this->Company->update_company($company_id, $array_company);

                redirect('officer/company_info/step3/'.$company_id, 'refresh');
            }
        }

        //==================================================================//

        public function step3($company_id) 
        {
            $tmp['company_id'] = $company_id;
            $data['company'] = $this->Company->get_company($tmp['company_id'])[0];

            $data['company_job'] = $this->Job->gets_job_by_company($tmp['company_id']);
            $data['job_title'] = $this->Job->gets_job_title();
            $data['form_url'] = site_url('officer/company_info/post_step3');

            $this->template->view('Company/info/step3_view', $data);
        }

        public function post_step3()
        {
            echo "<script>alert('ok')</script>";
            redirect('officer/company/', 'refresh');
        }


}