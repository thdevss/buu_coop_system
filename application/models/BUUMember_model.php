<?php
class BUUMember_model extends CI_Model 
{
    public function xlogin($username, $password)
    {
        $data = array();
        if($username == 'nutthanon9') {
            $data['fullname'] = 'Nutthanon';
            $data['login_type'] = 'adviser';
            $data['login_value'] = 'nutthanon';
        } else if($username == 'pnut') {
            $data['fullname'] = 'Kamonwan';
            $data['login_type'] = 'officer';
            $data['login_value'] = 'kamonwans';
        } else if($username == '57660135') {
            $data['fullname'] = '57660135';
            $data['login_type'] = 'student';
            $data['login_value'] = '57660135';
        }

        return $data;
    }

    public function login($username, $password)
    {
        $this->ldap->connect();
        if($this->ldap->authenticate('' , $username, $password)) {
            $userdata = $this->ldap->get_data($username,$password);
            print_r($userdata);
            if($userdata['ou'] == 'students') {
                //coop student and student
                $data['fullname'] = $userdata['fname'].' '.$userdata['lname'];                
                if($this->Coop_Student->get_coop_student($userdata['code'])) {
                    //coop student
                    $data['login_type'] = 'coop_student';
                } else {
                    //student
                    if(!$this->Student->get_student($userdata['code'])) {
                        //wait api
                        
                    }
                    $data['login_type'] = 'student';                    
                }
                $data['login_value'] = $userdata['code'];
            } else if($userdata['ou'] == 'staff') {
                //teacher and officer
                //check in teacher
                $teacher = $this->Adviser->get_adviser($userdata['code']);                
                if($teacher) {
                    $data['login_type'] = 'adviser';
                    $data['login_value'] = $userdata['code'];                         
                } else {
                    $officer = $this->Officer->get_officer($userdata['code']);
                    if($officer) {
                        $data['login_type'] = 'officer';
                        $data['login_value'] = $userdata['code'];                        
                    }
                }
            } else {
                //test login, mockup function
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
        } else if($login_type == 'adviser') {
            $this->db->where('id', $login_value);
            $this->db->from('adviser');
            $query = $this->db->get();
            return $query->result();
        } else if($login_type == 'officer') {
            //check teacher first
            $this->db->where('id', $login_value);
            $this->db->from('adviser');
            $query = $this->db->get();
            if($query->result()) {
                $arr = [];
                foreach($query->result() as $row) {
                    $row->is_adviser = 1;
                    $arr[] = $row;
                }
                return $arr;
            }
            //after, check officer lists

            $this->db->where('id', $login_value);
            $this->db->from('officer');
            $query = $this->db->get();
            return $query->result();
        } else if($login_type == 'company') {
            // $this->db->join('company_person', 'company_person.id = company_person_id');            
            $this->db->where('person_username', $login_value);
            $this->db->from('company_person');
            $query = $this->db->get();
            // echo $this->db->last_query();
            return $query->result();
        }
    }

}