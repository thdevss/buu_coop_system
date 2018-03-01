<?php
class Skill_Search_model extends CI_model {
    public function search_skill_by_student($student_id)
    {
        $this->db->where('student_id',$student_id);
        $this->db->from('student_has_skill');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function search_student_by_skill($skill_id)
    {
        $this->db->where('skill_id',$skill_id);
        $this->db->from('student_has_skill');
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function skill_by_id($skill_id)
    {
        $this->db->where('skill_id',$skill_id);
        $this->db->from('skill');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_student_has_skill($array)
    {
        return $this->db->insert('student_has_skill',$array);
    }
}