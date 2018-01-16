<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coop_student_info_model extends CI_Model {
    public function get($student_id){
        $this->db->where('student_id', $student_id);
        $this->db->from('coop_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function gets(){
        $this->db->join('student', 'student.id = coop_student.student_id');
        $this->db->from('coop_student');
        $query = $this->db->get();
        return $query->result();
    }
}