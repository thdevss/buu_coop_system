<?php
class BUUMember_model extends CI_Model {
    public function login($username, $password)
    {
        return array(
            'status' => 'officer'
        );
    }

    public function allow_doc($doc_id)
    {
        $this->db->where('doc_id', $doc_id);
        $this->db->select('person_id');
        $this->db->from('person_has_doc');
        return $this->db->get()->result_array();
    }
}