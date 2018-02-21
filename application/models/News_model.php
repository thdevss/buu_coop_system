<?php
class News_model extends CI_model 
{
    public function gets_news($limit = 10, $show_hide = 0) 
    {
        if($show_hide < 1) {
            $this->db->where('is_hide', 0);
        }
        $arr = array();
        $this->db->from('news');
        $this->db->order_by('id', 'DESC');
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
        $this->db->where('id', $news_id);
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