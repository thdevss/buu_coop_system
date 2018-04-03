<?php 
class Student_model extends CI_model {
    var $student_id;
    var $first_name;
    var $last_name;
    var $profile_picture;
    var $coop_test_status;
    
    public function get_student($student_id)
    {
        $this->db->where('id',$student_id);
        $this->db->from('student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_student()
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);
        $this->db->from('student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_student_by_department($department_id)
    {
        $this->db->where('department_id',$deparment_id);
        $this->db->from('student');
        $query = $this->db->get();
        return $query->result_array();


    }

    public function update_student($student_id, $array)
    {
        $this->db->where('id',$student_id);
        return $this->db->update('student',$array);

    }
    
    public function gets_department()
    {
        $this->db->from('department');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_department($department_id)
    {
        $this->db->where('id',$department_id);        
        $this->db->from('department');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_coop_status_type()
    {
        $this->db->from('coop_status_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_coop_status_type($status_type_id)
    {
        $this->db->where('id',$status_type_id);
        $this->db->from('coop_status_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_student_data_from_profile($student_id)
    {
        // $file = file_get_contents('mockup-student.json');
        $file = file_get_contents('http://10.80.34.5:9991/public/api/v1/student/'.$student_id);
        $api = json_decode($file, true);

        if($api['status'] == "true") {
            return $api['result'];
        } else {
            return false;
        }
    }

    // public function get_student_lists_from_profile($year)
    // {
    //     $file = file_get_contents(base_url('mockup-student.json'));
    //     $api = json_decode($file, true);
        
    //     $return = [];
    //     if($api['status'] == "true") {
    //         foreach($api['result'] as $row) {
    //             if($row['year'] == $year) {
    //                 $return[] = $row;
    //             }
    //         }
    //         return $return;
    //     } else {
    //         return false;
    //     }
    // }
}