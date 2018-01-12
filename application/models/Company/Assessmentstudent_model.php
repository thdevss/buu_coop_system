<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessmentstudent_model extends CI_Model {

    public function get_list ($company_id = 1) {
        $this->db->select("student_id,student.fullname,student_field.name,company_job_position.position_title");
        $this->db->from("coop_student");
        $this->db->join("student","student.id = student_id");
        $this->db->join("student_field","student_field.id = student.student_field_id");
        $this->db->join("company_job_position","company_job_position.id = company_job_position_id");
        $this->db->where('coop_student.company_id' , $company_id);
        
        $query = $this->db->get();
        return $query->result();
    }
}