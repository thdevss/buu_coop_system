<?php
class Job_model extends CI_model {
    public function insert_job($array)
    {
        return $this->db->insert('company_job_position',$array);

    }

    public function update_job($job_id, $array)
    {
        $this->db->where('id', $job_id);
        return $this->db->update('company_job_position',$array);

    }

    public function delete_job($job_id) 
    {
        $this->db->where('id', $job_id);
        $this->db->delete('company_job_position');

    }

    public function get_job($job_id)
    {
        $this->db->where('id', $job_id);
        $this->db->from('company_job_position');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function gets_job()
    {
        $this->db->from('company_job_position');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function gets_job_by_company($company_id)
    {
        $this->db->where('company_id', $company_id);
        $this->db->from('company_job_position');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function student_register_job($student_id, $job_id)
    {
        $job = $this->get_job($job_id);
        $array['company_job_position_id'] = $job_id;
        $array['company_job_position_company_id'] = $job[0]['company_id'];
        $array['student_id'] = $student_id;
        $array['datetime'] = date('Y-m_d H:i:s');
        $array['status'] = 1;
        $term = $this->Term->get_current_term();
        $array['term_id'] = $term[0]['id'];
        $this->db->insert('company_job_position_has_student',$array);
        
    }
}