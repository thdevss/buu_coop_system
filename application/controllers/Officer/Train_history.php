<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_history extends CI_Controller {

    public function index(){
        $data['data'] = array();
        
        foreach($this->DB_train->gets() as $row) {
            
            //get student
            $tmp_array = array();
            // student
            $tmp_array['train'] = $row;
        
            // print_r($tmp_array);
            array_push($data['data'], $tmp_array);

            
            
        }

        $this->template->view('Officer/Train_history_view',$data);
    }
  }
