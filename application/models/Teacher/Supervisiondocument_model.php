<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supervisiondocument_model extends CI_Model {
    public function planform (){
        $this->db->select("student_id, student.fullname, student_field.name, company.name_th, company_address.province");
        $this->db->from("coop_student");
        $this->db->join("student","student.id = student_id");
        $this->db->join("student_field","student_field.id = student.student_field_id");
        $this->db->join("company","company.id = coop_student.company_id");
        $this->db->join("company_address","company_address.company_id = coop_student.company_id");
        $this->db->where("coop_student.teacher_id = 49173");

        $query = $this->db->get();
        return $query->result();
    }
    public function pdf_file_document(){
        $this->db->select("pdf_file");
        $this->db->from("coop_student_has_coop_document");
        $this->db->where("student_id = 57160030");

        $query = $this->db->get();
        return $query->result();


    }


}