<?php
class Skill_model extends CI_model {
    public function insert_skill($array)
    {
        return $this->db->insert('skill',$array);

    }

    public function update_skill($skill_id, $array)
    {
        $this->db->where('id',$skill_id);
        return $this->db->update('skill',$array);

    }

    public function delete_skill($skill_id)
    {
        $this->db->where('id',$skill_id);
        return $this->db->delete('skill');
        
    }

    public function get_skill($skill_id)
    {
        $this->db->where('id',$skill_id);
        $this->db->from('skill'); 
        $query = $this->db->get();
        return $query->result_array();

    }

    public function gets_skill()
    {
        $this->db->from('skill');
        $query = $this->db->get();
        return $query->result_array();
        
    }
}