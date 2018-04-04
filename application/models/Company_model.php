<?php
class Company_model extends CI_model {
    public function insert_company($array)
    {
        return $this->db->insert('company',$array);

    }

    public function delete_company($company_id)
    {
        $this->db->where('id',$company_id);
        return $this->db->delete('company');

    }

    public function update_company($company_id, $array)
    {
        $this->db->where('id',$company_id);
        return $this->db->update('company',$array);

    }

    public function gets_company()
    {
        $this->db->from('company');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function gets_company_has_coop_student()
    {
        $query = $this->db->query('SELECT * FROM `company` WHERE `id` in (select `company_id` from `coop_student`)');
        return $query->result_array();

    }    

    public function get_company($company_id)
    {
        $this->db->where('id',$company_id);
        $this->db->from('company');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_company_status_type()
    {
        $this->db->from('company_status_type');
        $query = $this->db->get();
        return $query->result_array();
    }
}