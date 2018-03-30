<?php
class Trainer_model extends CI_model {
    public function gets_trainer_by_company($company_id)
    {
        $this->db->where('person_active', 1);
        $this->db->where('company_id',$company_id);
        $this->db->from('company_person');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_trainer()
    {
        $this->db->where('person_active', 1);
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
        $this->db->or_where('id', $trainer_id);
        $this->db->or_where('person_username', $trainer_id);
        
        $this->db->from('company_person');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_trainer_by_email($email)
    {
        $this->db->where('email', $email);
        
        $this->db->from('company_person');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function login($username, $password)
    {
        $this->db->select('person_password');
        $this->db->where('person_username', $username);
        $this->db->from('company_person');
        $query = $this->db->get();
        $row = $query->result()[0];
        if(password_verify($password, $row->person_password))
            return $row;

        return false;

    }
}