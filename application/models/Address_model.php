<?php
class Address_model extends CI_model {
    public function get_address_by_company($company_id)
    {
        $this->db->where('company_id',$company_id);
        $this->db->from('company_address');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_address() 
    {
        $this->db->from('company_address');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_address($array) 
    {
        return $this->db->insert('company_address',$array);
    }

    public function update_address($company_id, $array)
    {
        $this->db->where('company_id',$company_id);
        return $this->db->update('company_address',$array);

    }

    public function delete_address($company_id)
    {
        $this->db->where('company_id',$company_id);
        return $this->db->delete('company_address');

    }

}