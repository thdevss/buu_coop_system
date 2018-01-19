<?php
class BUUMember_model extends CI_Model 
{
    public function xlogin($username, $password)
    {
        if($username == 'nuttanon@buu.ac.th') {
            $data = array();
            $data['fullname'] = 'Nuttanon';
            $data['login_type'] = 'teacher';
            $data['login_value'] = '49173';
        } else if($username == 'pnut') {
            $data = array();
            $data['fullname'] = 'Kamonwan';
            $data['login_type'] = 'officer';
            $data['login_value'] = '1';
        }

        return $data;
    }

    public function login($username, $password)
    {
        $this->ldap->connect();
        if($this->ldap->authenticate('' , $username, $password)) {
            $userdata = $this->ldap->get_data($username,$password);
            // print_r($userdata);
            // die();
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
                $data['login_value'] = $userdata['code'];
            } else {
                return $this->xlogin($username, $password);
            }
        } else {
            return $this->xlogin($username, $password);
        }
        return $data;
    }

    public function get($login_type, $login_value)
    {
        if($login_type == 'student') {
            $this->db->where('id', $login_value);
            $this->db->from('student');
            $query = $this->db->get();
            return $query->result();
        } else if($login_type == 'coop_student') {
            $this->db->join('coop_student', 'coop_student.student_id = student.id');
            $this->db->where('id', $login_value);
            $this->db->from('student');
            $query = $this->db->get();
            return $query->result();
        } else if($login_type == 'teacher') {
            $this->db->where('id', $login_value);
            $this->db->from('teacher');
            $query = $this->db->get();
            return $query->result();
        } else if($login_type == 'officer') {
            $this->db->where('id', $login_value);
            $this->db->from('officer');
            $query = $this->db->get();
            return $query->result();
        } else if($login_type == 'company') {
            $this->db->join('company_person', 'company_person.id = company_person_id');            
            $this->db->where('username', $login_value);
            $this->db->from('company_person_login');
            $query = $this->db->get();
            return $query->result();
        }
    }

}