<?php
class Term_model extends CI_model 
{
    public function gets_term()
    {
        $this->db->order_by('id', 'desc');
        $this->db->from('term');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_term($term_id = 1)
    {
        $this->db->where('id', $term_id);
        $this->db->from('term');
        $query = $this->db->get();
        return $query->result();
    }

    public function set_present_term()
    {
        
    }
  
}