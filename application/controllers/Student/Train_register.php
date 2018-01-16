<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_register extends CI_Controller {

    public function index(){
        $this->template->view('Student/Train_register_view');
    }
    public function get_train(){
        $data['data'] = $this->Train->get_list();
        print_r($data);
    }

}