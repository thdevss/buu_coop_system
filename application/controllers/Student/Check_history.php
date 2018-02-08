<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_history extends CI_Controller {

    public function index(){

        $this->template->view('Student/Check_history_view');
    }
    
}
