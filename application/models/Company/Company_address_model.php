<?php
class Company_address_model extends CI_model
{
    public function update($company_id, $arr)
    {
        $this->db->where('company_id', $company_id);
        return $this->db->update('company_address', $arr);
    }

    public function get($company_id)
    {
        $this->db->from('company_address');
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();
        return $query->result();
    }
}