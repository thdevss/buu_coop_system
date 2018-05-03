<?php
class Coop_Student_model extends CI_model {
    var $adviser_id;
    var $trainer_id;
    var $job_id;
    var $term_id;
    var $coop_status;


    
    public function insert_coop_student($array)
    {
        return $this->db->insert('tb_coop_student', $array);
    }

    public function delete_coop_student($student_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('student_id',$student_id);
        return $this->db->delete('tb_coop_student');
    }

    public function update_coop_student($student_id, $array)
    {
        $this->db->where('student_id',$student_id);
        return $this->db->update('tb_coop_student',$array);
    }

    public function gets_coop_student()
    {
        
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $this->db->where('term_id', $term_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();        
        return $query->result_array();
    }
    
    public function get_coop_student($student_id)
    {
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $this->db->where('term_id', $term_id);
        $this->db->where('student_id', $student_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();
        
        return $query->result_array(); 
    }

    public function gets_coop_student_by_company($company_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('company_id', $company_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();
        
        return $query->result_array();

    }

    public function gets_coop_student_by_trainer($trainer_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('trainer_id', $trainer_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_coop_student_by_adviser($adviser_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('adviser_id', $adviser_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gets_coop_student_by_department_company($department_id, $company_id, $term_id = 0)
    {
        if($term_id == 0) {
            $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                            
        } else {
            $this->db->where('term_id', $term_id);                
        }

        $this->db->where('department_id', $department_id);
        $this->db->where('company_id', $company_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_coop_student_plan($student_id)
    {
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $this->db->where('term_id', $term_id);
        $this->db->where('student_id',$student_id);
        $this->db->from('tb_coop_student_plan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_plan($student_id, $planArr)
    {
        $planArr['student_id'] = $student_id;
        return $this->db->insert('tb_coop_student_plan', $planArr);
    }

    public function delete_plan($student_id)
    {
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $this->db->where('term_id', $term_id);
        $this->db->where('student_id',$student_id);        
        return $this->db->delete('tb_coop_student_plan');
    }

    public function get_permit_form_by_student($student_id)
    {
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $this->db->where('term_id', $term_id);
        $this->db->where('student_id', $student_id);
        $this->db->from('tb_coop_student_permit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function save_permit_form_by_student($array)
    {
        return $this->db->replace('tb_coop_student_permit', $array);
    }
    
    public function get_coop_student_dorm_by_student($student_id)
    {
        $this->db->where('student_id', $student_id);
        $this->db->from('tb_coop_student_dorm');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function save_coop_student_dorm($array)
    {
        return $this->db->replace('tb_coop_student_dorm', $array);
    }

    public function get_coop_student_emergency_contact_by_student($student_id)
    {
        $this->db->where('student_id', $student_id);
        $this->db->from('tb_coop_student_emergency_contact');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function save_emergency_contact($array)
    {
        return $this->db->replace('tb_coop_student_emergency_contact', $array);
    }

    public function gets_coop_student_no_adviser_by_company($company_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('adviser_id', '');
        $this->db->where('company_id', $company_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();
        
        return $query->result_array();
    }


    public function gets_general_petition_by_student($student_id)
    {
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $this->db->where('term_id', $term_id);
        $this->db->where('student_id', $student_id);
        $this->db->from('tb_coop_student_general_petition');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_general_petition($petition_id)
    {
        $this->db->where('petition_id', $petition_id);
        $this->db->from('tb_coop_student_general_petition');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function save_general_petition($insertArr)
    {
        $this->db->insert('tb_coop_student_general_petition', $insertArr);
        return $this->db->insert_id();
    }
    
    public function get_coop_student_by_department($department_id)
    {
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $this->db->where('term_id', $term_id);
        $this->db->where('department_id', $department_id);
        $this->db->from('tb_coop_student');
        $query = $this->db->get();
        return $query->result_array();
    }

    

}