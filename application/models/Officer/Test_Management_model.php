<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Management_model extends CI_Model {
    public function test_management(){
        $this->db->select("student_id , student.fullname , student_field.name , coop_test.name");
        $this->db->from("coop_test_has_student");
        $this->db->join("student" , "student.id = student_id");
        $this->db->join("student_field" , "student_field.id = student.student_field_id");
        $this->db->join("coop_test" , "coop_test.id = coop_test_id");
        $query = $this->db->get();
        return $query->result();
    }
}