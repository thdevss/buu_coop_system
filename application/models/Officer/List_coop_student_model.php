<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_coop_student_model extends CI_Model {
    public function list(){
         $this->db->select("student.id,student.fullname,position_title,name_th,company_person.fullname");
         $this->db->from('student');
        $this->db->join("coop_student", "coop_student.student_id = student.id");
        $this->db->join("company_job_position" , "company_job_position.id = company_job_position_id");
        $this->db->join("company", "company.id = coop_student.company_id");
        $this->db->join("company_person", "company_person.id = coop_student.mentor_person_id");
        $query = $this->db->get();
        return $query->result();
    }

    // public function gets_document()
    // {
    //     $this->db->where('term_id', $this->Login_session->check_login()->term_id);
    //     $this->db->from('coop_document');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function get_by_student($student_id, $doc_id) 
    // {
    //     $this->db->where('student_id', $student_id);
    //     $this->db->where('coop_document_id', $doc_id);
    //     $this->db->from('coop_student_has_coop_document');
    //     $query = $this->db->get();
    //     return $query->result();
    // }


}