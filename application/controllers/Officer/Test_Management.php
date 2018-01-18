<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Management extends CI_Controller {

    public function index(){

        $this->template->view('Officer/Test_Management_view');

    }
    public function get(){
        $data['data'] = $this->Test_Management->test_management();
        print_r($data);
    }


    //test management (lists, form)
    public function lists()
    {
        $data['data'] = $this->Coop_test->get_test_lists();
        $this->template->view('Officer/Coop_test_form_management_view',$data);
    }
    
    public function post_create()
    {
        $data['name'] = $this->input->post('name');
        $data['select'] = $this->input->post('select');
        $data['test_date'] = $this->input->post('test_date');
        print_r($data);
    }
    

}