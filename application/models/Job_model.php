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
        return $this->db->delete('company_job_position');

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

    public function gets_company_job_title()
    {
        $this->db->from('company_job_title');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_company_job_title_by_job_title_id($job_title_id)
    {
        $this->db->where('job_title_id',$job_title_id);
        $this->db->from('company_job_title');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_job_title($array)
    {
        return $this->db->insert('company_job_title',$array);
    }

    public function update_job_title($job_title_id,$array)
    {
        $this->db->where('job_title_id', $job_title_id);
        return $this->db->update('company_job_title',$array);
    }

    public function delete_job_title($job_title_id) 
    {
        $this->db->where('job_title_id', $job_title_id);
        return $this->db->delete('company_job_title');

    }
    public function check_dup_job_title($job_title)
    {
        $this->db->like('job_title',$job_title);
        $this->db->from('company_job_title');
        return $this->db->count_all_results();
    }
    public function gets_job_title()
    {
        $this->db->from('company_job_title');
        $query = $this->db->get();
        return $query->result_array();
    }

}