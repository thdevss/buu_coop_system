<?php
class Training_Check_Student_model extends CI_model {
    
    public function insert_check($array)
    {
        return $this->db->insert('train_set_check',$array);
    }

    public function get_check($check_id)
    {
        $this->db->where('id',$check_id);
        $this->db->from('train_set_check');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_check()
    {
        $this->db->from('train_set_check');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function gets_check_by_training($training_id)
    {
        $this->db->where('train_id',$training_id);
        $this->db->from('train_check_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_total_check_by_train($training_id)
    {
        $this->db->where('train_id',$training_id);
        $this->db->from('train_set_check');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_student($student_id, $check_id)
    {
        $train = $this->get_check($check_id);
        $array['train_id'] = $train[0]['train_id'];
        $array['train_set_check_id'] = $check_id;
        $array['student_id'] = $student_id;
        $term = $this->Term->get_current_term();
        $array['term_id'] = $term[0]['term_id'];
        $array['date_check'] = date('Y-m-d H:i:s');
        return $this->db->insert('train_check_student',$array);
    }

    public function gets_student_by_check($check_id)
    {
        $this->db->where('train_set_check_id',$check_id);
        $this->db->from('train_check_student');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_student_by_check($student_id, $check_id)
    {
        $this->db->where('student_id',$student_id);
        $this->db->where('train_set_check_id',$check_id);
        $this->db->from('train_check_student');
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result_array();
    }

    public function get_student_by_train($student_id, $train_id)
    {
        $this->db->where('student_id',$student_id);
        $this->db->where('train_id',$train_id);
        $this->db->from('train_check_student');
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result_array();
    }
    
}