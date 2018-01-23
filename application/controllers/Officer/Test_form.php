<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_form extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }
    public function index($status = ''){
        if($status == 'success' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'สำเร็จ';
        }else{
            $data['status'] = '';
        }

        $data['coop_test'] = $this->DB_coop_test->gets();
        $data['coop_test_select'] = array();

        for($i=1; $i<5; $i++){
            $add_list = true;
            foreach($data['coop_test'] as $r) {
                if($i == $r->name){
                    $add_list = false;
                    break;
                }
            }
            if($add_list){
                $data['coop_test_select'][] = $i;
            }
        }
        $data['coop_time_select'] = date('Y-m-d H:i:s', strtotime($this->DB_coop_test->get_last_time())+86400);
        $this->template->view('Officer/Test_form_view',$data);
    }

    public function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('select','ครั้งที่สอบ','required|numeric');
        if($this->form_validation->run() == false){
            die('404');
        }else{
            //if dup
            if($this->DB_coop_test->get_by_name($this->input->post('select'))) {
                //dup
                return $this->index('error_dup');                
            } else {
                //
                $term = $this->Login_session->check_login()->term_id;
                $array['term_id'] = $term;
                $array['name'] =  $this->input->post('select');
                $array['test_date'] = $this->input->post('test_date');
                $array['register_status'] =  '0';
                $this->DB_coop_test->add($array);
                return $this->index('success');
            }   
        }
    }

    public function ajax_changeStatus()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status', 'สถานะ', 'required|numeric|in_list[0,1]');

        $return['status'] = false;

        if ($this->form_validation->run()) {
            //change in db
            $array['register_status'] = $this->input->post('status');
            $coop_test_id = $this->input->post('coop_test_id');            
            $this->DB_coop_test->update($coop_test_id, $array);
            
            $return['status'] = true;
        }

        echo json_encode($return);

	} 
}