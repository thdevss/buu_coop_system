<?php
class Company_info_model extends CI_model
{
    public function get($company_id)
    {
        $this->db->from('company');
        $this->db->where('id', $company_id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function getByPerson($username)
    {
        $this->db->select('company_person.company_id');
        $this->db->from('company_person_login');
        $this->db->join('company_person', 'company_person.id = company_person_id');        
        $this->db->where('username', $username);
        $query = $this->db->get();
        $row = $query->result()[0];

        $this->db->from('company');
        $this->db->where('id', $row->company_id);
        $query = $this->db->get();
        return $query->result()[0];
    }    
}