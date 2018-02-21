<?php
class Coop_Student_model extends CI_model {
    var $adviser_id;
    var $trainer_id;
    var $job_id;
    var $term_id;
    var $coop_status;
    
    public function insert_coop_student($array)
    {

    }

    public function delete_coop_student($student_id)
    {

    }

    public function update_coop_student($student_id, $array)
    {
        $this->db->where('student_id',$student_id);
        return $this->db->update('coop_student',$array);
    }

    public function gets_coop_student()
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);        
        $this->db->from('coop_student');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_coop_student($student_id)
    {
        $this->db->where('student_id', $student_id);
        $this->db->from('coop_student');
        $query = $this->db->get();
        
        return $query->result_array(); 
    }

    public function gets_coop_student_by_company($company_id)
    {
        $this->db->where('company_id', $company_id);
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);        
        $this->db->from('coop_student');
        $query = $this->db->get();
        
        return $query->result_array();

    }

    public function gets_coop_student_by_trainer($trainer_id)
    {

    }

    public function gets_coop_student_by_adviser($adviser_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('adviser_id', $adviser_id);
        $this->db->from('coop_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_coop_student_by_department_company($department_id, $company_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('department_id', $department_id);
        $this->db->where('company_id', $company_id);
        $this->db->from('coop_student');
        $query = $this->db->get();
        return $query->result_array();
    }
}