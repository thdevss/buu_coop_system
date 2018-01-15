<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actionplanform_model extends CI_Model {
    public function gets_student_list_by_teacher ($teacher_id = 49173){
        $this->db->select("student_id, student.fullname, student_field.name, company.name_th, company_address.province");
        $this->db->from("coop_student");
        $this->db->join("student","student.id = student_id");
        $this->db->join("student_field","student_field.id = student.student_field_id");
        $this->db->join("company","company.id = coop_student.company_id");
        $this->db->join("company_address","company_address.company_id = coop_student.company_id");
        $this->db->where("coop_student.teacher_id", $teacher_id);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_student($student_id = 57160030) 
    {
        $this->db->from('coop_student_plan');
        $this->db->where('student_id', $student_id);
        $query = $this->db->get();
        return $query->result();
    }


}