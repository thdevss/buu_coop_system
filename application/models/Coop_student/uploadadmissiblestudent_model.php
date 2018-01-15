<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uploadadmissiblestudent_model extends CI_Model {
    public function upload(){
        $data = array(
            array('file-input' => 'pdf_file')
        );
        $this->db->insert('coop_student_has_coop_document',$data);
    }

}
