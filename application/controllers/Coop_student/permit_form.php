<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class permit_form  extends CI_Controller {

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

    public function index()
    {
        $student_id = $this->Login_session->check_login()->login_value;

        // $data['permit'] = @$this->Coop_student_Permit_form->get_by_student($student_id)[0];
        $data['permit'] = @$this->Coop_Student->get_permit_form_by_student($student_id)[0];
        $data['student'] = @$this->Student->get_student($student_id)[0];
        $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];

        $this->breadcrumbs->push('ดาวน์โหลดเอกสารแบบอนุญาติให้นิสิตไปปฏิบัติงานสหกิจ (IN-S003)', '/Coop_student/Permit_form');
        

        $this->template->view('Coop_student/permit_form_view',$data);

    }

    public function post()
    {


        $student_id = $this->Login_session->check_login()->login_value;
        
        $return['status'] = false;
        $return['print'] = false;
                
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('allower_fullname', 'ชื่อผู้ปกครอง', 'trim|required');
        $this->form_validation->set_rules('allower_relative', 'ความสัมพันธ์กับนิสิต', 'trim|required');
        $this->form_validation->set_rules('address_number', 'ที่อยู่: บ้านเลขที่', 'trim|required');
        $this->form_validation->set_rules('address_road', 'ที่อยู่: ถนน', 'trim|required');
        $this->form_validation->set_rules('address_district', 'ที่อยู่: ตำบล', 'trim|required');
        $this->form_validation->set_rules('address_area', 'ที่อยู่: อำเภอ', 'trim|required');
        $this->form_validation->set_rules('address_province', 'ที่อยู่: จังหวัด', 'trim|required');
        $this->form_validation->set_rules('address_postal_code', 'ที่อยู่: รหัสไปรษณีย์', 'trim|required|numeric|max_length[5]');
        $this->form_validation->set_rules('allower_telephone', 'หมายเลขโทรศัพท์', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules('allower_fax_number', 'หมายเลขโทรสาร', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules('allower_email', 'อีเมล', 'trim|required|valid_email');
        $this->form_validation->set_rules('allow_choice', 'การตอบรับ', 'trim|required|in_list[0,1]');

        if ($this->form_validation->run() != FALSE) {
            $data['allower_fullname'] =  $this->input->post('allower_fullname');
            $data['allower_relative'] = $this->input->post('allower_relative');
            $data['address_number'] = $this->input->post('address_number');
            $data['address_road'] = $this->input->post('address_road');
            $data['address_district'] = $this->input->post('address_district');
            $data['address_area'] = $this->input->post('address_area');
            $data['address_province'] = $this->input->post('address_province');
            $data['address_postal_code'] = $this->input->post('address_postal_code');
            $data['allower_email'] = $this->input->post('allower_email');
            $data['allower_telephone'] = $this->input->post('allower_telephone');
            $data['allower_fax_number'] = $this->input->post('allower_fax_number');
            $data['allow_choice'] = $this->input->post('allow_choice');
            if(!$data['allow_choice']) {
                $data['allow_choice'] = 0;
            }
            $data['student_id'] =  $student_id;

            //save
            if($this->Coop_Student->save_permit_form_by_student($data)) {
                if($this->input->post('print') == '1') {
                    //print page
                    $return['status'] = true;
                    $return['print'] = true;
                } else {
                    $return['status'] = true;
                }     
            }
        } else {
           $return['status'] = false;
           $return['message'] = strip_tags(validation_errors());
        }

        echo json_encode($return);
        
        
    }


}