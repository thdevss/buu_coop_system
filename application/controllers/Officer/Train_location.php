<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_location extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		$user = $this->Login_session->check_login();
        if($user->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

    public function index($status = '')
    {
        if($status == 'success_delete' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการลบเรียบร้อย';
        } else if($status == 'error_delete' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } 
        else {
            $data['status'] = '';
        }

        $data['train_locations'] = $this->Training->gets_location();

        // add breadcrumbs
        $this->breadcrumbs->push('จัดการสถานที่อบรม', '/');

        $this->template->view('Officer/Train_location_view',$data);
    }

    public function add($status = '')
    {
        // add breadcrumbs
        $this->breadcrumbs->push('จัดการสถานที่อบรม', '/Officer/Train_location/index');
        $this->breadcrumbs->push('จัดการสถานที่อบรม', '/Officer/Train_location/add');

        $this->template->view('Officer/Train_location_form_view');
    }

    public function edit($room_id)
    {
        $data['row'] = $this->Training->get_location($room_id)[0];

        // add breadcrumbs
        $this->breadcrumbs->push('จัดการสถานที่อบรม', '/Officer/Train_location/index');
        $this->breadcrumbs->push('จัดการสถานที่อบรม', '/Officer/Train_location/edit'.$room_id);

        $this->template->view('Officer/Train_location_form_view',$data);
    }    

    public function ajax_post()
    {
        $return['status'] = false;
        $return['print'] = false;
                
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('location_building', 'ตึก', 'trim|required');
        $this->form_validation->set_rules('location_room', 'ห้อง', 'trim|required');
        $this->form_validation->set_rules('location_id', 'id', 'trim|numeric');
        
        if ($this->form_validation->run() != FALSE) {
            $data['location_building'] =  $this->input->post('location_building');
            $data['location_room'] = $this->input->post('location_room');
            $room_id = $this->input->post('location_id');
            
            //save
            if(@$this->Training->get_location($room_id)) {
                //update                
                $this->Training->update_location($room_id, $data);
            } else {
                //insert
                $this->Training->insert_location($data);                
            }

            $return['status'] = true;
        } else {
           $return['status'] = false;
           $return['message'] = strip_tags(validation_errors());
        }

        echo json_encode($return);

    }

    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('location_id', 'id', 'trim|required|numeric');
        if ($this->form_validation->run() != FALSE) {
            $location_id = $this->input->post('location_id');            
            if($this->Training->get_location($location_id)) {
                //delete
                $this->Training->delete_location($location_id);
                return $this->index('success_delete');
                die();
            } else {
                return $this->index('error_delete');
                die();
            }
        } else {
            return $this->index('error_delete');
            die();
        }
        
    }

}