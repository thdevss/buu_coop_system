<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assessment_student extends CI_Model {
    public function gets_subject() 
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->where('type', 'subject');
        $this->db->order_by('order_number', 'asc');        
        $this->db->from('coop_student_questionnaire_item');
        $query = $this->db->get();
        return $query->result();
    }

    public function gets_child($parent_id) 
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);        
        $this->db->where('parent_id', $parent_id);
        $this->db->order_by('order_number', 'asc');
        $this->db->from('coop_student_questionnaire_item');
        $query = $this->db->get();
        return $query->result();
    }


}