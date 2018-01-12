<?php
class BUUMember_model extends CI_Model 
{
    public function login($username, $password)
    {
        return array(
            'status' => 'officer'
        );
    }

}