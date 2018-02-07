<?php
class Coop_Student_model extends Student_model {
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

    }

    public function gets_coop_student()
    {

    }
    
    public function get_coop_student($student_id)
    {

    }

    public function gets_coop_student_by_company($company_id)
    {
        $this->db->where('company_id', $company_id);
        $this->db->from('coop_student');
        $query = $this->db->get();
        
        return $query->result_array();

    }

    public function gets_coop_student_by_trainer($trainer_id)
    {

    }

    public function gets_coop_student_by_adviser($adviser_id)
    {

    }
}