<?php
class Login_session_model extends CI_model 
{
    public function set($login_value, $login_type) 
    {
        $insert['login_value'] = $login_value;
        $insert['login_type'] = $login_type;
        $insert['datetime'] = date('Y-m-d H:i:s');
        $insert['unique_id'] = substr(uniqid(), 0, 20);
        $this->db->insert('login_session', $insert);
        
        $this->session->set_userdata('session_ID', $insert['unique_id']);
        return $insert['unique_id'];
    }

    public function check_login()
    {
        $session_ID = $this->session->userdata('session_ID');
        if($session_ID) {
            $userdata = $this->get($session_ID);
            return $userdata;
        }

        return false;
    }

    public function get($session_ID)
    {
        $this->db->where('unique_id', $session_ID);
        $this->db->from('login_session');
        $query = $this->db->get();
        return $query->result()[0];
    }
}