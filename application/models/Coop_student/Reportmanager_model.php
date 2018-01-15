<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportmanager_model extends CI_Model {
  public function Report_list($student_id = 57660030){
      $this->db->select("subject_th, subject_en, report_detail");
      $this->db->from("coop_student_subject_report");
      $this->db->where('student_id',$student_id);
      $query = $this->db->get();
      return $query->result();
  }
}