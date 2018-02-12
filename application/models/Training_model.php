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

    public function get_training_by_student_and_type($student_id, $training_type)
    {
        $this->db->where('student_id', $student_id);
        $this->db->where('train_train_type_id', $training_type);
        
        $this->db->from('student_train_register');
        $query = $this->db->get();
        return $query->result_array();
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
    public function get_current_register_period()
    {
        $this->db->order_by('register_period', 'asc');
        // $this->db->limit(1);
        $this->db->where('register_period <=', date('Y-m-d H:i:s'));
        $this->db->where('register_period >', date('Y-m-d H:i:s', time()-(86400*2)));
        $this->db->from('train');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_student_stat_of_training($student_id)
    {
        $data['train_type'] = array();
        foreach($this->Training->gets_type() as $type) {
            $type['history'] = array();
            foreach($this->Training->get_training_by_student_and_type($student_id, $type['id']) as $row) {
                $train_info = $this->Training->get_training($row['train_id'])[0];
                $row['train'] = $train_info;

                
                $row['is_complete_train'] = false;
                //count all checking in train id
                $check_count = count($this->Training_Check_Student->count_total_check_by_train($row['train_id']));
                //count student checking in train
                $student_count = count($this->Training_Check_Student->get_student_by_train($student_id, $row['train_id']));
                
                $row['total_hour'] = $train_info['number_of_hour'];

                $per_hour = $train_info['number_of_hour']/$check_count;
                
                if($student_count == $check_count) {
                    $row['is_complete_train'] = true;
                    $row['check_hour'] = $row['total_hour'];
                } else {
                    $row['check_hour'] = $per_hour*$student_count;
                    $row['is_complete_train'] = false;
                }

                array_push($type['history'], $row);
                
            }

            array_push($data['train_type'], $type);
        }

        return $data;
    }
}