<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    function view($file, $data = array())
    {
        $CI =& get_instance();
        
        $login_data = $CI->Login_session->check_login();        
        $data['user'] = $login_data;
        $data['user_info'] = $CI->BUUMember->get($login_data->login_type, $login_data->login_value);
        if( count($data['user_info']) < 1 ) {
            redirect('Member/logout', 'refresh');
        }
        $data['user_info'] = $data['user_info'][0];

        if($login_data->login_type == 'student' ||
            $login_data->login_type == 'coop_student') {
            $data['user_info']['fullname'] = $data['user_info']['student_fullname'];
        } else if($login_data->login_type == 'adviser') {
            $data['user_info']['fullname'] = $data['user_info']['adviser_fullname'];
        } else if($login_data->login_type == 'officer') {
            $data['user_info']['fullname'] = $data['user_info']['officer_fullname'];
        } else if($login_data->login_type == 'company') {
            $data['user_info']['fullname'] = $data['user_info']['person_fullname'];
        }


        
        if($login_data->login_type == 'officer') {
            $data['terms'] = $CI->Term->gets_term(); //get terms
        }

        $data['current_term'] = $CI->Term->get_current_term()[0];
        // print_r($data);
        //profile
        if(
            $login_data->login_type == 'student' ||
            $login_data->login_type == 'coop_student'
        ) {
            $data['profile_image'] = 'http://reg.buu.ac.th/registrar/getstudentimage.asp?id='.$data['user']->login_value;
        } else {
            $data['profile_image'] = 'http://via.placeholder.com/150x150/000/fff?text='.$data['user_info']['fullname'][0];
        }

        $CI->load->view('template/header.php', $data);

        if($login_data->login_type == 'company') {
            $CI->load->view('menu/company_menu.php', $data);
        } else if($login_data->login_type == 'student') {
            $CI->load->view('menu/student_menu.php', $data);
        } else if($login_data->login_type == 'coop_student') {
            $CI->load->view('menu/coop_student_menu.php', $data);
        } else if($login_data->login_type == 'adviser') {
            $CI->load->view('menu/adviser_menu.php', $data);
        } else if($login_data->login_type == 'officer') {
            $CI->load->view('menu/officer_menu.php', $data);
        }

        $CI->load->view($file, $data);
        $CI->load->view('template/footer.php', $data);
    }

}