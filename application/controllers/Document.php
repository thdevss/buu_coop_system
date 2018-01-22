<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // if(!$this->Login_session->check_login()) {
        //     $this->session->sess_destroy();
        //     redirect('member/login');
		// }
		
		// //check priv
        // if($this->Login_session->check_login()->login_type != 'coop_student') {
        //     redirect($this->Login_session->check_login()->login_type);
        //     die();
        // }
    }

    public function index() 
    {
        $html = $this->load->view('Document/test', array(), true);

        $this->load->library('mpdf60/mpdf');
        $mpdf = new mPdf('th', 'A4', '0', 'THSaraban');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    

}