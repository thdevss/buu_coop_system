<?php
class Company_Assessment_Form_model extends CI_model {
    public function gets_form_for_company()
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->order_by('number', 'asc');
        $this->db->from('company_questionnaire_subject');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function save_company_forms_subject($array)
    {
        return $this->db->insert('company_questionnaire_subject',$array);
    }

    public function save_company_form_result($array)
    {
        return $this->db->replace('company_has_company_questionnaire_item',$array);
    }

    public function get_company_form_item_result_by_company_and_student($company_id, $student_id)
    {
        $this->db->where('student_id', $student_id);
        $this->db->where('company_id', $company_id);
        
        $this->db->from('company_has_company_questionnaire_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_company_questionnaire_item_by_subject_and_student($subject_id, $student_id)
    {
        $term_id = $this->Term->get_current_term()[0]['term_id'];

        $sql = "SELECT company_questionnaire_item.title as title, company_questionnaire_item.number as number, company_has_company_questionnaire_item.score as score FROM `company_questionnaire_item` 
        JOIN `company_has_company_questionnaire_item` 
        ON (`company_has_company_questionnaire_item`.`item_id` = `company_questionnaire_item`.`id`) 
        AND (`company_has_company_questionnaire_item`.`student_id` = '".$student_id."')
        WHERE `company_has_company_questionnaire_item`.`term_id` = '".$term_id."' AND `subject_id` = '".$subject_id."' ORDER BY `number` ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }    

    public function get_company_questionnaire_item_by_subject($subject_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);        
        $this->db->order_by('number', 'asc');
        $this->db->where('subject_id',$subject_id);
        $this->db->from('company_questionnaire_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_company_questionnaire_item_avg_result_by_subject_and_company($subject_id, $company_id)
    {
        $this->db->where('company_questionnaire_item.term_id', $this->Term->get_current_term()[0]['term_id']);        
        $this->db->where('company_has_company_questionnaire_item.company_id',$company_id);
        $this->db->where('company_questionnaire_item.subject_id',$subject_id);        
        $this->db->where('company_questionnaire_item.type','score');
        $this->db->select('avg(company_has_company_questionnaire_item.score) as avg_score, company_questionnaire_item.number, company_questionnaire_item.title, company_questionnaire_item.description');
        $this->db->from('company_questionnaire_item');        
        $this->db->join('company_has_company_questionnaire_item', 'company_has_company_questionnaire_item.item_id = company_questionnaire_item.id');
        $this->db->order_by('company_questionnaire_item.number', 'asc');
        $this->db->group_by('company_questionnaire_item.number');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_company_questionnaire_item($id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);        
        $this->db->where('id',$id);
        $this->db->from('company_questionnaire_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_company_questionnaire_item($array)
    {
        return $this->db->insert('company_questionnaire_item',$array);
    } 

    public function get_company_questionnaire_subject($id)
    {        
        $this->db->where('id',$id);
        $this->db->from('company_questionnaire_subject');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_subject_dup($number) 
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('number',$number);
        $this->db->from('company_questionnaire_subject');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function check_item_dup($number, $subject_id)
    {
        $this->db->where('term_id', $this->Term->get_current_term()[0]['term_id']);                
        $this->db->where('number',$number);
        $this->db->where('subject_id',$subject_id);
        
        
        $this->db->from('company_questionnaire_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_item($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('company_questionnaire_item');
    }

    public function update_item($id, $array)
    {
        $this->db->where('id', $id);
        return $this->db->update('company_questionnaire_item', $array);
    }

    public function sort_item($subject_id)
    {
        //get subject number
        $main_number = $this->get_company_questionnaire_subject($subject_id)[0]['number'];
        //get items
        $i = 1;
        $rows = $this->get_company_questionnaire_item_by_subject($subject_id);
        foreach($rows as $row) {
            $run_number = $main_number.".".$i;

            //update
            $this->update_item($row['id'], array(
                'number' => $run_number
            ));

            $i++;
        }
    }
}