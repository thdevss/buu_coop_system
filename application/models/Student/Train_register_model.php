<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_register_model extends CI_Model {

    public function get_list(){
    $this->db->select("*");
    $this->db->from("train");
    $this->db->join("student_train_register","train.id = train_id ");
    $query = $this->db->get();
    return $query->result();
    }

}