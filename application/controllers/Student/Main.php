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
    
    public function coop_register()
    {
        $student_id = $this->Login_session->check_login()->login_value;    


        $data['student'] = @$this->Student->get_student($student_id)[0];
        $data['department'] = @$this->Student->get_department($data['student']['department_id'])[0];
        $data['term'] = @$this->Term->get_term($data['student']['term_id'])[0];

        //print
        $template_file = "template/IN-S001.docx";
        $save_filename = "download/".$student_id."-IN-S001.docx";
        $data_array = [
            'student_id' => $student_id,
            'student_course' => $data['student']['student_course'],
            'department_name' => $data['department']['name'],
            'term_semester' => $data['term']['semester'],
            'term_year' => $data['term']['year']
        ];

        $student_info = $this->Student->get_student_data_from_profile($student_id);
        $data_array = array_merge($data_array, $student_info);
        // print_r($data_array);
        

        $result = $this->service_docx->print_data($data_array, $template_file, $save_filename);

        // insert to db
        $coop_document_id = $this->Form->get_form_by_name('IN-S001', $this->Login_session->check_login()->term_id)[0]['id'];
        $word_file = '/uploads/'.basename($save_filename);
        $this->Form->submit_document($student_id, $coop_document_id, NULL, $word_file);


        // redirect(base_url($result['full_url']), 'refresh');
        echo "
            <img src='".base_url('assets/img/loading.gif')."' />
            <script>
                window.location = '".base_url($result['full_url'])."';
                setTimeout(function(){
                    window.location = '".site_url()."';
                }, 1500);
            </script>
        ";
    }
}  
  