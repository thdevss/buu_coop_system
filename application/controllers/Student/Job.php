<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
          //add ->breadcrumbs
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }


    public function lists()
    {
        $data['company'] = $this->Company->gets_company();
        $data['job'] = $this->Job->gets_job_title();
        $student_id = $this->Login_session->check_login()->login_value;
        $data['skill_by_student'] = $this->Skill_Search->search_skill_by_student($student_id)[0];
        $data['skill'] = $this->Skill_Search->skill_by_id($data['skill_by_student']['skill_id'])[0];
        $data['data'] = array();

        foreach($this->Skilled_Job_Search->search_job_by_skill($data['skill']['skill_id']) as $row) {
        $temp = array();
        $temp['company_job_position'] = $this->Skilled_Job_Search->search_skill_by_job($row['company_job_position_id'])[0];
        $temp['company_name'] = $this->Company->get_company($row['company_job_position_company_id']);
        $temp['address_company'] = $this->Address->get_address_by_company($row['company_job_position_company_id'])[0];
        array_push($data['data'], $temp);

        }
            //print_r($data);
            //add ->breadcrumbs
        $this->breadcrumbs->push('รายการสมัคร ตำแหน่งงาน และสถานประกอบการ', '/Student/Job/lists');
        $this->template->view('Student/Report_student_info_view',$data);
    }

    public function search()
    {

    }

    public function register_form_company($company_id, $company_job_position_id)
    {
        $student_id = $this->Login_session->check_login()->login_value;
        $data['student'] = $this->Student->get_student($student_id)[0];
        $data['department'] = $this->Student->get_department($data['student']['department_id'])[0];
        $data['company'] = $this->Company->get_company($company_id)[0];
        $data['company_job_position'] = $this->Skilled_Job_Search->search_skill_by_job($company_job_position_id)[0];
        // print_r($data);

        //add ->breadcrumbs
        $this->breadcrumbs->push('รายการสมัคร ตำแหน่งงาน และสถานประกอบการ', '/Student/Job/lists');
        $this->breadcrumbs->push('แบบฟอร์มยื่นสมัครกับบริษัท', '/Student/Job/register_form_company');
        $this->template->view('Student/Register_form_company_view',$data);
    }

    public function register_status()
    {
        $data = []; //รอ
        $this->breadcrumbs->push('ประกาศผลการสมัครงาน', '/Student/Job/register_status');
        $this->template->view('Student/Register_result_view', $data);
    }

    public function print_data($company_id, $company_job_position_id)
    {
        
        $student_id = $this->Login_session->check_login()->login_value;
        
        // input form view
        // $student_telephone = $this->input->post('student_telephone');
        // $student_phone = $this->input->post('student_phone');
        // $student_email = $this->input->post('student_email');
        // $Age = $this->input->post('age');
        // $Sex = $this->input->post('sex');
        // $height = $this->input->post('height');
        // $weight = $this->input->post('weight');
       
        $data['student'] = @$this->Student->get_student($student_id)[0];
        $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];
        $data['company'] = @$this->Company->get_company($company_id)[0];
        $data['job_position_name'] = $company_job_position_id; 
        // print_r($student_id);
        // die();
        
        $template_file = "template/IN-S002-2.docx";        
        
        $save_filename = "download/".$student_id."-IN-S002.docx";
        $data_array = [
                "student_fullname" => $data['student']['fullname'],           
                "student_id" => $student_id,
                "student_telephone" => "024779640",
                "student_phone" =>  "093 995 8573",
                "student_email" => "santikon12@gmail.com",
                "ch_cs" => "",
                "ch_it" => "",
                "ch_se" => "",
                "time" => "9 ชั่วโมง",
                "round" => "1",
                "company_name_th" => $data['company']['name_th'],
                "company_job_position" => $data['job_position_name'],
                
                "Student_NameTH" => "ศานติกร",
                "Student_LNameameTH" => "อภัย",
                "Student_Nickname" => "POP",
                "Student_NameEng" => "SANTIKON",
                "Student_LNameENG" => "APAI",
                "Student_IdNum" => "1279800040028",
                "Notionnality" => "ไทย",
                "Relidion" => "พุทธ",
                "Province_Birth" => "สระแก้ว",
                "Birthday" => "1996-04-06",
                "Age" => "21",
                "Sex" => "ชาย",
                "height" => "171",
                "weight" => "62",
                "Course" => "2515013:เทคโนโลยีสารสนเทศ - 4 ปี (พิเศษ) (54)", 
                "Student_ID" => $student_id,
                "Level" => "4",
                "GPA" => "128",
                "GPAX" => "2.86",
                "Address_Number" => "56",
                "Address_Moo" => "16",
                "Address_Soi" => "สำราญวิล",
                "Address_Tumbon" => "แสนสุข",
                "Address_Aumper" => "เมืองชลบุรี",
                "Address_Province" => "ชลบุรี",
                "Address_Postcodes" => "20130",
                "Homeaddress_Number" => "56",
                "Homeaddress_Moo" => "16",
                "Homeaddress_Soi" => "สำราญวิล",
                "Homeaddress_Tumbon" => "แสนสุข",
                "Homeaddress_Aumper" => "เมืองชลบุรี",
                "Homeaddress_Province" => "ชลบุรี",
                "Homeaddress_Postcodes" => "20130",
                "student_telephone" => "029582351",
                "Student_Phone" => "093 995 8573",
                "Student_Email" => "santikon12@gmail.com",
                
                "Contact_Name" => "นางมณี  อภัย",
                "Contact_Phone" => "089 542 3940",
                "Relation" => "มารดา",
                "Contactaddress_Number" => "56/16",
                "Contactaddress_Tumbon" => "แสนสุข",
                "Contactaddress_Aumper" => "เมืองชลบุรี",
                "Contactaddress_Province" => "ชลบุรี",
                "Contactaddress_Postcode" => "20130",
                
                "Father_Name" => "ด.ต.อัศวศักดิ์  อภัย",
                "Father_Career" => "ตำรวจ",
                "Father_Phone" => "099 567 7253",
                "Father_status_l" => "*",
                "Father_Age" => "55",
                "Fatheraddress_Number" => "56",
                "Fatheraddress_Moo" => "16",
                "Fatheraddress_Soi" => "สำราญวิล",
                "Fatheraddress_Tumbon" => "แสนสุข",
                "Fatheraddress_Aumper" => "เมืองชลบุรี",
                "Fatheraddress_Province" => "ชลบุรี",
                "Fatheraddress_Postcode" => "20130",
                "Mother_Name" => "นางมณี  อภัย",
                "Mother_Career" => "ธุรกิจส่วนตัว",
                "Mother_Phone" => "089 542 3940",
                "Mother_status_l" => "*",
                "Mother_Age" => "50",
                "Motheraddress_Number" => "56",
                "Motheraddress_Moo" => "16",
                "Motheraddress_Soi" => "สำราญวิล",
                "Motheraddress_Tumbon" => "แสนสุข",
                "Motheraddress_Aumper" => "เมืองชลบุรี",
                "Motheraddress_Province" => "ชลบุรี",
                "Motheraddress_Postcode" => "20130",
                "Brethren" => "น้อง 1 คน",

        ];

        if($data['department']['id']== 1) {
            $data_array ['ch_it'] = "*";
        }else if($data['department']['id']== 2){
            $data_array ['ch_cs'] = "*";
        }else if($data['department']['id']== 3) {
            $data_array ['ch_se'] = "*";
        }

        

 
       
        // print_r($data_array);
        // die();

        $result = $this->service_docx->print_data($data_array, $template_file, $save_filename);
        // print_r($result);
        //redirect(base_url($result['full_url']), 'refresh');
        
        //insert to db
        $coop_document_id = $this->Form->get_form_by_name('IN-S002', $this->Login_session->check_login()->term_id)[0]['id'];
        $word_file = '/uploads/'.basename($save_filename);
        $this->Form->submit_document($student_id, $coop_document_id, NULL, $word_file);


        // redirect(base_url($result['full_url']), 'refresh');
        echo "
            <img src='".base_url('assets/img/loading.gif')."' />
            <script>
                window.location = '".base_url($result['full_url'])."';
                setTimeout(function(){
                    window.location = '".site_url()."';
                }, 1500);
            </script>
        ";


    }

   


}
