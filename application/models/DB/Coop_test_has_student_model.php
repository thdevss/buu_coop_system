<?php
class Coop_test_has_student_model extends CI_model
{
    var $table_name;
    var $primary_key;
    

    public function __construct(){
        parent::__construct();
        $this->table_name = 'coop_test_has_student';
        $this->primary_key = 'coop_test_id';
    }

    public function get($id)
    {
        $this->db->where('coop_test_term_id', $this->Login_session->check_login()->term_id);
        $this->db->where($this->primary_key, $id);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function gets()
    {
        $this->db->where('coop_test_term_id', $this->Login_session->check_login()->term_id);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result();
    }

    public function add($array)
    {
        return $this->db->insert($this->table_name, $array);
    }

    public function update($where_array, $array)
    {
        foreach($where_array as $k => $v) {
            $this->db->where($k, $v);
        }
        return $this->db->update($this->table_name, $array);
    }

    public function delete($array)
    {
        foreach($array as $k => $v) {
            $this->db->where($k, $v);
        }       
        return $this->db->delete($this->table_name);
    }
    public function check_student_pass($student_id){
        $this->db->where('student_id',$student_id);
        $this->db->where('coop_test_status','1');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result()[0];
    }
    public function check_student($student_id,$coop_test_id){
        $this->db->where('student_id',$student_id);
        $this->db->where('coop_test_id',$coop_test_id);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function gets_by_student($student_id){
        $this->db->where('student_id',$student_id);
        $this->db->order_by('coop_test_id', 'ASC');        
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result();
    }
}