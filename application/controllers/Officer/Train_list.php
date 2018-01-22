<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_list extends CI_Controller {
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

    public function index(){
        $data['data'] = array();
        //get student has test
        foreach($this->DB_train->gets() as $row) {
            //get train_type_id
            $tmp_array = array();
            $tmp_array['train'] = $row;
            $tmp_array['train_type'] = $this->DB_train_type->get($row->train_type_id);
            array_push($data['data'], $tmp_array);
        }
        $this->template->view('Officer/Train_list_view',$data);
    }
   
    public function delete($id){
            $this->DB_train->delete($id);

            redirect('Officer/Train_list?delete=1');
        }

        public function edit($id){
            $data['data'] = $this->DB_train->get($id);
            $data['train_type'] = $this->DB_train_type->gets();
            $data['train_location'] = $this->DB_train_location->gets();
            //list


            //add
            // $data['name'] = $this->DB_train_type->update('title');
            // $data['title'] = $this->DB_train_type->update('title');
            // $data['lecturer'] = $this->DB_train_type->update('lecturer');
            // $data['number_of_seat'] = $this->DB_train_type->update('number_of_seat');
            // $data['name'] = $this->DB_train_type->update('name');
            // $data['number_of_hour'] = $this->DB_train_type->update('number_of_hour');

            $this->template->view('Officer/Edit_Train_list_view', $data);
        }
        public function add(){
            $this->template->view('Officer/Add_Train_list_view');

    
        }





}