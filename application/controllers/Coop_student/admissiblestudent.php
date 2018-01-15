    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admissiblestudent  extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'coop_student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
	{
        
        $data['data'] = $this->Coop_student_Adimssiblestudent->get_adimssiblestudent(9);
        $this->template->view('Coop_student/admissiblestudent_view',$data);
       
    }

    public function from_adimssiblestudent(){
        $data['data'] = $this->Coop_student_Adimssiblestudent->get_adimssiblestudent();
         print_r($data);
    }

}