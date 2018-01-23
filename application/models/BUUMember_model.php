<?php
class BUUMember_model extends CI_Model 
{
    public function xlogin($username, $password)
    {
        if($username == 'nutthanon9') {
            $data = array();
            $data['fullname'] = 'Nutthanon';
            $data['login_type'] = 'teacher';
            $data['login_value'] = 'nutthanon';
        } else if($username == 'pnut') {
            $data = array();
            $data['fullname'] = 'Kamonwan';
            $data['login_type'] = 'officer';
            $data['login_value'] = 'kamonwan';
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
                if($this->DB_coop_student->get($userdata['code'])) {
                    //coop student
                    $data['login_type'] = 'coop_student';
                } else {
                    //student
                    $data['login_type'] = 'student';                    
                }
                $data['login_value'] = $userdata['code'];
            } else if($userdata['ou'] == 'staff') {
                //teacher and officer
                //check in teacher
                $teacher = $this->DB_teacher->get($userdata['code']);                
                if($teacher) {
                    $data['login_type'] = 'teacher';
                    $data['login_value'] = $userdata['code'];                        
                } else {
                    $officer = $this->DB_teacher->get($userdata['code']);
                    if($officer) {
                        $data['login_type'] = 'officer';
                        $data['login_value'] = $userdata['code'];                        
                    }
                }
            } else {
                //test login
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