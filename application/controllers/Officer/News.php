<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller {
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
        if($status == 'success_add' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'เพิ่มประกาศข่าวสารเรียบร้อย';
        } else if($status == 'success_delete' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ลบสำเร็จ';
        } else if($status == 'error_delete' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด ลบไม่ได้';
        }  else if($status != '' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } else {
            $data['status'] = '';
        }

        $data['data'] = array();
        foreach($this->DB_news->gets() as $news) {
            $tmp = array();
            $tmp['news'] = $news;
            $tmp['author'] = $this->DB_officer->get($news->officer_id);
            array_push($data['data'], $tmp);
        }
        $this->template->view('Officer/News_list_view', $data);
    } 

    public function add($status = '')
    {
        if($status == 'error_add' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } else if($status != '' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } else {
            $data['status'] = '';
        }

        $this->template->view('Officer/News_form_view', $data);
    }

    public function post_add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'หัวข้อประกาศ', 'required|is_unique[news.title]');
        $this->form_validation->set_rules('detail', 'เนื้อหา', 'required');

        if ($this->form_validation->run() != false) {
            //add news
            $insert['title'] = $this->input->post('title');
            $insert['detail'] = $this->input->post('detail');
            $insert['date'] = date('Y-m-d H:i:s');
            $insert['officer_id'] = $this->Login_session->check_login()->login_value;
            $news_id = $this->DB_news->add($insert);

            //upload file
            $count_upload = count($_FILES['news_file']);
            if(@$_FILES['news_file'][0] > 0) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'docx|pdf|jpg|jpeg|png';
                $config['max_size']             = 5128;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
            
                for ($i = 0; $i < $count_upload; $i++) {
                    $_FILES['userfile']['name']     = $_FILES['news_file']['name'][$i];
                    $_FILES['userfile']['type']     = $_FILES['news_file']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $_FILES['news_file']['tmp_name'][$i];
                    $_FILES['userfile']['error']    = $_FILES['news_file']['error'][$i];
                    $_FILES['userfile']['size']     = $_FILES['news_file']['size'][$i];

                    if ( ! $this->upload->do_upload('userfile') ) {
                        return $this->edit('error_upload');
                    } else {
                        //add to newsfile
                        $file = $this->upload->data();
                        $insert = array();
                        $insert['news_id'] = $news_id;
                        $insert['filename'] = $file['file_name'];
                        $this->DB_news_file->add($insert);
                    }
                }
            } else {                            
                return $this->index('success_add');
            }

            return $this->index('success_add');
        }
        
        return $this->add(validation_errors());
    }

    public function edit($status = '')
    {

    }

    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('id', 'id', 'trim|required|numeric');
        
        if ($this->form_validation->run() != FALSE) {
            $news_id = $this->input->post('id');            

            if(@$this->DB_news->get($news_id)) {
                //delete
                $this->DB_news_file->delete($news_id);
                $this->DB_news->delete($news_id);
                return $this->index('success_delete');
                die();
            } else {
                return $this->index();
                die();
            }
        } else {
            return $this->index('error_delete');
            die();
        }
        
    }

    public function send_email()
    {

    }
  
}
?>