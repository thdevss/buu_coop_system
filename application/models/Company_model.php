<?php
class Company_model extends CI_model {
    public function insert_company($array)
    {
        return $this->db->insert('tb_company',$array);

    }

    public function delete_company($company_id)
    {
        $this->db->where('company_id',$company_id);
        return $this->db->delete('tb_company');

    }

    public function update_company($company_id, $array)
    {
        $this->db->where('company_id',$company_id);
        return $this->db->update('tb_company',$array);

    }

    public function gets_company()
    {
        $this->db->from('tb_company');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function gets_company_has_coop_student()
    {
        $query = $this->db->query('SELECT * FROM `tb_company` WHERE `company_id` in (select `company_id` from `tb_coop_student`)');
        return $query->result_array();

    }    

    public function get_company($company_id)
    {
        $this->db->where('company_id',$company_id);
        $this->db->from('tb_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_company_status_type()
    {
        $this->db->from('tb_company_status');
        $query = $this->db->get();
        return $query->result_array();
    }


}