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
}