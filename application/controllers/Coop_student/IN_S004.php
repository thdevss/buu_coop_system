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
                    $this->index();

            }else {
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

                    $sql_status = false;
                    $sql_status = $this->Coop_Student->save_emergency_contact($array_emergency_contact);
                    $sql_status = $this->Coop_Student->update_coop_student($student_id,$array);
                    if($sql_status) {
                        //chek=c if print
                        if($this->input->post('print') == 1){
                            $this->print_data();

                        }else {
                            redirect('Coop_student/IN_S004/index/?status=success','refresh');
                        }
                        
                    } else {
                        redirect('Coop_student/IN_S004/index/?status=error_input','refresh');
                    }
                    
                
                }
        }

        public function print_data()
    {
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


        $full_address = $data['company_address']['number']."".
            $data['company_address']['building']."".
            $data['company_address']['alley']."".
            $data['company_address']['road']."".
            $data['company_address']['district']."".
            $data['company_address']['area']."".
            $data['company_address']['province']."".
            $data['company_address']['postal_code'] ;
            
        $template_file = "template/IN-S004-0.docx";        
        if($data['coop_student']['newsletter_receive'] == 1) {
            $template_file = "template/IN-S004-1.docx";
        }else if($data['coop_student']['newsletter_receive'] == 2) {
            $template_file = "template/IN-S004-2.docx";
        }

        $save_filename = "download/".$student_id."-IN-S004.docx";
        $data_array = [
            "company_name_th" => $data['company']['name_th'],
            "company_address" => $full_address,
            "company_telephone" => $data['company_person']['telephone'],
            "company_fax_number" => $data['company_person']['fax_number'],
            "company_email" => $data['company_person']['email'],
            "company_person_fullname" => $data['company_person']['fullname'],
            "company_person_position" => $data['company_person']['position'],
            "contact_person_fullname" => $data['contact_person']['fullname'],
            "contact_person_position" => $data['contact_person']['position'],
            "contact_person_department" => $data['contact_person']['department'],
            "contact_person_telephone" => $data['contact_person']['telephone'],
            "contact_person_fax_number" => $data['contact_person']['fax_number'],
            "contact_person_email" => $data['contact_person']['email'],

            "cn_a" => "",
            "cn_b" => "",

            "trainer_fullname" => $data['trainer']['fullname'],
            "trainer_position" => $data['trainer']['position'],
            "trainer_dapartment" => $data['trainer']['department'],
            "trainer_telephone" => $data['trainer']['telephone'],
            "trainer_fax_number" => $data['trainer']['fax_number'],
            "trainer_emaill" => $data['trainer']['email'],
            "student_name_fullnam" => $data['student_name']['fullname'],
            "student_name_id" => $data['student_name']['id'],
            "student_department_name" => $data['student_department']['name'],
            "student_faculty" => 'คณะวิทยาการสารสนเทศ',
            "company_job_position_title" => $data['company_job_position']['position_title'],
            "company_job_job_description" => $data['company_job_position']['job_description'],
            "coop_student_dorm_name" => $data['coop_student_dorm']['dorm_name'],
            "copp_student_dorm_room" => $data['coop_student_dorm']['dorm_room'],
            "coop_student_dorm_number" => $data['coop_student_dorm']['number'],
            "coop_student_dorm_alley" => $data['coop_student_dorm']['alley'],
            "coop_student_road" => $data['coop_student_dorm']['road'],
            "coop_student_dorm_district" => $data['coop_student_dorm']['district'],
            "coop_student_dorm_area" => $data['coop_student_dorm']['area'],
            "coop_student_dorm_province" => $data['coop_student_dorm']['province'],
            "coop_student_dorm_postal_code" => $data['coop_student_dorm']['postal_code'],
            "coop_student_dorm_telephone" => $data['coop_student_dorm']['telephone'],
            "coop_student_dorm_fax_number" => $data['coop_student_dorm']['fax_number'],
            "emergency_contact_fullname" => $data['coop_student_emergency_contact']['fullname'],
            "emergency_contact_number" => $data['coop_student_emergency_contact']['number'],
            "emergency_contact_alley" => $data['coop_student_emergency_contact']['alley'],
            "emergency_contact_road" => $data['coop_student_emergency_contact']['road'],
            "emergency_contact_district" => $data['coop_student_emergency_contact']['district'],
            "emergency_contact_area" => $data['coop_student_emergency_contact']['area'],
            "emergency_contact_province" => $data['coop_student_emergency_contact']['province'],
            "emergency_contact_postal_code" => $data['coop_student_emergency_contact']['postal_code'],
            "emergency_contact_telephone" => $data['coop_student_emergency_contact']['telephone'],
            "emergency_contact_fax_number" => $data['coop_student_emergency_contact']['fax_number'],

        ];


        if($data['company']['headoffice_person_id'] == $data['company']['contact_person_id']) {
            $data_array['cn_a'] = "*";
                
        }else{
            $data_array['cn_b'] = "*";
        }
 
       
        // print_r($data_array);
        // die();

        $result = $this->service_docx->print_data($data_array, $template_file, $save_filename);
        // print_r($result);
        redirect(base_url($result['full_url']), 'refresh');

    }


            


}
