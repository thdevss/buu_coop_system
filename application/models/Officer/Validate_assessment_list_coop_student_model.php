<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Validate_assessment_list_coop_student_model extends CI_Model {
    public function list(){
        // $this->db->select("fullname,name");
        $this->db->join('student', 'student.id = coop_student.student_id');
        $this->db->join("student_field", "student_field.id = student.student_field_id");
        
        $this->db->from('coop_student');
        $query = $this->db->get();
        return $query->result();
    }


}