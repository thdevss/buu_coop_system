<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// student
class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        $user = $this->Login_session->check_login();
        if($user->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
      
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
    }

	public function index()
	{
        $data['rowNews'] = $this->News->gets_news();
		$this->template->view('template/news_view', $data);
		
	}
}  
  