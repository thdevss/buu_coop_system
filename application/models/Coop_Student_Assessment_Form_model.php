<?php
class Coop_Student_Assessment_Form_model extends CI_model {
    public function gets_form_for_coop_student()
    {
        $this->db->from('coop_student_questionnaire_subject');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function save_coop_student_form_result($array)
    {
        return $this->db->insert('coop_student_questionnaire_subject',$array);

    }

    public function get_result_for_coop_student($student_id)
    {
        $this->db->where('id',$student_id);
        $this->db->from('coop_student_questionnaire_subject');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_coop_student_questionnaire_item_by_subject($id)
    {
        $this->db->where('subject_id',$id);
        $this->db->from('coop_student_questionnaire_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_coop_student_questionnaire_item($id)
    {
        $this->db->where('id',$id);
        $this->db->from('coop_student_questionnaire_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_coop_student_questionnaire_item($array)
    {
        return $this->db->insert('coop_student_questionnaire_item',$array);
    } 

    public function get_coop_student_questionnaire_subject($id)
    {
        $this->db->where('id',$id);
        $this->db->from('coop_student_questionnaire_subject');
        $query = $this->db->get();
        return $query->result_array();
    }
}