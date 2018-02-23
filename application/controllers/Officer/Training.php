<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
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

    public function index($status = '')
    {
        if($status == 'success_delete' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการลบเรียบร้อย';
        } else if($status == 'error_delete' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } else if($status == 'success_insert' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'เพิ่มข้อมูลโครงการการอบรมเรียบร้อย';
        } else if($status == 'success_update' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'แก้ไขข้อมูลแก้อบรมเรียบร้อย';
        }  
        else {
            $data['status'] = '';
        }

        $data['data'] = array();
        //get student has test
        foreach($this->Training->gets_training() as $row) {
            //get train_type_id
            $tmp_array = array();
            $tmp_array['train'] = $row;
            $tmp_array['train_type'] = $this->Training->get_type($row['train_type_id'])[0];
            $tmp_array['train_location'] = $this->Training->get_location($row['train_location_id'])[0];
            
            array_push($data['data'], $tmp_array);
        }
        $this->template->view('Officer/Train_list_view',$data);
    }
   
    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('id', 'id', 'trim|required|numeric');
        
        if ($this->form_validation->run() != FALSE) {
            $id = $this->input->post('id');            

            if(@$this->DB_train->get($id)) {
                //delete
                $this->DB_train->delete($id);
                return $this->index('success_delete');
                die();
            } else {
                return $this->index();
                die();
            }
        } else {
            return $this->index('error_delete');
            die();
        }
        
    }

    public function edit($id, $status = '')
    {
        if($status == 'error_location') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอสถานที่อบรม';
        } else if($status == 'error_type') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอประเภทการอบรม';
        } else if($status != '' && !is_numeric($status)) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } else {
            $data['status'] = '';
        }

        //get id

        $data['data'] = $this->Training->get_training($id)[0];
        $data['train_type'] = $this->Training->gets_type();
        $data['train_location'] = $this->Training->gets_location();

            
        $this->template->view('Officer/Edit_Train_list_view', $data);
    }

    public function add($status = '')
    {
        if($status == 'error_location') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอสถานที่อบรม';
        } else if($status == 'error_type') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอประเภทการอบรม';
        } else if($status != '' ) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } else {
            $data['status'] = '';
        }

        $data['train_type'] = $this->Training->gets_type();
        $data['train_location'] = $this->Training->gets_location();
        $this->template->view('Officer/Add_Train_list_view', $data);
    }

    public function post_add()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('train_type', 'ประเภทการอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('title', 'ชื่อโครงการอบรม', 'trim|required');
        $this->form_validation->set_rules('lecturer', 'วิทยากร', 'trim|required');
        $this->form_validation->set_rules('number_of_seat', 'จำนวนที่นั่งเปิดรับ', 'trim|required|numeric');
        $this->form_validation->set_rules('date', 'วันที่อบรม', 'trim|required');
        $this->form_validation->set_rules('train_location', 'ห้องอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('register_period', 'วันเวลาเปิดรับสมัคร', 'trim|required');
        $this->form_validation->set_rules('number_of_hour', 'จำนวนชั่วโมงที่ได้รับ', 'trim|required|numeric');

        if ($this->form_validation->run() != FALSE) {
            //check train_location
            if(!$this->Training->get_location($this->input->post('train_location'))) {
                return $this->add('error_location');
                die();
            }
            //check train_type
            if(!$this->Training->get_type($this->input->post('train_type'))) {
                return $this->add('error_type');
                die();
            }

            //add
            $insert['train_type_id'] = $this->input->post('train_type');
            $insert['title'] = $this->input->post('title');
            $insert['lecturer'] = $this->input->post('lecturer');
            $insert['number_of_seat'] = $this->input->post('number_of_seat');
            $insert['date'] = $this->input->post('date');
            $insert['train_location_id'] = $this->input->post('train_location');
            $insert['register_period'] = $this->input->post('register_period');
            $insert['number_of_hour'] = $this->input->post('number_of_hour');
            
 
            if($this->Training->insert_training($insert)) {
                return $this->index('success_inert');
                die();
            } else {
                return $this->add('error_add');
                die();
            }
        } else {
            return $this->add(validation_errors());
            die();
        }
    }

    public function post_edit()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('id', 'primary_id', 'trim|required|numeric');
        $this->form_validation->set_rules('train_type', 'ประเภทการอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('title', 'ชื่อโครงการอบรม', 'trim|required');
        $this->form_validation->set_rules('lecturer', 'วิทยากร', 'trim|required');
        $this->form_validation->set_rules('number_of_seat', 'จำนวนที่นั่งเปิดรับ', 'trim|required|numeric');
        $this->form_validation->set_rules('date', 'วันที่อบรม', 'trim|required');
        $this->form_validation->set_rules('train_location', 'ห้องอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('register_period', 'วันเวลาเปิดรับสมัคร', 'trim|required');
        $this->form_validation->set_rules('number_of_hour', 'จำนวนชั่วโมงที่ได้รับ', 'trim|required|numeric');
        $id = $this->input->post('id');

        if ($this->form_validation->run() != FALSE) {
            //check primary key
            if(!$this->Training->get_training($id)) {
                return $this->edit($id, 'error_location');
                die();
            }
            //check train_location
            if(!$this->Training->get_location($this->input->post('train_location'))) {
                return $this->edit($id, 'error_location');
                die();
            }
            //check train_type
            if(!$this->Training->get_type($this->input->post('train_type'))) {
                return $this->edit($id, 'error_type');
                die();
            }

            //add
            $insert['train_type_id'] = $this->input->post('train_type');
            $insert['title'] = $this->input->post('title');
            $insert['lecturer'] = $this->input->post('lecturer');
            $insert['number_of_seat'] = $this->input->post('number_of_seat');
            $insert['date'] = $this->input->post('date');
            $insert['train_location_id'] = $this->input->post('train_location');
            $insert['register_period'] = $this->input->post('register_period');
            $insert['number_of_hour'] = $this->input->post('number_of_hour');
            
 
            if($this->Training->update_training($id, $insert)) {
                return $this->index('success_update');
                die();
            } else {
                return $this->edit($id, 'error_edit');
                die();
            }
        } else {
            return $this->edit($id, validation_errors());
            die();
        }
    }





}