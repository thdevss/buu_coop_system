<?php
class News_model extends CI_model 
{
    public function gets_news($limit = 3) 
    {
        $arr = array();
        $this->db->from('news');
        $query = $this->db->get();

        foreach($query->result_array() as $row) {
            $row['author'] = $this->Officer->get_officer($row['officer_id'])[0];
            foreach($this->db->where('news_id', $row['id'])->from('news_file')->get()->result_array() as $rowFile) {
                $row['file'][] = $rowFile['filename'];
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