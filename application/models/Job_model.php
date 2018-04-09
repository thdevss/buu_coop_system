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
        return $this->db->update('company_job_position', array( 'job_active' => 0 ));
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
        $this->db->where('job_active', 1);
        $this->db->from('company_job_position');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function search_job_by_company_and_position($company_id, $job_title)
    {
        $this->db->where('job_active', 1);
        if($company_id > 0) {
            $this->db->where('company_id', $company_id);
        }
        if($job_title) {
            $this->db->where('position_title', $job_title);
        }
        $this->db->from('company_job_position');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_job_by_company($company_id)
    {
        $this->db->where('job_active', 1);
        $this->db->where('company_id', $company_id);
        $this->db->from('company_job_position');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function student_register_job($student_id, $job_id)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $job = $this->get_job($job_id);
        $array['company_job_position_id'] = $job_id;
        $array['company_job_position_company_id'] = $job[0]['company_id'];
        $array['student_id'] = $student_id;
        $array['datetime'] = date('Y-m_d H:i:s');
        $array['company_status_id'] = 1;
        $term = $this->Term->get_current_term();
        $array['term_id'] = $term[0]['term_id'];
        $return = $this->db->insert('company_job_position_has_student',$array);

        $this->db->db_debug = $db_debug;
        

        return $return;
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

    public function get_student_by_company_id($company_job_position_company_id)
    {
        $this->db->where('company_job_position_company_id',$company_job_position_company_id);
        $this->db->from('company_job_position_has_student');
        $qurey = $this->db->get();
        return $qurey->result_array();
    }

    public function update_student($student_id, $array)
    {
        $this->db->where('student_id', $student_id);
        return $this->db->update('company_job_position_has_student', $array);
    }

}