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

}