<?php

class Member extends CI_Controller {
    public function login()
    {
        $this->load->view('login/login_view.php');
    }

    public function post_login() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(strpos($username, 'PN')) {
            //company login
            $member = $this->Company_person_login->login($username, $password);
            if($member) {
                $session_ID = $this->Login_session->set($username, 'company');
                if($session_ID) {
                    redirect('company');                    
                }
            }
        } else {
            //ldap login
            $check_ldap = $this->BUUMember->login($username, $password);
            if($check_ldap) {
                // $session_ID = $this->Login_session->set($username, $status);
                // if($session_ID) {
                //     $this->session->set_userdata('session_ID', $session_ID);
                //     redirect('company');                    
                // }
            }
        }

        redirect('member/login');
    }
}