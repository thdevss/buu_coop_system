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
        
        if(!$this->Skill_Search->search_skill_by_student($student_id)){
            redirect('Student/Skill/index?status=select_before', 'refresh');
        }else{
            // $data['skill_by_student'] = $this->Skill_Search->search_skill_by_student($student_id)[0];
            
            // if($this->Skill_Search->skill_by_id($data['skill_by_student']['skill_id'])){
            //     $data['skill'] = $this->Skill_Search->skill_by_id($data['skill_by_student']['skill_id'])[0];
            // }
        }

        
        $data['data'] = array();
        // foreach($this->Skilled_Job_Search->search_job_by_skill($data['skill']['skill_id']) as $row) {
        foreach($this->Job->gets_job() as $row) {
            // print_r($row);
            $temp = array();
            // $temp['company_job_position'] = $this->Skilled_Job_Search->search_skill_by_job($row['company_job_position_id'])[0];
            $temp['company_job_position'] = $row;
            
            $temp['company_name'] = @$this->Company->get_company($row['company_id']);
            $temp['address_company'] = @$this->Address->get_address_by_company($row['company_id'])[0];

            if(
                $temp['address_company'] &&
                $temp['company_name']
            ) {
                array_push($data['data'], $temp);
            }

        }
            // print_r($data);
            // die();
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
        $data['student_profile'] = $this->Student->get_student_data_from_profile($student_id);
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
        $student_telephone = $this->input->post('telaphone');
        $student_phone = $this->input->post('phone');
        $student_email = $this->input->post('email');
        $Student_Nickname = $this->input->post('student_nickname');
        $Age = $this->input->post('age');
        $height = $this->input->post('height');
        $weight = $this->input->post('weight');
        $Level = $this->input->post('level');
        $Address_Number = $this->input->post('address');
        $address_telephone = $this->input->post('address_telephone');
        $address_phone = $this->input->post('address_phone');
        $address_email = $this->input->post('address_email');
        $Contact_Phone = $this->input->post('contact_telephone');
        $Relation = $this->input->post('contact_status');
        $Father_Career = $this->input->post('father_caree');
        $Father_Phone = $this->input->post('father_telephone');
        $Mother_Career = $this->input->post('mather_caree');
        $Mother_Phone = $this->input->post('mather_telephone');
        $job_student = $this->input->post('job_student');
        $computer_student = $this->input->post('computer_student');
        $detail_student = $this->input->post('detail_student');

        // get form model
        $data['student_profile'] = $this->Student->get_student_data_from_profile($student_id);
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
                "student_telephone" => $student_telephone,
                "student_phone" =>  $student_phone,
                "student_email" => $student_email,
                "ch_cs" => "",
                "ch_it" => "",
                "ch_se" => "",
                "time" => "9 ชั่วโมง",
                "round" => "1",
                "company_name_th" => $data['company']['name_th'],
                "company_job_position" => $data['job_position_name'],
                "Prefix" => $data['student_profile']['Prefix'], 
                "Student_NameTH" => $data['student_profile']['Student_NameTH'],
                "Student_LNameameTH" => $data['student_profile']['Student_LNameTH'],
                "Student_Nickname" => $Student_Nickname,
                "Student_NameEng" => $data['student_profile']['Student_NameEng'],
                "Student_LNameENG" => $data['student_profile']['Student_LNameENG'],
                "Student_IdNum" => $data['student_profile']['Student_IdNum'],
                "Notionnality" => $data['student_profile']['Notionnality'],
                "Relidion" => $data['student_profile']['Relidion'],
                "Province_Birth" => $data['student_profile']['Province_Birth'],
                "Birthday" => thaiDate($data['student_profile']['Birthday'], false, false),
                "Age" => $Age,
                "Sex" => "",
                "height" => $height,
                "weight" => $weight,
                "Course" => $data['department']['name'], 
                "Student_ID" => $data['student_profile']['Student_ID'],
                "Level" => $Level,
                "GPA" => "128",
                "GPAX" => "2.86",
                "Address_Number" => $Address_Number,
                "Homeaddress_Number" => $data['student_profile']['Homeaddress_Number'],
                "Homeaddress_Moo" => $data['student_profile']['Homeaddress_Moo'],
                "Homeaddress_Soi" => $data['student_profile']['Homeaddress_Soi'],
                "Homeaddress_Tumbon" => $data['student_profile']['Homeaddress_Tumbon'],
                "Homeaddress_Aumper" => $data['student_profile']['Homeaddress_Aumper'],
                "Homeaddress_Province" => $data['student_profile']['Homeaddress_Province'],
                "Homeaddress_Postcodes" => $data['student_profile']['Homeaddress_Postcode'],
                "Student_Telephone" => $address_telephone,
                "Student_Phone" => $address_phone,
                "Student_Email" => $address_email,
                
                "Contact_Name" => $data['student_profile']['Contact_Name'],
                "Contact_Phone" => $Contact_Phone,
                "Relation" => $Relation,
                "Contactaddress_Number" => $data['student_profile']['Contactaddress_Number'],
                "Contactaddress_Tumbon" => $data['student_profile']['Contactaddress_Tumbon'],
                "Contactaddress_Aumper" => $data['student_profile']['Contactaddress_Aumper'],
                "Contactaddress_Province" => $data['student_profile']['Contactaddress_Province'],
                "Contactaddress_Postcode" => $data['student_profile']['Contactaddress_Postcode'],
                
                "Father_Name" => $data['student_profile']['Contactaddress_Number'],
                "Father_Career" => $Father_Career,
                "Father_Phone" => $Father_Phone,
                "Father_status_l" => "*",
                "Father_Age" => "55",
                "Fatheraddress_Number" => $data['student_profile']['Parentaddress_Number'],
                "Fatheraddress_Moo" => $data['student_profile']['Parentaddress_Moo'],
                "Fatheraddress_Soi" => $data['student_profile']['Parentaddress_Soi'],
                "Fatheraddress_Tumbon" => $data['student_profile']['Parentaddress_Tumbon'],
                "Fatheraddress_Aumper" => $data['student_profile']['Parentaddress_Aumper'],
                "Fatheraddress_Province" => $data['student_profile']['Parentaddress_Province'],
                "Fatheraddress_Postcode" => $data['student_profile']['Parentaddress_Postcode'],
                "Mother_Name" => $data['student_profile']['Mother_Name'],
                "Mother_Career" => $Mother_Career,
                "Mother_Phone" => $Mother_Phone,
                "Mother_status_l" => "*",
                "Mother_Age" => "50",
                "Motheraddress_Number" => $data['student_profile']['Parentaddress_Number'],
                "Motheraddress_Moo" => $data['student_profile']['Parentaddress_Moo'],
                "Motheraddress_Soi" => $data['student_profile']['Parentaddress_Soi'],
                "Motheraddress_Tumbon" => $data['student_profile']['Parentaddress_Tumbon'],
                "Motheraddress_Aumper" => $data['student_profile']['Parentaddress_Aumper'],
                "Motheraddress_Province" => $data['student_profile']['Parentaddress_Province'],
                "Motheraddress_Postcode" => $data['student_profile']['Parentaddress_Postcode'],
                "Brethren" => "น้อง 1 คน",

        ];

        if($data['department']['id']== 1) {
            $data_array ['ch_it'] = "*";
        }else if($data['department']['id']== 2){
            $data_array ['ch_cs'] = "*";
        }else if($data['department']['id']== 3) {
            $data_array ['ch_se'] = "*";
        }

        if($data['student_profile']['Prefix']== "นาย") {
            $data_array ['Sex'] = "ชาย";
        }else if ($data['student_profile']['Prefix']== "นางสาว") {
            $data_array ['Sex'] = "หญิง";
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
