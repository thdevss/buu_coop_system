<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Train_register_management_model extends CI_Model {

        public function register_Train() {
            $term_id = $this->Login_session->check_login()->term_id;
            $this->db->select("coop_test.name,test_date,register_status ");
            $this->db->from("coop_test");
            $this->db->join("term" ," term.id = term_id ");
            $this->db->where('term_id', $term_id);
            $query = $this->db->get();
            return $query->result();
        }   

        public function insert(){

        }


}