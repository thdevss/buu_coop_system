<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    function view($file, $data = array())
    {
        $CI =& get_instance();
        
        $login_data = $CI->Login_session->check_login();        
        $data['user'] = $login_data;
        $data['user_info'] = $CI->BUUMember->get($login_data->login_type, $login_data->login_value)[0];
        
        if($login_data->login_type == 'officer') {
            $data['terms'] = $CI->Term->gets(); //get terms
        }

        $CI->load->view('template/header.php', $data);

        if($login_data->login_type == 'company') {
            $CI->load->view('menu/company_menu.php', $data);
        } else if($login_data->login_type == 'student') {
            $CI->load->view('menu/student_menu.php', $data);
        } else if($login_data->login_type == 'coop_student') {
            $CI->load->view('menu/coop_student_menu.php', $data);
        } else if($login_data->login_type == 'teacher') {
            $CI->load->view('menu/teacher_menu.php', $data);
        } else if($login_data->login_type == 'officer') {
            $CI->load->view('menu/officer_menu.php', $data);
        }

        $CI->load->view($file, $data);
        $CI->load->view('template/footer.php', $data);
    }

}