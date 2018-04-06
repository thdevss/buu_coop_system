<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// coop_student
class News extends CI_Controller {

	public function view($news_id=17)
	{


		if($news_id == ''){

			redirect('Member/login/');

		}else{

			$data['rowNews'] = $this->News->get_news($news_id);
			$this->load->view('template/news1_view', $data);
			// print_r($data);

		}
		
	}
}  
  