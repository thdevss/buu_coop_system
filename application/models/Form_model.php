<?php
class Form_model extends CI_model {
    public function gets_form()
    {
        $this->db->from('coop_document');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_form_by_code($form_code)
    {
        $this->db->where('id',$form_code);
        $this->db->from('coop_document');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function submit_document($student_id, $form_code, $file)
    {
        $array['student_id'] = $student_id;
        $array['coop_document_id'] = $form_code;
        $array['pdf_file'] = $file;
        return $this->db->insert('coop_student_has_coop_document', $array);

    }
}