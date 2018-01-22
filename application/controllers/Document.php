<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		// //check priv
        // if($this->Login_session->check_login()->login_type != 'coop_student') {
        //     redirect($this->Login_session->check_login()->login_type);
        //     die();
        // }
    }

    public function index() {
        $html = $this->load->view('Document/IN-S001_view', array(), true);
        // echo $html; die();
        $this->load->library('Pdf');

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('IN-S001');
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->AddPage();
        $pdf->SetFont('thsarabun', '', 14);        
        
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->lastPage();

        $pdf->Output('My-File-Name.pdf', 'I');
        
 
        //download it.
        // $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }


    public function in_s002() {
        $this->load->view('Document/IN-S002_view');
    }

    


}