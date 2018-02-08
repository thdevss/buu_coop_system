<?php
class Training_model extends CI_model 
{
    var $training_id;
    var $training_name;
    var $training_type;
    var $training_hour;
    var $training_lecturer;
    var $training_description;
    var $officer_id;

    public function gets_training()
    {
        $this->db->from('train');
        $query = $this->db->get();
        return $query->result_array();
       
    }

    public function get_training($training_id)
    {
        $this->db->where('id',$training_id);
        $this->db->from('train');
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function insert_training($array)
    {
        return $this->db->insert('train',$array);

    }

    public function update_training($training_id,$array)
    {
        $this->db->where('id',$training_id);
        return $this->db->update('train',$array);

    }

    public function delete_training($training_id)
    {
        $this->db->where('id',$training_id);
        return $this->db->delete('train');

    }

    public function add_student($training_id, $student_id) 
    {
        $array['student_id'] = $student_id;
        $term = $this->Term->get_current_term();
        $array['student_term_id'] = $term[0]['id'];
        $array['register_date'] = date('Y-m-y H:i:s'); 
        $array['train_id'] = $training_id;
        $train = $this->get_training($training_id);
        $array['train_train_type_id'] = $train;
        return $this->db->insert('student_train_register',$array); 
    }

    public function check_student_in_training($training_id, $student_id) 
    {
        $this->db->where('train_id', $training_id);
        $this->db->where('student_id', $student_id);
        $this->db->from('student_train_register');
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result_array();
    }
  

    public function insert_location($array)
    {
        return $this->db->insert('train_location', $array);
    }

    public function gets_location()
    {
        $this->db->from('train_location');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_location($location_id)
    {
        $this->db->where('id', $location_id);
        $this->db->from('train_location');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_location($location_id, $array)
    {
        $this->db->where('id', $location_id);
        return $this->db->update('train_location', $array);
    }

    public function delete_location($location_id)
    {
        $this->db->where('id', $location_id);
        return $this->db->delete('train_location');
    }

    public function gets_type()
    {
        $this->db->from('train_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_type($type_id)
    {
        $this->db->where('id', $type_id);
        $this->db->from('train_type');
        $query = $this->db->get();
        return $query->result_array();
    }
}