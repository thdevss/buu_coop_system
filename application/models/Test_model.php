<?php
class Test_model extends CI_model {
    public function gets_test() 
    {
        
        $this->db->where('term_id', $this->Term->get_current_term()[0]['id']);        
        $this->db->from('coop_test');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_test($test_id)
    {
        $this->db->where('id',$test_id);
        $this->db->from('coop_test');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function insert_test($array)
    {
        return $this->db->insert('coop_test',$arrray);

    }

    public function update_test($test_id, $array)
    {
        $this->db->where('id',$test_id);
        return $this->db->update('coop_test',$array);

    }

    public function get_test_result_by_student($student_id)
    {
        $this->db->where('student_id',$student_id);
        $this->db->from('coop_test_has_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_test_pass_by_student($student_id)
    {
        $this->db->where('coop_test_status', 1);
        $this->db->where('student_id', $student_id);
        $this->db->from('coop_test_has_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_student($student_id, $test_id)
    {
        $array['coop_test_id'] = $test_id;
        $term = $this->Term->get_current_term();
        $array['coop_test_term_id'] = $term[0]['id'];
        $array['student_id'] = $student_id;
        $array['student_term_id'] = $term[0]['id'];
        $array['coop_test_status'] = 0;
        return $this->db->insert('coop_test_has_student',$array);

    }

    public function delete_student($student_id, $test_id)
    {
        $this->db->where('student_id',$student_id);
        $this->db->where('coop_test_id',$test_id);
        return $this->db->delete('coop_test_has_student');

    }

    public function get_test_result_by_test($test_id)
    {
        $this->db->where('coop_test_id',$test_id);
        $this->db->from('coop_test_has_student');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function add_test_result_by_student($student_id, $test_id, $result)
    {
        $this->db->where('student_id',$student_id);
        $this->db->where('coop_test_id',$test_id);
        $array['coop_test_status'] = $result;
        return $this->db->update('coop_test_has_student',$result);
        
    }

    public function get_student_by_test_and_student($student_id, $test_id)
    {
        $this->db->where('student_id',$student_id);
        $this->db->where('coop_test_id',$test_id);
        $this->db->from('coop_test_has_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_student_by_test($test_id)
    {
        $this->db->where('coop_test_id',$test_id);
        $this->db->from('coop_test_has_student');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function check_student($student_id,$coop_test_id){
        $this->db->where('student_id',$student_id);
        $this->db->where('coop_test_id',$coop_test_id);
        $this->db->from('coop_test_has_student');
        $query = $this->db->get();
        return $query->result()[0];
    }
}