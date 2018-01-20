<?php
class Coop_test_model extends CI_model
{
    var $table_name;
    var $primary_key;
    

    public function __construct(){
        parent::__construct();
        $this->table_name = 'coop_test';
        $this->primary_key = 'id';
    }

    public function get($id)
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->where($this->primary_key, $id);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function gets()
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result();
    }

    public function add($array)
    {
        return $this->db->insert($this->table_name, $array);
    }

    public function update($id, $array)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $array);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);        
        return $this->db->delete($this->table_name);
    }

    public function get_by_name($name)
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->where('name', $name);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return @$query->result()[0];
    }

    public function get_last_time()
    {
        $this->db->where('term_id', $this->Login_session->check_login()->term_id);
        $this->db->order_by('test_date', 'DESC');
        $this->db->from($this->table_name);
        $this->db->select('test_date');
        $query = $this->db->get();
        return $query->result()[0]->test_date;
    }    
}