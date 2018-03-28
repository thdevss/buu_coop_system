<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Management_student_adviser extends CI_controller{
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
        //check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        // $this->breadcrumbs->unshift('ระบบสหกิจ', '/'); //home
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }
    public function index()
    {
        $data = array();
        $data['adviser'] = @$this->Adviser->gets_adviser();

        // addBreadcrumb
        $this->breadcrumbs->push('จัดอาจารย์ที่ปรึกษากับนิสิต', '/Officer/Management_student_adviser/index');
        $this->template->view('Officer/Management_student_adviser_view',$data);
    }
    
    public function ajax_list()
    {
        $return = array();
        //cache
        foreach(@$this->Adviser->gets_adviser() as $teacher) {
            $cache['adviser'][$teacher['id']] = $teacher;
        }
        foreach(@$this->Address->gets_address() as $address) {
            $cache['address'][$address['company_id']] = $address;
        }
        foreach(@$this->Student->gets_student() as $student) {
            $cache['student'][$student['id']] = $student;
        }

        $company_id = $this->input->get('company_id');
        if($company_id) {

            $rows = $this->Coop_Student->gets_coop_student_by_company($company_id);

            $company = $this->Company->get_company($company_id)[0];
            $cache['company'][$company['id']] = $company;
        } else {
            $rows = $this->Coop_Student->gets_coop_student();
            foreach(@$this->Company->gets_company() as $company) {
                $cache['company'][$company['id']] = $company;
            }
        }
        foreach($rows as $row)
        {
            $tmp_array = array();
            // $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
            
            $tmp_array['student'] = $cache['student'][$row['student_id']];
            $tmp_array['student']['id_link'] = '<a href="'.site_url('Officer/Student_list/student_detail/'.$tmp_array['student']['id']).'">'.$tmp_array['student']['id'].'</a>';            
            if(!$row['adviser_id']) {
                $tmp_array['adviser']['fullname'] = '-';
            } else {
                $tmp_array['adviser'] = @$cache['adviser'][$row['adviser_id']];                
            }

            $adviser_Render = '<select onchange="update_student_into_adviser('.$row['student_id'].', this.value)">';
            $adviser_Render .= '<option> ---- </option>';
            
            foreach($cache['adviser'] as $key => $adviser) {
                if($key == $row['adviser_id']) {
                    $adviser_Render .= '<option value="'.$key.'" selected>'.$adviser['fullname'].'</option>';
                } else {
                    $adviser_Render .= '<option value="'.$key.'">'.$adviser['fullname'].'</option>';
                }
            }
            $adviser_Render .= '</select>';
            $tmp_array['adviser']['select_box'] = $adviser_Render;
            
            
            if(!$row['company_id']) {
                $tmp_array['company']['name_th'] = '-';
                $tmp_array['company_address']['province'] = '-';
                $tmp_array['company_address']['area'] = '-';
            } else {
                $tmp_array['company'] = @$cache['company'][$row['company_id']];
                $tmp_array['company_address'] = @$cache['address'][$row['company_id']];                
            }

            array_push($return, $tmp_array);
        }
        echo json_encode($return);        
    }



    public function ajax_change_status()
    {
        $data = array();
        $data['status'] = false;
        $data['msg'] = 'ผิดพลาด';
        $data['msg_icon'] = 'warning';
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('adviser','adviser','required');
        if($this->form_validation->run() != false){


            $adviser = $this->input->post('adviser');
            foreach($this->input->post('students') as $student_id) {
                if($this->Coop_Student->get_coop_student($student_id)) {
                    //update status
                    $this->Coop_Student->update_coop_student($student_id, array( 'adviser_id' => $adviser ));
                }
            }
            $data['status'] = true;
            $data['msg'] = 'เปลี่ยนสถานะสำเร็จ';
            $data['msg_icon'] = 'success';
            
            
        } else {
            $data['msg'] = validation_errors();            
        }

        echo json_encode($data);
    }


    public function map_view()
    {
        $this->breadcrumbs->push('แผนที่', '/Officer/Management_student_adviser/map_view');
        $data = [];

        foreach($this->Company->gets_company() as $company) {
            $tmp['company_name_th'] = $company['name_th'];
            $tmp['map'] = @$this->Address->get_address_by_company($company['id'])[0];

            //check adviser in student
            $tmp['pin_color'] = 'FE7569';   
            $check_student = $this->Coop_Student->gets_coop_student_no_adviser_by_company($company['id']);
            if(count($check_student) < 1) {
                $tmp['pin_color'] = '1aff1a';   
                $tmp['message'] = 'นิสิตสหกิจมีอาจารย์ที่ปรึกษาครบทุกคน';
            } else {
                $tmp['message'] = 'มีนิสิตจำนวน '.count($check_student).' คน ไม่มีอาจารย์ที่ปรึกษา<br><br><a href=\''.site_url('Officer/Management_student_adviser/?company_id='.$company['id']).'\' target=\'_blank\'>จัดอาจารย์ที่ปรึกษาให้นิสิต</a>';
            }
            
            if(@$tmp['map']) {
                $data['company'][] = $tmp;
            }
        }

        $this->template->view('Officer/Coop_student_map_view',$data);
    }
}
