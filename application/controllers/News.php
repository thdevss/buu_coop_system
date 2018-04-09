<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// coop_student
class News extends CI_Controller {

	public function view($news_id=17)
	{


		if($news_id == ''){
			redirect('Member/login/');
		}else{
			$data['row'] = $this->News->get_news($news_id);
			if(!$data['row']) {
				redirect('Member/login/');				
			}
			$data['row'] = $data['row'][0];
			preg_match_all('/(alt|title|src)=("[^"]*")/i', $data['row']['detail'], $result);

			$data['cover_image'] = str_replace('"', '', $result[2][0]);
			$this->load->view('template/news_index_view', $data);
		}
		
	}
}  
  