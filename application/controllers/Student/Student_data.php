<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_data extends CI_Controller {

    public function index(){

        $data['data'] = $this->Train->get_list();
        $this->template->view('Student/Student_data_view',$data);
    }

}