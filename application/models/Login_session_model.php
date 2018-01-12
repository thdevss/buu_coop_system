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
        
        return $insert['unique_id'];
    }
}