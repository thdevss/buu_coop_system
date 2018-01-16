<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportmanager_model extends CI_Model {
  public function get_report($student_id = 57660030){
      $this->db->select("subject_th, subject_en, report_detail");
      $this->db->from("coop_student_subject_report");
      $this->db->where('student_id',$student_id);
      $query = $this->db->get();
      return $query->result();
  }
  public function insert($data) {
    return $this->db->insert('coop_student_subject_report', $data);
  }
  public function update(){
    $this->db->where('student_id',$student_id);
    return $this->db->update('coop_student_subject_report', $data);
    
  }
}