<?php
class Train_set_check_model extends CI_model
{
    var $table_name;
    var $primary_key;
    

    public function __construct(){
        parent::__construct();
        $this->table_name = 'train_set_check';
        $this->primary_key = 'id';
    }

    public function get($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function gets()
    {
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result();
    }

    public function add($array)
    {
        $this->db->insert($this->table_name, $array);
        return $this->db->insert_id();
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
}