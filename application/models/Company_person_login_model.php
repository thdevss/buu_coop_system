<?php
class Company_person_login_model extends CI_model 
{
    public function login($username, $password) 
    {
        $this->db->select('password');
        $this->db->where('username', $username);
        $this->db->from('company_person_login');
        $query = $this->db->get();
        $row = $query->result()[0];
        if(password_verify($password, $row->password))
            return $row;

        return false;
    }

    public function get_by_username($username)
    {
        $this->db->where('username', $username);
        $this->db->from('company_person_login');
        $query = $this->db->get();
        return $query->result_array();
    }

    
}