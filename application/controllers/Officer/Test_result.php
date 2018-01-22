<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_result extends CI_Controller {

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

    public function index($status = '')
    {
        if($status == 'ok_upload' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'บันทึกผลการสอบเรียบร้อย';
        } else if($status == 'error_upload' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'บันทึกผลการสอบเรียบร้อย';
        } 
        else {
            $data['status'] = '';
        }

        $data['coop_test'] = $this->DB_coop_test->gets();

        $this->template->view('Officer/Test_result_view',$data);
        
    }

    public function upload()
	{
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('coop_test_id','ครั้งการสอบ','required|numeric');
        if($this->form_validation->run() != false){
            //check coop test id
            $coop_test_id = $this->input->post('coop_test_id');            
            if(!$this->DB_coop_test->get($coop_test_id)) {
                return $this->index('error_upload');
                die();
            }

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 1500;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file-input')) {
                $data['status'] = $this->upload->display_errors();
                return $this->index('error_upload');
                die();
            } else {
                
                $file = $this->upload->data();            
                $data['status'] = 'success';
                //insert to db

                //แปลง Excel
                require(FCPATH.'/application/libraries/XLSXReader.php');
                $xlsx = new XLSXReader($file['full_path']);
                $sheet = $xlsx->getSheetNames()[1];
                foreach($xlsx->getSheetData($sheet) as $row) {
                    $student_id = trim($row[0]);
                    $result = trim($row[1]);
                    if($result == 'ผ่าน') {
                        $result = 1;
                    } else {
                        $result = 2;
                    }

                    //check student id in test
                    if($this->DB_coop_test_has_student->check_student($student_id, $coop_test_id)) {
                        //add data
                        $where['student_id'] = $student_id;
                        $where['coop_test_id'] = $coop_test_id;
                        
                        $update['coop_test_status'] = $result; //wait fix
                        $this->DB_coop_test_has_student->update($where, $update);
                    }
                    
                }
                unlink($file['full_path']);
                return $this->index('ok_upload');
                die();

            }
        } else {
            return $this->index('error_upload');      
            die();  
        }
    }
}