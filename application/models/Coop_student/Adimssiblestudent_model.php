<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adimssiblestudent_model extends CI_Model {


        public function get_adimssiblestudent(){
            $this->db->Select('*');
            $this->db->from('company_job_position_has_student');
            $this->db->join('student','company_job_position_has_student.student_id = student.id');
            $this->db->join('student_field','student.student_field_id = student_field.id ');
            $this->db->where('student_id',57160501);

            $query = $this->db->get();
            return $query->result();
        }
}