<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coop_document_model extends CI_Model {

    public function gets_document()
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->from('coop_document');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_name($document_name)
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->where('name', $document_name);
        
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

    public function insert_by_student($array)
    {
        return $this->db->insert('coop_student_has_coop_document', $array);
    }

    public function delete_by_student($student_id, $coop_document_id)
    {
        $this->db->where('student_id', $student_id);
        $this->db->where('coop_document_id', $coop_document_id);
        return $this->db->delete('coop_student_has_coop_document');
    }
    
}