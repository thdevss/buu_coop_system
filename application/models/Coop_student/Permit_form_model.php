<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permit_form_model extends CI_Model {


        public function get_by_student($student_id)
        {
            $this->db->from('coop_student_permit');
            $this->db->where('student_id', $student_id);
            $query = $this->db->get();
            return $query->result();
        }

        public function update($student_id, $data)
        {
            $this->db->where('student_id', $student_id);
            return $this->db->update('coop_student_permit', $data);
        }

        public function insert($student_id, $data)
        {
            $data['student_id'] = $student_id;
            return $this->db->insert('coop_student_permit', $data);
        }
}