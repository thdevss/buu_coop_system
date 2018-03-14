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
        $user = $this->Login_session->check_login();
        if($user->login_type != 'officer') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }

        // $this->breadcrumbs->unshift('ระบบสหกิจ', '/'); //home
        $this->breadcrumbs->push(strToLevel($user->login_type), '/'.$user->login_type); //actor
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
        } else if($status == 'success_hide_status' ){
            $data['status']['color'] = 'primary';
            $data['status']['text'] = 'เปลี่ยนสถานะการโชว์ข่าวสำเร็จ';
        } else if($status != '' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } else {
            $data['status'] = '';
        }

        $data['data'] = $this->News->gets_news(null, 1);

        // add breadcrumbs
        $this->breadcrumbs->push('รายการประกาศข่าวสารหน้าเว็ป', '/Officer/News/index');

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

        $data['post_url'] = site_url('Officer/News/post_add');

        // add breadcrumbs
        $this->breadcrumbs->push('รายการประกาศข่าวสารหน้าเว็ป', '/Officer/News/index');
        $this->breadcrumbs->push('แบบฟอร์มเพิ่มประกาศข่าวสาร', '/Officer/News/add/');

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
            $news_id = $this->News->insert_news($insert);

            //upload file
            $count_upload = count($_FILES['news_file']);

            if(@$_FILES['news_file']['name'][0]) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'docx|pdf|jpg|jpeg|png';
                $config['max_size']             = 5128;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
            
                for ($i = 0; $i < $count_upload; $i++) {
                    $_FILES['userfile']['name']     = @$_FILES['news_file']['name'][$i];
                    $_FILES['userfile']['type']     = @$_FILES['news_file']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = @$_FILES['news_file']['tmp_name'][$i];
                    $_FILES['userfile']['error']    = @$_FILES['news_file']['error'][$i];
                    $_FILES['userfile']['size']     = @$_FILES['news_file']['size'][$i];

                    if ( ! $this->upload->do_upload('userfile') ) {
                        return $this->edit('error_upload');
                    } else {
                        //add to newsfile
                        $file = $this->upload->data();
                        $this->News_File->add_file($news_id, $file['file_name']);
                    }
                }
            } else {                            
                return $this->index('success_add');
            }
            return $this->index('success_add');
        }
        return $this->add(validation_errors());
    }

    public function edit($id, $status = '')
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

        $data['row'] = $this->News->get_news($id)[0];

        if(!@$data['row']) {
            redirect('Officer/News');
            die();
        }

        $data['files'] = $this->News_File->gets_file_by_news($id);
        
        $data['post_url'] = site_url('Officer/News/post_edit');

        // add breadcrumbs
        $this->breadcrumbs->push('รายการประกาศข่าวสารหน้าเว็ป', '/Officer/News/index');
        $this->breadcrumbs->push('แบบฟอร์มแก้ไขประกาศข่าวสาร', '/Officer/News/edit/'.$id);

        $this->template->view('Officer/News_form_view', $data);
    }

    public function post_edit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'หัวข้อประกาศ', 'required');
        $this->form_validation->set_rules('detail', 'เนื้อหา', 'required');
        $this->form_validation->set_rules('id', 'Primary Key', 'required|numeric');

        if ($this->form_validation->run() != false) {
            //add news
            $insert['title'] = $this->input->post('title');
            $insert['detail'] = $this->input->post('detail');
            $insert['date'] = date('Y-m-d H:i:s');
            $news_id = $this->input->post('id');
            $this->News->update_news($this->input->post('id'), $insert);

            //upload file
            $count_upload = count($_FILES['news_file']);

            if(@$_FILES['news_file']['name'][0]) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'docx|pdf|jpg|jpeg|png';
                $config['max_size']             = 5128;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
            
                for ($i = 0; $i < $count_upload; $i++) {
                    $_FILES['userfile']['name']     = @$_FILES['news_file']['name'][$i];
                    $_FILES['userfile']['type']     = @$_FILES['news_file']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = @$_FILES['news_file']['tmp_name'][$i];
                    $_FILES['userfile']['error']    = @$_FILES['news_file']['error'][$i];
                    $_FILES['userfile']['size']     = @$_FILES['news_file']['size'][$i];

                    if ( ! $this->upload->do_upload('userfile') ) {
                        return $this->edit('error_upload');
                    } else {
                        //add to newsfile
                        $file = $this->upload->data();
                        $this->News_File->add_file($news_id, $file['file_name']);
                    }
                }
            } else {                            
                return $this->index('success_add');
            }
            return $this->index('success_add');
        }
        return $this->add(validation_errors());
    }    

    public function hide_status($news_id)
    {
        $news_data = $this->News->get_news($news_id)[0];
        if(@$news_data) {
            $insert['is_hide'] = '1';            
            if($news_data['is_hide'] == '1') {
                $insert['is_hide'] = '0';
            }
            $this->News->update_news($news_id, $insert);
            return $this->index('success_hide_status');
            die();
        } else {
            return $this->index();
            die();
        }
        
    }    

    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('id', 'id', 'trim|required|numeric');
        
        if ($this->form_validation->run() != FALSE) {
            $news_id = $this->input->post('id');            

            if(@$this->News->get_news($news_id)) {
                //delete
                $this->News->delete_news($news_id);
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

    public function upload_image()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'docx|pdf|jpg|jpeg|png';
        $config['max_size']             = 5128;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('userfile') ) {
            return $this->edit('error_upload');
        } else {
            //add to newsfile
            $file = $this->upload->data();

            echo base_url('uploads/'.$file['file_name']);
        }
    }

    public function ajax_delete_file()
    {
        //check if exist
        $return['status'] = false;
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('news_file_id', 'news_file_id', 'required|numeric');
        
        if ($this->form_validation->run() != FALSE) {
            $news_file_id = $this->input->post('news_file_id');            
            $file = @$this->News_File->get_file($news_file_id);
            if(@$file) {
                //delete
                $this->News_File->delete_file($news_file_id);
                //unlink
                @unlink('./uploads/'.$file->filename);
                $return['status'] = true;
            }
        }
        
        echo json_encode($return);
    }

    public function send_email()
    {

    }
  
}
?>