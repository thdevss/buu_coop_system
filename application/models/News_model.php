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

    }

    public function insert_news()
    {

    }

    public function update_news()
    {

    }

    public function delete_news()
    {

    }


}