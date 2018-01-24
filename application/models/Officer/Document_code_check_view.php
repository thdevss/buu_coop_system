<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class validate_assessment_type_coop_model extends CI_Model {
    public function list(){
        // $this->db->select("fullname,name");
        $this->db->join('student', 'student.id = coop_student.student_id');
        $this->db->join("student_field", "student_field.id = student.student_field_id");
        
        $this->db->from('coop_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function gets_document()
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->from('coop_document');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_student($student_id, $doc_id) 
    {
        $this->db->where('student_id', $student_id);
        $this->db->where('coop_document_id', $doc_id);
        $this->db->from('coop_student_has_coop_document');
        $query = $this->db->get();
        return $query->result();
    }


}