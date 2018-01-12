<?php
class BUUMember_model extends CI_Model 
{
    public function login($username, $password)
    {
        if($username == '57660132') {
            $data = array();
            $data['fullname'] = 'Pichet S.';
            $data['login_type'] = 'student';
        } else if($username == 'nuttanon@buu.ac.th') {
            $data = array();
            $data['fullname'] = 'Nuttanon';
            $data['login_type'] = 'teacher';
        } else if($username == '57660135') {
            $data = array();
            $data['fullname'] = 'Santikon A.';
            $data['login_type'] = 'coop_student';
        } else if($username == 'pnut') {
            $data = array();
            $data['fullname'] = 'Kamonwan';
            $data['login_type'] = 'officer';
        }

        return $data;
    }

}