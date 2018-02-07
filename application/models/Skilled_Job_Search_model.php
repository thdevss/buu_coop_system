<?php
class Skilled_Job_Search_model extends CI_model {
    public function search_skill_by_job($job_id) 
    {
        $this->db->where('company_job_position_id',$job_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_job_by_skill($skill_id)
    {
        $this->db->where('skill_id');
        $query = $this->db->get();
        return $query->result_array();

    }
}