<?php
class News_model extends CI_model 
{
    public function gets_news($limit = 3) 
    {
        $arr = array();
        $this->db->from('news');
        $query = $this->db->get();

        foreach($query->result() as $row) {
            foreach($this->db->where('news_id', $row->id)->from('news_file')->get()->result() as $rowFile) {
                $row->file[] = $rowFile->filename;
            }
            array_push($arr, $row);
        }
        return $arr;
    }

    public function get_news($news_id)
    {
        $this->db->from('news');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function insert_news($array)
    {
        return $this->db->insert('news',$array);

    }

    public function update_news($news_id,$array)
    {
        $this->db->where('id',$news_id);
        return $this->db->update('news',$array);

    }

    public function delete_news($news_id)
    {
        $this->db->where('id',$news_id);
        return $this->db->delete('news');

    }


}