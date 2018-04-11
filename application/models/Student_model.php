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
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, 'http://10.80.34.5:9991/public/api/v1/student/'.$student_id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        curl_close($ch);

        $api = json_decode($result, true);

        if(@$api['status'] == "true") {
            return $api['result'];
        } 
        
        return false;
    }

    public function has_student_data_from_profile($student_id) 
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, 'http://10.80.34.5:9991/public/api/v1/student/'.$student_id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        curl_close($ch);

        if( count( explode("null", $result) ) > 20 ) {
            return false;
        } 
        
        return true;
    }

    public function get_student_register_subject_from_profile($student_id, $subject_arr) 
    {
        $ch = curl_init();
        $timeout = 5;
        $subject_codes = implode(",", $subject_arr);
        // echo 'http://10.80.34.5:9991/public/api/v1/student/'.$student_id.'/subjects?Subject_Code='.$subject_codes;
        curl_setopt($ch, CURLOPT_URL, 'http://10.80.34.5:9991/public/api/v1/student/'.$student_id.'/subjects?Subject_Code='.$subject_codes);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        curl_close($ch);
        $api = json_decode($result, true);


        if(@$api['status'] == "true") {
            return $api;
        } 
        
        return false;
    }    

    public function get_latest_register_job($student_id)
    {
        $this->db->where('student_id', $student_id);
        $this->db->order_by('id', 'DESC');
        $this->db->from('company_job_position_has_student');
        $query = $this->db->get();
        return $query->result_array();
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
    public function get_student_core_subject($subject_id)
    {
        $this->db->where('subject_id', $subject_id);
        $this->db->from('student_core_subject');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function gets_student_core_subject()
    {
        $this->db->from('student_core_subject');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function insert_student_core_subject($array)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $return = $this->db->insert('student_core_subject', $array);
        $this->db->db_debug = $db_debug;
        return $return;        
    }
    public function delete_student_core_subject($subject_id)
    {
        $this->db->where('subject_id', $subject_id);
        return $this->db->delete('student_core_subject');
    }
}