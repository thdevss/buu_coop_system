<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IN_S004 extends CI_Controller {
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

        public function index($status = '')
        {
            if($status == '') {
                $status = $this->input->get('status');
            }
    
            if( $status == 'success'){
                $data['status']['color'] = 'success';            
                $data['status']['text'] = 'บันทึกสำเร็จ';
            }
            else if($status == 'error_input'){
                $data['status']['color'] = 'warning';            
                $data['status']['text'] = 'เพิ่มไม่สำเร็จ';
    
            }
            else {
                $data['status'] = '';
            }
            $student_id = $this->Login_session->check_login()->login_value;            
            $data['coop_student'] = $this->Coop_Student->get_coop_student($student_id)[0];
            $data['company'] = $this->Company->get_company($data['coop_student']['company_id'])[0];
            $data['company_address'] = $this->Address->get_address_by_company($data['coop_student']['company_id'])[0];
            $data['company_person'] = $this->Trainer->get_trainer($data['company']['headoffice_person_id'])[0];
            $data['contact_person'] = $this->Trainer->get_trainer($data['company']['contact_person_id'])[0];
            $data['trainer'] = $this->Trainer->get_trainer($data['coop_student']['trainer_id'])[0];
            $data['student_name'] = $this->Student->get_student($data['coop_student']['student_id'])[0];
            $data['student_department'] =$this->Student->get_department($data['student_name']['department_id'])[0];
            $data['company_job_position'] = $this->Job->get_job($data['coop_student']['company_job_position_id'])[0];
            $data['coop_student_dorm'] = $this->Coop_Student->get_coop_student_dorm_by_student($data['coop_student']['student_id'])[0];
            $data['coop_student_emergency_contact'] = @$this->Coop_Student->get_coop_student_emergency_contact_by_student($student_id)[0];
            // print_r($data);
                
            // add breadcrumbs
            $this->breadcrumbs->push('แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา', 'Coop_student/IN_S005_view');
            $this->template->view('Coop_student/IN_S004_view', $data);
            
        }


        public function save()
        {
            $student_id = $this->Login_session->check_login()->login_value;            
            // print_r($_POST);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('newsletter_receive', 'ไม่รับ โดยจะติดตามข่าวสาร');
            $this->form_validation->set_rules('fullname', 'ชื่อ - สกุล', 'required');
            $this->form_validation->set_rules('number', 'เลขที่', 'required');
            $this->form_validation->set_rules('alley', 'ซอย', 'required');
            $this->form_validation->set_rules('road', 'ถนน', 'required');
            $this->form_validation->set_rules('district', 'แขวง/ตำบล', 'required');
            $this->form_validation->set_rules('area', 'เขต/อำเภอ', 'required');
            $this->form_validation->set_rules('province', 'จังหวัดซอย', 'required');
            $this->form_validation->set_rules('postal_code', 'รหัสไปรษณีย์', 'required');
            $this->form_validation->set_rules('telephone', 'โทรศัพท์', 'required');
            $this->form_validation->set_rules('fax_number', 'โทรสารซอย');


            if ($this->form_validation->run() == FALSE)
                {
                    redirect('Coop_student/IN_S004/index/?status=error_input','refresh');

            }else{
                    $array_emergency_contact['student_id'] = $student_id ;
                    $array_emergency_contact['fullname'] = $this->input->post('fullname');
                    $array_emergency_contact['number'] = $this->input->post('number');
                    $array_emergency_contact['alley'] = $this->input->post('alley');
                    $array_emergency_contact['road'] = $this->input->post('road');
                    $array_emergency_contact['district'] = $this->input->post('district');
                    $array_emergency_contact['area'] = $this->input->post('area');
                    $array_emergency_contact['province'] = $this->input->post('province');
                    $array_emergency_contact['postal_code'] = $this->input->post('postal_code');
                    $array_emergency_contact['telephone'] = $this->input->post('telephone');
                    $array_emergency_contact['fax_number'] = $this->input->post('fax_number');
                    $array['newsletter_receive'] = $this->input->post('newsletter_receive');

                    $this->Coop_Student->save_emergency_contact($array_emergency_contact);
                    $this->Coop_Student->update_coop_student($student_id,$array);
                    
                
                }
                    
                redirect('Coop_student/IN_S004/index/?status=success','refresh');
        }

            


}
