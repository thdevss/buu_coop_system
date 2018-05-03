<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    function view($file, $data = array(), $src_js = array(), $src_css = array())
    {

        $default_src_js = [
            base_url('assets/theme/popper.js/dist/umd/popper.min.js'),
            base_url('assets/theme/bootstrap/dist/js/bootstrap.min.js'),
            base_url('assets/theme/pace-progress/pace.min.js'),
            base_url('assets/js/app.js'),
            "https://unpkg.com/sweetalert/dist/sweetalert.min.js",
            "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js",
            "https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js",
            "https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js",
            "https://cdn.jsdelivr.net/npm/formvalidation@0.6.2-dev/dist/js/formValidation.min.js",
            "http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js",
            "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js",
            "https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js",
            "https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js",
            "https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.16/jquery.datetimepicker.full.js",
        ];

        $default_src_css = [
            "https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.16/jquery.datetimepicker.css",
            "https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css",
            "https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/css/dataTables.checkboxes.css",
            "https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css",
            "https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css",
            "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css",
            base_url('assets/css/custom.css'),

        ];
        

        error_reporting(E_ALL ^ E_NOTICE); //close error hahaha
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
            $data['profile_image'] = 'http://via.placeholder.com/150x150/000/fff?text='.strtoupper($data['user']->login_value[0]);
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

        $data['src_scripts'] = array_merge($default_src_js, $src_js);
        $data['src_css'] = array_merge($default_src_css, $src_css);
        
        $CI->load->view('template/footer.php', $data);
    }

}