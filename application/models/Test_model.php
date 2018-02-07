<?php
class Test_model extends CI_model {
    public function gets_test() 
    {
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

    }

    public function get_test_result_by_student($student_id)
    {

    }

    public function add_student($student_id, $test_id)
    {

    }

    public function delete_student($student_id, $test_id)
    {

    }

    public function get_test_result_by_test($test_id)
    {

    }

    public function add_test_result_by_student($student_id, $test_id, $result)
    {
        
    }
}