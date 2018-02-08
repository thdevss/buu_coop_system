<?php
class Trainer_model extends CI_model {
    public function gets_trainer_by_company($company_id)
    {
        $this->db->where('company_id',$company_id);
        $this->db->from('company_person');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function insert_trainer($array)
    {
        return $this->db->insert('company_person',$array);

    }

    public function update_trainer($trainer_id, $array)
    {
        $this->db->where('id',$trainer_id);
        return $this->db->update('company_person',$array);

    }

    public function delete_trainer($trainer_id)
    {
        $this->db->where('id',$trainer_id);
        return $this->db->delete('company_person');

    }

    public function get_trainer($trainer_id)
    {
        $this->db->where('id',$trainer_id);
        $this->db->from('company_person');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function login($username, $password)
    {
        
        
        
    }
}