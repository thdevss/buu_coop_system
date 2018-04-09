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

            $user = $this->Login_session->check_login();
            if($user->login_type != 'officer') {
                redirect($this->Login_session->check_login()->login_type);
                die();
            }
            // $this->breadcrumbs->unshift('ระบบสหกิจ', '/'); //home
            $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
            $this->breadcrumbs->push('จัดการข้อมูลสถานประกอบการ', '/Officer/Company/index');            
        }

        public function step1($company_id) 
        {
            $data['company'] = $this->Company->get_company($company_id)[0];
            $data['company_address'] = @$this->Address->get_address_by_company($data['company']['id'])[0];
            $data['form_url'] = site_url('officer/company_info/post_step1');

            // add breadcrumbs
            $this->breadcrumbs->push('รายละเอียดเกี่ยวกับสถานประกอบการ/หน่วยงาน', '/Officer/company_info/step1/'.$company_id);
            
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

            $data['company_person'] = @$this->Trainer->get_trainer($data['company']['headoffice_person_id'])[0];
            $data['company_employee'] = @$this->Trainer->gets_trainer_by_company($data['company']['id']);

            $data['form_url'] = site_url('officer/company_info/post_step2');
            $data['back_url'] = site_url('officer/company_info/step1/'.$company_id);

            $data['contact_select_box'] = 0;
            if($data['company']['headoffice_person_id'] != $data['company']['contact_person_id']) {
                $data['contact_select_box'] = 1;
            }
            
            // add breadcrumbs
            $this->breadcrumbs->push('ชื่อผู้จัดการสถานประกอบการ/หัวหน้าหน่วยงาน', '/Officer/company_info/step2/'.$company_id);

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
            $data['back_url'] = site_url('officer/company_info/step2/'.$company_id);

            $data['work_form_url'] = site_url('officer/company_info/');

            $this->breadcrumbs->push('ตำแหน่งงาน', '/Officer/company_info/step2/'.$company_id);
            
            $this->template->view('Company/info/step3_view', $data);
        }

        public function post_step3()
        {
            echo "<script>alert('ok')</script>";
            redirect('officer/company/', 'refresh');
        }
        
        //job section
        public function job_add()
        {
            $data['company_id'] = $this->input->post('company_id');
            $data['position_title'] = $this->Job->get_company_job_title_by_job_title_id($this->input->post('job_title_id'))[0]['job_title'];
            $data['number_of_employee'] = $this->input->post('number_of_employee');
            $data['job_description'] = $this->input->post('job_description');
            $data['term_id'] = $this->Term->get_current_term()[0]['term_id'];

            $this->Job->insert_job($data);
            $this->session->set_flashdata('form-alert', '<div class="alert alert-success">เพิ่มงานสำเร็จ</div>');
            redirect('/officer/company_info/step3/'.$data['company_id'], 'refresh');
            // return $this->step3($data['company_id']);
        }

        public function job_hide($job_id)
        {
            $job = $this->Job->get_job($job_id);
            if($job) {
                // hide job
                $this->Job->delete_job($job_id);
                $this->session->set_flashdata('form-alert', '<div class="alert alert-primary">ลบงานสำเร็จ</div>');
                redirect('/officer/company_info/step3/'.$job[0]['company_id'], 'refresh');                
            } else {
                $this->session->set_flashdata('form-alert', '<div class="alert alert-warning">ผิดพลาด</div>');
                redirect('/officer/', 'refresh');                
            }
        }
        public function job_form_edit($job_id)
        {
            
            $data['company_job_title'] = $this->Job->gets_company_job_title();
            $data['company_job_position_by_id'] = $this->Job->get_job($job_id)[0];
            
            $data['work_form_url'] = site_url('Officer/Company_info/job_update/'.$data['company_job_position_by_id']['id']);
            //print_r($data);
            $this->template->view('company/info/job_form_view', $data);
        }

        public function job_update()
        {
            // print_r($array);
            $this->form_validation->set_rules('job_id', 'Job ID', 'required');
            $this->form_validation->set_rules('job_title_id', 'ตำแหน่ง', 'required');
            $this->form_validation->set_rules('number_of_employee', 'จำนวน', 'required|numeric');
            $this->form_validation->set_rules('job_description', 'ลักษณะงานที่นิสิตต้องปฏิบัติงาน', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $job_id = $this->input->post('job_id');
                $this->session->set_flashdata('form-alert', '<div class="alert alert-warning">แก้ไขงานไม่สำเร็จ</div>');
                redirect('Officer/Company_info/job_form_edit/'.$job_id, 'refresh');
            }
            else
            {
                $company_id = $this->input->post('company_id');
                $job_id = $this->input->post('job_id');
                $job = $this->Job->get_job($job_id);

                if($job) {
                    $array['position_title'] = $this->Job->get_company_job_title_by_job_title_id($this->input->post('job_title_id'))[0]['job_title'];                    
                    $array['number_of_employee'] = $this->input->post('number_of_employee');
                    $array['job_description'] = $this->input->post('job_description');
                
                    $this->Job->update_job($job_id, $array);
                    $this->session->set_flashdata('form-alert', '<div class="alert alert-success">แก้ไขงานสำเร็จ</div>');
                    redirect('Officer/Company_info/step3/'.$company_id, 'refresh');
                } else {
                    $job_id = $this->input->post('job_id');
                    $this->session->set_flashdata('form-alert', '<div class="alert alert-warning">แก้ไขงานไม่สำเร็จ</div>');
                    redirect('Officer/Company_info/step3/'.$company_id, 'refresh');
                }
            }

        }


}