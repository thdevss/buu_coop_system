<?php
class Officer extends CI_model {
    var $officer_id;
    var $first_name;
    var $last_name;
    var $profile_picture;
    
    public function get_officer($officer_id)
    {
        $this->db->where('id',$officer_id);
        $this->db->from('officer');
        $query = $this->db->get();
        return $query->result_array();

    }
}