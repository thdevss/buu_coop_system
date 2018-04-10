<?php
class Login_session_model extends CI_model 
{
    public function set($login_value, $login_type) 
    {
        $insert['login_value'] = $login_value;
        $insert['login_type'] = $login_type;
        $insert['datetime'] = date('Y-m-d H:i:s');
        $insert['unique_id'] = substr(uniqid(), 0, 20);
        
        $term = @$this->Term->get_current_term()[0];
        $insert['term_id'] = $term['term_id'];
        $insert['term_name'] = $term['name'];

        // $this->db->insert('login_session', $insert);
        
        // $this->session->set_userdata('session_ID', $insert['unique_id']);
        $this->session->set_userdata('user_Array', (object) $insert);
        
        return $insert['unique_id'];
    }

    public function check_login()
    {
        if($this->session->userdata('user_Array')) {
            return $this->session->userdata('user_Array');
        }

        return false;
    }

    public function get()
    {
        return $this->session->userdata('user_Array');

        
        // $this->db->select("login_session.*, term.name as term_name");
        // $this->db->join('term', 'term.term_id = login_session.term_id');
        // $this->db->where('unique_id', $session_ID);
        // $this->db->from('login_session');
        // $query = $this->db->get();
        // return @$query->result()[0];
    }

    // public function update($session_ID, $arr)
    // {
    //     $this->db->where('unique_id', $session_ID);
    //     return $this->db->update('login_session', $arr);
    // }
}