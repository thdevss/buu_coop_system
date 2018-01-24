<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'teacher') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

	public function index()
	{
        $data['rowNews'] = array();
        foreach($this->DB_news->gets() as $row) {
            $tmp['news'] = $row;
            $tmp['file'] = $this->DB_news_file->gets_by_news($row->id);
            $tmp['author'] = $this->DB_officer->get($row->officer_id);
            array_push($data['rowNews'], $tmp);
        }
		$this->template->view('template/news_view', $data);
		
	}
}  
  