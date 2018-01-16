<?php
class Login_session_model extends CI_model 
{
    public function set($login_value, $login_type) 
    {
        $insert['login_value'] = $login_value;
        $insert['login_type'] = $login_type;
        $insert['datetime'] = date('Y-m-d H:i:s');
        $insert['unique_id'] = substr(uniqid(), 0, 20);
        $insert['term_id'] = $this->Term->gets()[0]->id;
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
        $this->db->select("login_session.*, term.name as term_name");
        $this->db->join('term', 'term.id = term_id');
        $this->db->where('unique_id', $session_ID);
        $this->db->from('login_session');
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function update($session_ID, $arr)
    {
        $this->db->where('unique_id', $session_ID);
        return $this->db->update('login_session', $arr);
    }
}