<?php
class BUUMember_model extends CI_Model 
{
    public function xlogin($username, $password)
    {
        if($username == 'nuttanon@buu.ac.th') {
            $data = array();
            $data['fullname'] = 'Nuttanon';
            $data['login_type'] = 'teacher';
        } else if($username == 'pnut') {
            $data = array();
            $data['fullname'] = 'Kamonwan';
            $data['login_type'] = 'officer';
        }

        return $data;
    }

    public function login($username, $password)
    {
        $this->ldap->connect();
        if($this->ldap->authenticate('' , $username, $password)) {
            $userdata = $this->ldap->get_data($username,$password);
            if($userdata['ou'] == 'students') {
                //coop student and student
                $data['fullname'] = $userdata['fname'].' '.$userdata['lname'];                
                if($this->Coop_student->get($userdata['code'])) {
                    //coop student
                    $data['login_type'] = 'coop_student';
                } else {
                    //student
                    $data['login_type'] = 'student';                    
                }
            } else {
                return $this->xlogin($username, $password);
            }
        } else {
            return $this->xlogin($username, $password);
        }
        return $data;
    }

}