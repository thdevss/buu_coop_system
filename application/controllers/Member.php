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

        if(strpos('COMPANY', $username)) {
            //company login

        } else {
            //ldap login
            $check_ldap = $this->BUUMember->login($username, $password);
            if($check_ldap) {

            } else {
                //redirect into login form
                redirect('member/login');
            }
            
        }
    }
}