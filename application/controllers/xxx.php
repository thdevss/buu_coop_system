<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actionplanform extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

		public function index(){
         $data['data'] = $this->Teacher_Actionplanform->gets_student_list_by_teacher();
        $this->template->view('Teacher/Actionplanform_view',$data);
        }

        public function planform (){
        $data['data'] = $this->Teacher_Actionplanform->gets_student_list_by_teacher();
        print_r($data);
    }

    public function ajax_get($student_id)
    {
        $data['data'] = $this->Teacher_Actionplanform->get_by_student($student_id);
        echo json_encode($data);        
    }
}
defined('BASEPATH') OR exit('No direct script access allowed');
class Assessment_teacher extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

		public function index(){
         $data['data'] = $this->Teacher_Assessmentteacher->planform();
        $this->template->view('Teacher/Assessmentteacher_view',$data);
        }

        public function planform (){
        $data['data'] = $this->Teacher_Assessmentteacher->planform();
        print_r($data);
    }
}
class Company_map extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        //check session
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
        }

        //check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
    {
        $data['company'] = $this->DB_company->gets();
        $this->template->view('teacher/map_list_view', $data);
    }

    public function ajax_post()
    {
        $data = array();
        $data['data'] = array();
        foreach($this->input->post('company_id') as $company_id) {
            //get map
            $tmp_array['company'] = $this->DB_company->get($company_id);            
            $tmp_array['company_address'] = $this->DB_company_address->get($company_id);

            

            array_push($data['data'], $tmp_array);
        }

        echo json_encode($data);
    }


}
class Daily_activity extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        //check session
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
        }

        //check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
    {
        $teacher_id = $this->Login_session->check_login()->login_value;
        $data['data'] = array();
        foreach ($this->DB_coop_student->gets_by_teacher($teacher_id) as $row){
            $tmp_array = array();
            $tmp_array['student'] = $this->DB_student->get($row->student_id);
            $tmp_array['student_field'] = $this->DB_student_field->get($tmp_array['student']->student_field_id);
            $tmp_array['company'] = $this->DB_company->get($row->company_id);
            $tmp_array['company_address'] = $this->DB_company_address->get($row->company_id);
            array_push($data['data'], $tmp_array);
        }
        $this->template->view('Teacher/Daily_activity_view',$data);
    }
   public function list($student_id)
   {
       if(!$this->DB_coop_student->get($student_id)){
           return $this->index();

       }
        $data['student'] = $this->DB_student->get($student_id);
        $data['data'] = $this->DB_coop_student_daily_activity->gets_by_student($student_id);
        $this->template->view('Teacher/Daily_activity_list_view',$data);
   }
   public function detail($id)
   {
        $data['data'] = @$this->DB_coop_student_daily_activity->get($id);

        if(!$data['data']){
            show_404();
       }
       $this->template->view('Teacher/Daily_detail_view',$data);
   }

}
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

	public function index()
	{
        $data['rowNews'] = $this->News->gets_news();
		$this->template->view('template/news_view', $data);
		
	}
}  
  
defined('BASEPATH') OR exit('No direct script access allowed');

class Stat extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }
    public function index(){
        $this->template->view('Teacher/Stat_view');
    }
}
defined('BASEPATH') OR exit('No direct script access allowed');
class Supervisiondocument extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'adviser') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

		public function index(){
         $data['data'] = $this->Teacher_Supervisiondocument->planform();
        $this->template->view('Teacher/Supervisiondocument_view',$data);
        }

        public function planform (){
        $data['data'] = $this->Teacher_Supervisiondocument->planform();
        print_r($data);
    }
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessmentstudent extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'company') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

	public function index()
	{

		
		$company_id = $this->Company->getByPerson($this->Login_session->check_login()->login_value)->id;
		$data['data'] = $this->Company_Assessmentstudent->get_list($company_id);


		// print_r($data);
		$this->template->view('company/Assessmentstudent_view',$data);
		
	}

	public function list_assessment(){
		$data['data'] = $this->Company_Assessmentstudent->get_list();
		
	}

	public function form(){	
		$this->template->view('company/Assessmentstudentform_view');
	}
}  
  
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_info extends CI_controller
{
       public function __construct()
        {
            parent::__construct();
            //check session
            if(!$this->Login_session->check_login()) {
                $this->session->sess_destroy();
                redirect('member/login');
            }

            //check priv
            if($this->Login_session->check_login()->login_type != 'company') {
                redirect($this->Login_session->check_login()->login_type);
                die();
           }
       }

        public function index()
        {
            $tmp = $this->DB_company_person_login->get_by_username($this->Login_session->check_login()->login_value);
            $tmp = $this->DB_company_person->get($tmp->company_person_id);
            $data['data'] = $this->DB_company->get($tmp->company_id);
            $this->template->view('Company/Company_in_view');
       }
        public function add_job()
        {
            $this->template->view('Company/Company_info_job_view');
        }
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'company') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

	public function index()
	{
        $data['rowNews'] = $this->News->gets_news();
		$this->template->view('template/news_view', $data);
		
	}
}  
  
class Company_map extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        //check session
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
        }

        //check priv
        if($this->Login_session->check_login()->login_type != 'company') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

    public function index()
    {
        $company_person_login = $this->DB_company_person_login->get_by_username($this->Login_session->check_login()->login_value);
        $company_person = $this->DB_company_person->get($company_person_login->company_person_id);
        $company_id = $this->DB_company->get($company_person->company_id)->id;
        
        $data['map'] = $this->DB_company_address->get($company_id);
        $this->template->view('company/map_view', $data);
    }

    public function ajax_post()
    {
        $insert['latitude'] = $this->input->post('latitude');
        $insert['longitude'] = $this->input->post('longitude');

        $company_person_login = $this->DB_company_person_login->get_by_username($this->Login_session->check_login()->login_value);
        $company_person = $this->DB_company_person->get($company_person_login->company_person_id);
        $company_id = $this->DB_company->get($company_person->company_id)->id;

        $arr = array(
            'status' => false,
            'txt' => 'err',            
        );

        if($this->DB_company_address->update($company_id, $insert)) {
            $arr['status'] = true;
            $arr['txt'] = 'ok';            
        }
        
        echo json_encode($arr);
    }


}
class Daily_activity extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        //check session
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
        $student_id = $this->Login_session->check_login()->login_value;
        $data['data'] = $this->DB_coop_student_daily_activity->gets_by_student($student_id);
 
        $this->template->view('Coop_student/Daily_activity_coop_student_view',$data);
    }
    public  function edit($id){
        $data['data'] = $this->DB_coop_student_daily_activity->get($id);
        $this->template->view('Coop_student/Edit_Daily_activity_coop_student_view',$data);
    }

}
defined('BASEPATH') OR exit('No direct script access allowed');
// coop_student
class Main extends CI_Controller {

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
        $data['rowNews'] = $this->News->gets_news();
		$this->template->view('template/news_view', $data);
		
	}
}  
  
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportmanager  extends CI_Controller {

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
    public function index(){
        $student_id = $this->Login_session->check_login()->login_value;
        
        $return['status'] = 'wait';
        $return['row'] = @$this->Report->get_report($student_id)[0];
        $this->template->view('Coop_student/Reportmanager_view', $return);
    }

    public function post_report(){
        $student_id = $this->Login_session->check_login()->login_value;
        $data['subject_th'] =  $this->input->post('subject_th');
        $data['subject_en'] = $this->input->post('subject_en');
        $data['report_detail'] = $this->input->post('report_detail');
                
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject_th', 'หัวข้อภาษาไทย', 'required');
        $this->form_validation->set_rules('subject_en', 'หัวข้อภาษาอังกฤษ', 'required|alpha');
        $this->form_validation->set_rules('report_detail', 'รายละเอียดเนื้อหาของรายงาน', 'required');

        if ($this->form_validation->run() == FALSE)
                {
                    $return['status'] = 'error';
                    $return['row'] = @$this->Report->get_report($student_id)[0];
                        $this->template->view('Coop_student/Reportmanager_view', $return);
                }
                else
                {
                    if(@$this->Report->get_report($student_id)[0]) {
                        //update
                        $this->Report->update($data,$student_id);
                        $return['status'] = 'successupdate';
                    } else {
                        //insert
                        $data['student_id'] = $student_id;
                        $this->Report->insert($data);
                        $return['status'] = 'successinsert';
                    }
                    $return['row'] = @$this->Report->get_report($student_id)[0];
                    
                        $this->template->view('Coop_student/Reportmanager_view',$return);
                }
                    
    }
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_document extends CI_Controller {

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
        $student_id = $this->Login_session->check_login()->login_value;
        $document_code = $this->input->post('code');
        if(!$document_code) 
            $document_code = $this->input->get('code');

        if(!$data['document'] = $this->Coop_document->get_by_name($document_code)[0]) {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
        
        if($this->input->post('code')) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'docx|pdf';
            $config['max_size']             = 500;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file-input')) {
                $data['status'] = $this->upload->display_errors();
            } else {
                $file = $this->upload->data();            
                $data['status'] = 'success';

                //insert to db
                @$this->Coop_document->delete_by_student($student_id, $data['document']->id);
                $insert['pdf_file'] = '/uploads/'.$file['file_name'];
                $insert['coop_document_id'] = $data['document']->id;
                $insert['student_id'] = $student_id;
                $this->Coop_document->insert_by_student($insert);
            }
        } else {
            $data['status'] = '1';

            //check old document
            $data['old_document'] = @$this->Coop_document->get_by_student($student_id, $data['document']->id)[0];
        }

        $this->template->view('Coop_student/upload_document_view', $data);
        
       
    }

}
defined('BASEPATH') OR exit('No direct script access allowed');

class permit_form  extends CI_Controller {

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
        $student_id = $this->Login_session->check_login()->login_value;

        $data['permit'] = @$this->Coop_student_Permit_form->get_by_student($student_id)[0];
        $data['student'] = @$this->Coop_student->get($student_id)[0];

        $this->template->view('Coop_student/permit_form_view',$data);

    }

    public function post()
    {


        $student_id = $this->Login_session->check_login()->login_value;
        
        $return['status'] = false;
        $return['print'] = false;
                
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('allower_fullname', 'ชื่อผู้ปกครอง', 'trim|required');
        $this->form_validation->set_rules('allower_relative', 'ความสัมพันธ์กับนิสิต', 'trim|required');
        $this->form_validation->set_rules('address_number', 'ที่อยู่: บ้านเลขที่', 'trim|required');
        $this->form_validation->set_rules('address_road', 'ที่อยู่: ถนน', 'trim|required');
        $this->form_validation->set_rules('address_district', 'ที่อยู่: ตำบล', 'trim|required');
        $this->form_validation->set_rules('address_area', 'ที่อยู่: อำเภอ', 'trim|required');
        $this->form_validation->set_rules('address_province', 'ที่อยู่: จังหวัด', 'trim|required');
        $this->form_validation->set_rules('address_postal_code', 'ที่อยู่: รหัสไปรษณีย์', 'trim|required|numeric|max_length[5]');
        $this->form_validation->set_rules('allower_telephone', 'หมายเลขโทรศัพท์', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules('allower_fax_number', 'หมายเลขโทรสาร', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules('allower_email', 'อีเมล', 'trim|required|valid_email');
        $this->form_validation->set_rules('allow_choice', 'การตอบรับ', 'trim|required|in_list[0,1]');

        if ($this->form_validation->run() != FALSE) {
            $data['allower_fullname'] =  $this->input->post('allower_fullname');
            $data['allower_relative'] = $this->input->post('allower_relative');
            $data['address_number'] = $this->input->post('address_number');
            $data['address_road'] = $this->input->post('address_road');
            $data['address_district'] = $this->input->post('address_district');
            $data['address_area'] = $this->input->post('address_area');
            $data['address_province'] = $this->input->post('address_province');
            $data['address_postal_code'] = $this->input->post('address_postal_code');
            $data['allower_email'] = $this->input->post('allower_email');
            $data['allower_telephone'] = $this->input->post('allower_telephone');
            $data['allower_fax_number'] = $this->input->post('allower_fax_number');
            $data['allow_choice'] = $this->input->post('allow_choice');
            if(!$data['allow_choice']) {
                $data['allow_choice'] = 0;
            }
            //save
            if(@$this->Coop_student_Permit_form->get_by_student($student_id)[0]) {
                //update
                $this->Coop_student_Permit_form->update($student_id, $data);
            } else {
                //insert
                $this->Coop_student_Permit_form->insert($student_id, $data);                
            }

            if($this->input->post('print') == '1') {
                //print page
                $return['status'] = true;
                $return['print'] = true;
            } else {
                $return['status'] = true;
            }
            
        } else {
        
           $return['status'] = false;
           
           $return['message'] = strip_tags(validation_errors());
        }

        echo json_encode($return);
        
        
    }

    public function print()
    {
        echo 'printprint';
    }
}
defined('BASEPATH') OR exit('No direct script access allowed');
class Assessment_coop_student extends CI_Controller {
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

		public function view($student_id){

	
		$this->template->view('Officer/Assessment_coop_student_view');
    } 
  
}
?>
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Assessment_coop_student_Form extends CI_Controller {
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

        public function index() {
            $data['rows'] = array();
            foreach($this->Officer_Assessment_student->gets_subject() as $r) {
                $tmp['headline_name'] = $r->title;
                $tmp['headline_id'] = $r->id;
                
                $tmp['choice'] = array();
                foreach($this->Officer_Assessment_student->gets_child($r->id) as $rx) {
                    $rtmp['name'] = $rx->title;
                    $rtmp['id'] = $rx->id;
                    
                    array_push($tmp['choice'], $rtmp);
                }

                array_push($data['rows'], $tmp);
            }
            $this->template->view('Officer/Assessment_studentForm_view', $data);
     
        }
    }
?>
defined('BASEPATH') OR exit('No direct script access allowed');
class Change_term extends CI_Controller {
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

    public function ajax_change()
    {
        $data['term_id'] = $this->input->post('term_id');
                
        $this->load->library('form_validation');
        $this->form_validation->set_rules('term_id', 'term_id', 'required');

        $return['status'] = false;

        if ($this->form_validation->run() != FALSE) {
            $this->Login_session->update($this->Login_session->check_login()->unique_id, $data);
            $return['status'] = true;
        }

        echo json_encode($return);

	} 
}
?>
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
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
        if($status == 'success_insert' ) {
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการเพิ่มสถานประกอบการเรียบร้อย';
        } else if($status == 'error_add' ) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } else if($status != '' ) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } 
        else {
            $data['status'] = '';
        }

        $data['data'] = $this->Company->gets_company();
    
        $this->template->view('Officer/List_company_view',$data);
    }
    
    
    public function post_add()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('company_name', 'ชื่อสถานประกอบการ', 'trim|required|is_unique[company.name_th]');

        if ($this->form_validation->run() != FALSE) {
            
            $insert['name_th'] = $this->input->post('company_name');
            
 
            if($this->DB_company->add($insert)) {
                return $this->index('success_insert');
                die();
            } else {
                return $this->index('error_add');
                die();
            }
        } else {
            return $this->index(validation_errors());
            die();
        }
    }

}
defined('BASEPATH') OR exit('No direct script access allowed');
class Coop_Submitted_Form_Search extends CI_Controller {
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

        public function by_student()
        {
            $data['data'] = array();
            foreach($this->Coop_Student->gets_coop_student() as $r) {
                $row = array();
                $row['complete_form'] = true; //รอการเช็คสถานะ
                $row['student'] = $this->Student->get_student($r['student_id'])[0];
                $row['department'] = $this->Student->get_department($row['student']['department_id'])[0];

                
                

                array_push($data['data'], $row);
            }
            // $rowsDocument = $this->validate_assessment_coop->gets_document();
            // $checkDocument = array(
            //     'IN-S003', 'IN-S004', 'IN-S005'
            // );

            // $data['data'] = array();
            // foreach($this->validate_assessment_coop->list() as $row) {
            //     $row->document = false;
            //     $i=0;

            //     foreach($rowsDocument as $rox) {
            //         if(in_array($rox->name, $checkDocument)) {
            //             if(@$this->validate_assessment_coop->get_by_student($row->student_id, $rox->id)[0]) {
            //                 $i++;
            //             }
            //         }
            //     }

            //     if(count($checkDocument) == $i) {
            //         $row->document = true; 
            //     }

            //     array_push($data['data'], $row);
            // }
            $this->template->view('Officer/Document_student_check_view',$data);
        }

        public function get_by_student($student_id)
        {
            $array = array();
            $array['data'] = array();
            $rowsDocument = $this->Form->gets_form();
            foreach($rowsDocument as $doc) {
                $tmp['document_code'] = $doc['name'].' - '.$doc['document_name'];
                $tmp['file'] = '';
                $file = $this->Coop_Submitted_Form_Search->search_form_by_student_and_code($student_id, $doc['id']);
                if($file) {
                    $tmp['file'] = $file[0]['pdf_file'];
                }

                array_push($array['data'], $tmp);
            }

            echo json_encode($array);
        }

        public function get_by_form_code($form_code)
        {
            $array = array();
            $array['data'] = array();
            foreach($this->Coop_Student->gets_coop_student() as $r) {
                $row = array();
                $row['student'] = $this->Student->get_student($r['student_id'])[0];
                $row['form'] = @$this->Coop_Submitted_Form_Search->search_form_by_student_and_code($r['student_id'], $form_code)[0];

                array_push($array['data'], $row);
            }
            // foreach($this->Coop_Student->gets_coop_student() as $r) {
            //     $row = array();
            //     $row['student'] = $this->Student->get_student($r['student_id'])[0];
            //     $row['form'] = @$this->Coop_Submitted_Form_Search->search_form_by_student_and_code($r['student_id'], $form_code)[0];

            //     array_push($array['data'], $row);
            // }

            echo json_encode($array);
        }


        public function by_form()
        {
            // get form code
            $data['forms'] = $this->Form->gets_form();

            // $rowsDocument = $this->validate_assessment_coop->gets_document();
            // $checkDocument = array(
            //     'IN-S003'
            // );

            // $data['data'] = array();
            // foreach($this->validate_assessment_coop->list() as $row) {
            //     $row->document = false;
            //     $i=0;

            //     foreach($rowsDocument as $rox) {
            //         if(in_array($rox->name, $checkDocument)) {
            //             if(@$this->validate_assessment_coop->get_by_student($row->student_id, $rox->id)[0]) {
            //                 $i++;
            //             }
            //         }
            //     }

            //     if(count($checkDocument) == $i) {
            //         $row->document = true; 
            //     }

            //     array_push($data['data'], $row);
            // }
            $this->template->view('Officer/Document_code_check_view', $data);
        }
        
 

}
defined('BASEPATH') OR exit('No direct script access allowed');
class Coop_student extends CI_Controller {
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

    
        public function index()
        {
            $data['data'] = array();
            //get student has test
            foreach($this->Coop_Student->gets_coop_student() as $row) {
                //get student
                $tmp_array = array();
                $tmp_array['student'] = $this->Student->get_student($row['student_id'])[0];
    
                //get student field
                $tmp_array['position_title'] = $this->Job->get_job($row['company_job_position_id'])[0]['position_title'];
                
                //get coop test
                $tmp_array['company'] = $this->Company->get_company($row['company_id'])[0];
                
                //mentor
                $tmp_array['trainer'] = $this->Trainer->get_trainer($row['mentor_person_id'])[0];

                // print_r($tmp_array);
                array_push($data['data'], $tmp_array);
            }
    
            $this->template->view('Officer/List_coop_student_view', $data);
        }
    
    
    
    }
defined('BASEPATH') OR exit('No direct script access allowed');
class Document_code_check extends CI_Controller {
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

        public function index()
        {
            $rowsDocument = $this->validate_assessment_coop->gets_document();
            $checkDocument = array(
                'IN-S003'
            );

            $data['data'] = array();
            foreach($this->validate_assessment_coop->list() as $row) {
                $row->document = false;
                $i=0;

                foreach($rowsDocument as $rox) {
                    if(in_array($rox->name, $checkDocument)) {
                        if(@$this->validate_assessment_coop->get_by_student($row->student_id, $rox->id)[0]) {
                            $i++;
                        }
                    }
                }

                if(count($checkDocument) == $i) {
                    $row->document = true; 
                }

                array_push($data['data'], $row);
            }
            $this->template->view('Officer/Document_code_check_view', $data);
        }

        public function get_by_student($student_id)
        {
            $array = array();
            $array['data'] = array();
            $rowsDocument = $this->validate_assessment_coop->gets_document();
            foreach($rowsDocument as $row) {
                $tmp['document_code'] = $row->name;
                $tmp['file'] = '';
                $file = @$this->validate_assessment_coop->get_by_student($student_id, $row->id)[0];
                if($file) {
                    $tmp['file'] = $file->pdf_file;
                }

                array_push($array['data'], $tmp);
            }

            echo json_encode($array);
        }
 

}
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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

	public function index()
	{
        $data['rowNews'] = $this->News->gets_news();

		$this->template->view('template/news_view', $data);
		
	}
}  
  
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

        $data['data'] = $this->News->gets_news();
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
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_list extends CI_Controller {

    public function index(){
        $data['data'] = array();
        
        foreach($this->DB_student->gets() as $row) {
            
            //get student
            $tmp_array = array();
            // student
            $tmp_array['student'] = $row;

            //get student field
            $tmp_array['student_field'] = $this->DB_student_field->get($row->student_field_id);
        


            // print_r($tmp_array);
            array_push($data['data'], $tmp_array);
            
        }


        $this->template->view('Officer/Student_list_view',$data);
    }
    public function detail(){

        $this->template->view('Officer/Student_detail_view');


    }
  }

defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Management extends CI_Controller {
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

    public function index($status = ''){

        if($status == 'error_student_id' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ไม่พบรหัสนิสิตในระบบ';
        } else if($status == 'error_coop_student') {
            $data['status']['color'] = 'danger';            
            $data['status']['text'] = 'เป็นนิสิตสหกิจ';
        } else if($status == 'error_student_pass'){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'นิสิตผ่านการสอบแล้ว';
        }
        else if($status == 'error_has_student'){
            $data['status']['color'] = 'danger';            
            $data['status']['text'] = 'มีนิสิตในรอบการสอบแล้ว';
        }
        else if( $status == 'success'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'เพิ่มสำเร็จ';
        }
        else if( $status == 'success_delete'){
            $data['status']['color'] = 'success';            
            $data['status']['text'] = 'ลบสำเร็จ';
        }
        else {
            $data['status'] = '';
        }

        $data['data'] = array();
        //get student has test
        
        // foreach($this->DB_coop_test_has_student->gets() as $row) {
        //     //get student
        //     $tmp_array = array();
        //     $tmp_array['student'] = $this->DB_student->get($row->student_id);

        //     //get student field
        //     $tmp_array['student_field'] = $this->DB_student_field->get($tmp_array['student']->student_field_id);
            
        //     //get coop test
        //     $tmp_array['coop_test'] = $this->DB_coop_test->get($row->coop_test_id);

        //     // print_r($tmp_array);
        //     array_push($data['data'], $tmp_array);
        // }

        $data['coop_test_list'] = $this->Test->gets_test();

        $this->template->view('Officer/Test_Management_view',$data);

    }
    public function add(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('id','รหัสนิสิต','required|numeric|is_unique[coop_student.student_id]');
        if($this->form_validation->run() == false){
            return $this->index('error_coop_student');
            die('0');
            
        }else{
            $student_id = $this->input->post('id');
            $coop_test_id = $this->input->post('select');
            if(!@$this->DB_student->get($student_id)){
                return $this->index('error_student_id');
                die('error_student_id');
            }
            if(@$this->DB_coop_test_has_student->check_student_pass($student_id)){
                return $this->index('error_student_pass');
                die();
            }
            if(@$this->DB_coop_test_has_student->check_student($student_id,$coop_test_id)){
                return $this->index('error_has_student');
                die();
            }

            $term = $this->Login_session->check_login()->term_id;
            $array['coop_test_id'] = $coop_test_id;
            $array['coop_test_term_id'] = $term;
            $array['student_id'] = $student_id;
            $array['student_term_id'] = $term; 
            $array['coop_test_status'] = '0';
            $this->DB_coop_test_has_student->add($array);
            return $this->index('success');
        }
    }
    public function delete(){
        $array['student_id'] = $this->input->post('student_id');
        $array['coop_test_id'] = $this->input->post('coop_test_id');
        $this->DB_coop_test_has_student->delete($array);
        return $this->index('success_delete');
    }


}
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_form extends CI_Controller {
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
    public function index($status = ''){
        if($status == 'success' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'สำเร็จ';
        }else{
            $data['status'] = '';
        }

        $data['coop_test'] = $this->Test->gets_test();
        $data['coop_test_select'] = array();

        for($i=1; $i<5; $i++){
            $add_list = true;
            foreach($data['coop_test'] as $r) {
                if($i == $r['name']){
                    $add_list = false;
                    break;
                }
            }
            if($add_list){
                $data['coop_test_select'][] = $i;
            }
        }
        $data['coop_time_select'] = date('Y-m-d H:i:s', strtotime(@$data['coop_test'][0]['test_date'])+86400);
        // print_r($data);
        $this->template->view('Officer/Test_form_view',$data);
    }

    public function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('select','ครั้งที่สอบ','required|numeric');
        if($this->form_validation->run() == false){
            die('404');
        }else{
            //if dup
            if($this->DB_coop_test->get_by_name($this->input->post('select'))) {
                //dup
                return $this->index('error_dup');                
            } else {
                //
                $term = $this->Login_session->check_login()->term_id;
                $array['term_id'] = $term;
                $array['name'] =  $this->input->post('select');
                $array['test_date'] = $this->input->post('test_date');
                $array['register_status'] =  '0';
                $this->DB_coop_test->add($array);
                return $this->index('success');
            }   
        }
    }

    public function ajax_changeStatus()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status', 'สถานะ', 'required|numeric|in_list[0,1]');

        $return['status'] = false;

        if ($this->form_validation->run()) {
            //change in db
            $array['register_status'] = $this->input->post('status');
            $coop_test_id = $this->input->post('coop_test_id');            
            $this->Test->update_test($coop_test_id, $array);
            
            $return['status'] = true;
        }

        echo json_encode($return);

	} 
}

defined('BASEPATH') OR exit('No direct script access allowed');

class Test_result extends CI_Controller {

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
        if($status == 'ok_upload' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'บันทึกผลการสอบเรียบร้อย';
        } else if($status == 'error_upload' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ไม่รองรับไฟล์ โปรดตรวจสอบ';
        } 
        else {
            $data['status'] = '';
        }

        $data['coop_test'] = $this->Test->gets_test();

        $this->template->view('Officer/Test_result_view',$data);
        
    }

    public function upload()
	{
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('coop_test_id','ครั้งการสอบ','required|numeric');
        if($this->form_validation->run() != false){
            //check coop test id
            $coop_test_id = $this->input->post('coop_test_id');            
            if(!$this->Test->get_test($coop_test_id)) {
                return $this->index('error_upload');
                die();
            }

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 1500;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file-input')) {
                $data['status'] = $this->upload->display_errors();
                return $this->index('error_upload');
                die();
            } else {
                
                $file = $this->upload->data();            
                $data['status'] = 'success';
                //insert to db

                //แปลง Excel
                require(FCPATH.'/application/libraries/XLSXReader.php');
                $xlsx = new XLSXReader($file['full_path']);
                $sheet = $xlsx->getSheetNames()[1];
                foreach($xlsx->getSheetData($sheet) as $row) {
                    $student_id = trim($row[0]);
                    $result = trim($row[1]);
                    // if($result == 'ผ่าน') {
                    if($result > '49') {                        
                        $result = 1; //pass test
                    } else {
                        $result = 2; //fail test
                    }

                    //check student id in test
                    if($this->Test->get_student_by_test_and_student($student_id, $coop_test_id)) {
                        //add data
                        $this->Test->add_test_result_by_student($student_id, $coop_test_id, $result);
                    }
                    
                }
                unlink($file['full_path']);
                return $this->index('ok_upload');
                die();

            }
        } else {
            return $this->index('error_upload');      
            die();  
        }
    }
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_check_student extends CI_Controller {
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
        if($status == 'error_train_id' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ไม่พบโครงการการอบรม';
        } else if($status != '' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        }  
        else {
            $data['status'] = '';
        }

        $data['data'] = array();
        //get student has test
        foreach($this->Training->gets_training() as $row) {
            //get train_type_id
            $tmp_array = array();
            $tmp_array['train'] = $row;
            $tmp_array['train_type'] = $this->Training->get_type($row['train_type_id']);
            array_push($data['data'], $tmp_array);
        }

        $this->template->view('Officer/Train_check_student_view',$data);
    }

    public function check()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('train_id', 'train_id', 'trim|required|numeric');
        $this->form_validation->set_rules('note', 'Note', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            if(!$this->Training->get_training($this->input->post('train_id'))) {
                return $this->index('error_train_id');
                die();
            }

            //create train_set_check
            $train_set_check['train_id'] = $this->input->post('train_id');
            $train_set_check['note'] = $this->input->post('note');
            $train_set_check['datetime'] = date('Y-m-d H:i:s');
            
            $train_set_check_id = $this->Training_Check_Student->insert_check($train_set_check);
            $train_set_check_id = $this->db->insert_id();
            redirect('Officer/Train_check_student/check_student/'.$train_set_check_id);
        } else {
            return $this->index(validation_errors());
            die();
        }
    }

    public function check_student($check_id)
    {
        if(!$this->Training_Check_Student->get_check($check_id)) {
            return $this->index('error_train_id');
            die();
        }
        $data['check_id'] = $check_id;   
        $data['training_check_student'] = $this->Training_Check_Student->get_check($check_id)[0];
        $data['train'] = $this->Training->get_training($data['training_check_student']['train_id'])[0];
        $data['total_student'] = $data['train'];


        $this->template->view('Officer/Train_check_student_form_view', $data);
    }

    public function ajax_get()
    {
        //get list
        //check train set
        $return['status'] = false;
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('train_set_check_id', 'train_set_check_id', 'trim|required|numeric');

        if ($this->form_validation->run() != FALSE) {
            $train_set_check_id = $this->input->post('train_set_check_id');
        
            $data['train_set_check'] = @$this->Training_Check_Student->get_check($train_set_check_id);
            if(!@$data['train_set_check']) {
                $return['status'] = false;
            } else {
                $return['status'] = true;
                
                $return['rows'] = array();
                //has
                foreach($this->Training_Check_Student->gets_student_by_check($train_set_check_id) as $row) {
                    $tmp = array();
                    $tmp['train_check'] = $row;
                    $tmp['student'] = $this->Student->get_student($row['student_id'])[0];
                    array_push($return['rows'], $tmp);
                }
            }
        } else {
            $return['status'] = false;
        }

        echo json_encode($return);

    }

    public function ajax_post()
    {
        $return['status'] = false;
        //post student
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('student_code', 'รหัสนิสิต', 'trim|required|numeric');
        $this->form_validation->set_rules('train_set_check_id', 'train_set_check_id', 'trim|required');

        if ($this->form_validation->run() != FALSE) {
            $return['status'] = true;

            //check student
            $data['student'] = @$this->Student->get_student($this->input->post('student_code'))[0];
            if(!@$data['student']) {
                $return['status'] = false;                
            }

            //check train set
            $data['train_set_check'] = @$this->Training_Check_Student->get_check($this->input->post('train_set_check_id'))[0];
            if(!@$data['train_set_check']) {
                $return['status'] = false;
            }

            //check student_train_register
            if(!@$this->Training->check_student_in_training($data['train_set_check']['train_id'], $this->input->post('student_code'))) {
                $return['status'] = false;
            }

            //check train_check_student
            if(@$this->Training_Check_Student->get_student_by_check($this->input->post('student_code'), $this->input->post('train_set_check_id'))) {
                $return['status'] = false;
            }

            

            if($return['status']) {
                $return['student'] = $data['student'];                            
                //insert
                // $array['train_id'] = $data['train_set_check']->train_id;
                $array['train_set_check_id'] = $this->input->post('train_set_check_id');
                $array['student_id'] = $this->input->post('student_code');
                $array['date_check'] = date('Y-m-d H:i:s');
                // $array['term_id'] = $this->Login_session->check_login()->term_id;
                
                $this->Training_Check_Student->add_student($array['student_id'], $array['train_set_check_id']);
                $return['entry_time'] = $array['date_check'];
            }
        } else {
            $return['status'] = false;            
        }

        
        echo json_encode($return);
    }





}
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_history extends CI_Controller {

    public function index(){
        $data['data'] = array();
        
        foreach($this->DB_train->gets() as $row) {
            
            //get student
            $tmp_array = array();
            // student
            $tmp_array['train'] = $row;
        
            // print_r($tmp_array);
            array_push($data['data'], $tmp_array);

            
            
        }

        $this->template->view('Officer/Train_history_view',$data);
    }
  }

defined('BASEPATH') OR exit('No direct script access allowed');

class Train_location extends CI_Controller {

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
        if($status == 'success_delete' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการลบเรียบร้อย';
        } else if($status == 'error_delete' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } 
        else {
            $data['status'] = '';
        }

        $data['train_locations'] = $this->Training->gets_location();
        $this->template->view('Officer/Train_location_view',$data);
    }

    public function add($status = '')
    {
        $this->template->view('Officer/Train_location_form_view');
    }

    public function edit($room_id)
    {
        $data['row'] = $this->Training->get_location($room_id)[0];
        $this->template->view('Officer/Train_location_form_view',$data);
    }    

    public function ajax_post()
    {
        $return['status'] = false;
        $return['print'] = false;
                
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('building', 'ตึก', 'trim|required');
        $this->form_validation->set_rules('room', 'ห้อง', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim|numeric');
        
        if ($this->form_validation->run() != FALSE) {
            $data['building'] =  $this->input->post('building');
            $data['room'] = $this->input->post('room');
            $room_id = $this->input->post('id');
            
            //save
            if(@$this->Training->get_location($room_id)) {
                //update                
                $this->Training->update_location($room_id, $data);
            } else {
                //insert
                $this->Training->insert_location($data);                
            }

            $return['status'] = true;
        } else {
           $return['status'] = false;
           $return['message'] = strip_tags(validation_errors());
        }

        echo json_encode($return);

    }

    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('id', 'id', 'trim|required|numeric');
        if ($this->form_validation->run() != FALSE) {
            $room_id = $this->input->post('id');            
            if($this->Training->get_location($room_id)) {
                //delete
                $this->Training->delete_location($room_id);
                return $this->index('success_delete');
                die();
            } else {
                return $this->index('error_delete');
                die();
            }
        } else {
            return $this->index('error_delete');
            die();
        }
        
    }

}
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer extends CI_Controller {
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

    public function list($id, $status = '')
    {
        if($status == 'success_delete' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการลบเรียบร้อย';
        } else if($status == 'error_delete' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } 
        else {
            $data['status'] = '';
        }
        $data['data'] = array();
        //get student has test

        foreach($this->Trainer->gets_trainer_by_company($id) as $row) {
            //get train_type_id
            $tmp_array = array();
            $tmp_array['company_person'] = $row;
            $tmp_array['company'] = $this->Company->get_company($row['company_id']);
            array_push($data['data'], $tmp_array);
        }      
        $this->template->view('Officer/List_officer_company_view',$data);
    }
   
    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('company_person_id', 'company_person_id', 'trim|required|numeric');
        $this->form_validation->set_rules('company_id', 'company_id', 'trim|required|numeric');
        $company_id = $this->input->post('company_id');
    
        if ($this->form_validation->run() != FALSE) {
            $company_person_id = $this->input->post('company_person_id');

            if($this->DB_company_person->get($company_person_id)) {
                //delete
                $this->DB_company_person->delete($company_person_id);
                return $this->list($company_id, 'success_delete');
                die();
            } else {
                return $this->list($company_id, 'error_delete');
                die();
            }
        } else {
            return $this->list($company_id, 'error_delete');
            die();
        }
        
    }





}
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {
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
        if($status == 'success_delete' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ทำการลบเรียบร้อย';
        } else if($status == 'error_delete' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดตรวจสอบ';
        } else if($status == 'success_insert' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'เพิ่มข้อมูลโครงการการอบรมเรียบร้อย';
        } else if($status == 'success_update' ){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'แก้ไขข้อมูลแก้อบรมเรียบร้อย';
        }  
        else {
            $data['status'] = '';
        }

        $data['data'] = array();
        //get student has test
        foreach($this->Training->gets_training() as $row) {
            //get train_type_id
            $tmp_array = array();
            $tmp_array['train'] = $row;
            $tmp_array['train_type'] = $this->Training->get_type($row['train_type_id'])[0];
            array_push($data['data'], $tmp_array);
        }
        $this->template->view('Officer/Train_list_view',$data);
    }
   
    public function delete()
    {
        //check if exist
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('id', 'id', 'trim|required|numeric');
        
        if ($this->form_validation->run() != FALSE) {
            $id = $this->input->post('id');            

            if(@$this->DB_train->get($id)) {
                //delete
                $this->DB_train->delete($id);
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

    public function edit($id, $status = '')
    {
        if($status == 'error_location') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอสถานที่อบรม';
        } else if($status == 'error_type') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอประเภทการอบรม';
        } else if($status != '' && !is_numeric($status)) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } else {
            $data['status'] = '';
        }

        //get id

        $data['data'] = $this->Training->get_training($id)[0];
        $data['train_type'] = $this->Training->gets_type();
        $data['train_location'] = $this->Training->gets_location();

            
        $this->template->view('Officer/Edit_Train_list_view', $data);
    }

    public function add($status = '')
    {
        if($status == 'error_location') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอสถานที่อบรม';
        } else if($status == 'error_type') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'ไม่เจอประเภทการอบรม';
        } else if($status != '' ) {
            $data['status']['color'] = 'danger';
            $data['status']['text'] = $status;
        } else {
            $data['status'] = '';
        }

        $data['train_type'] = $this->Training->gets_type();
        $data['train_location'] = $this->Training->gets_location();
        $this->template->view('Officer/Add_Train_list_view', $data);
    }

    public function post_add()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('train_type', 'ประเภทการอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('title', 'ชื่อโครงการอบรม', 'trim|required');
        $this->form_validation->set_rules('lecturer', 'วิทยากร', 'trim|required');
        $this->form_validation->set_rules('number_of_seat', 'จำนวนที่นั่งเปิดรับ', 'trim|required|numeric');
        $this->form_validation->set_rules('date', 'วันที่อบรม', 'trim|required');
        $this->form_validation->set_rules('train_location', 'ห้องอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('register_period', 'วันเวลาเปิดรับสมัคร', 'trim|required');
        $this->form_validation->set_rules('number_of_hour', 'จำนวนชั่วโมงที่ได้รับ', 'trim|required|numeric');

        if ($this->form_validation->run() != FALSE) {
            //check train_location
            if(!$this->Training->get_location($this->input->post('train_location'))) {
                return $this->add('error_location');
                die();
            }
            //check train_type
            if(!$this->Training->get_type($this->input->post('train_type'))) {
                return $this->add('error_type');
                die();
            }

            //add
            $insert['train_type_id'] = $this->input->post('train_type');
            $insert['title'] = $this->input->post('title');
            $insert['lecturer'] = $this->input->post('lecturer');
            $insert['number_of_seat'] = $this->input->post('number_of_seat');
            $insert['date'] = $this->input->post('date');
            $insert['train_location_id'] = $this->input->post('train_location');
            $insert['register_period'] = $this->input->post('register_period');
            $insert['number_of_hour'] = $this->input->post('number_of_hour');
            
 
            if($this->Training->insert_training($insert)) {
                return $this->index('success_inert');
                die();
            } else {
                return $this->add('error_add');
                die();
            }
        } else {
            return $this->add(validation_errors());
            die();
        }
    }

    public function post_edit()
    {
        //insert
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('id', 'primary_id', 'trim|required|numeric');
        $this->form_validation->set_rules('train_type', 'ประเภทการอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('title', 'ชื่อโครงการอบรม', 'trim|required');
        $this->form_validation->set_rules('lecturer', 'วิทยากร', 'trim|required');
        $this->form_validation->set_rules('number_of_seat', 'จำนวนที่นั่งเปิดรับ', 'trim|required|numeric');
        $this->form_validation->set_rules('date', 'วันที่อบรม', 'trim|required');
        $this->form_validation->set_rules('train_location', 'ห้องอบรม', 'trim|required|numeric');
        $this->form_validation->set_rules('register_period', 'วันเวลาเปิดรับสมัคร', 'trim|required');
        $this->form_validation->set_rules('number_of_hour', 'จำนวนชั่วโมงที่ได้รับ', 'trim|required|numeric');
        $id = $this->input->post('id');

        if ($this->form_validation->run() != FALSE) {
            //check primary key
            if(!$this->Training->get_training($id)) {
                return $this->edit($id, 'error_location');
                die();
            }
            //check train_location
            if(!$this->Training->get_location($this->input->post('train_location'))) {
                return $this->edit($id, 'error_location');
                die();
            }
            //check train_type
            if(!$this->Training->get_type($this->input->post('train_type'))) {
                return $this->edit($id, 'error_type');
                die();
            }

            //add
            $insert['train_type_id'] = $this->input->post('train_type');
            $insert['title'] = $this->input->post('title');
            $insert['lecturer'] = $this->input->post('lecturer');
            $insert['number_of_seat'] = $this->input->post('number_of_seat');
            $insert['date'] = $this->input->post('date');
            $insert['train_location_id'] = $this->input->post('train_location');
            $insert['register_period'] = $this->input->post('register_period');
            $insert['number_of_hour'] = $this->input->post('number_of_hour');
            
 
            if($this->Training->update_training($id, $insert)) {
                return $this->index('success_update');
                die();
            } else {
                return $this->edit($id, 'error_edit');
                die();
            }
        } else {
            return $this->edit($id, validation_errors());
            die();
        }
    }





}
defined('BASEPATH') OR exit('No direct script access allowed');
// student
class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

	public function index()
	{
        $data['rowNews'] = $this->News->gets_news();
		$this->template->view('template/news_view', $data);
		
	}
}  
  
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_result extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }


    public function index()
    {
        
        $this->template->view('Student/Register_result_view');
    }

  


}
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_student_info extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }


    public function index()
    {
        
        $this->template->view('Student/Report_student_info_view');
    }

    public function register_form_company()
    {
        $this->template->view('Student/Register_form_company_view');
    }


}
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }


    public function index(){
        $student_id = $this->Login_session->check_login()->login_value;
        $data['student'] = $this->DB_student->get($student_id);    
        $data['student_field'] = $this->DB_student_field->get( $data['student']->student_field_id);
        $this->template->view('Student/Student_data_view',$data);
    }
  



}
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->Login_session->check_login()) {
            $this->session->sess_destroy();
            redirect('member/login');
		}
		
		//check priv
        if($this->Login_session->check_login()->login_type != 'student') {
            redirect($this->Login_session->check_login()->login_type);
            die();
        }
    }

	public function index($status = '')
	{
        $student_id = $this->Login_session->check_login()->login_value;

        //get current test id
        $data['coop_test'] = $this->DB_coop_test->get_open_register();
        //check already register?
        $data['already_register'] = false;
        if($status == 'error_unknown' ){
            $data['status']['color'] = 'danger';
            $data['status']['text'] = 'ผิดพลาด โปรดรอการตรวจสอบ';
        } else if($status == 'error_student_dup') {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'คุณเคยลงทะเบียนไปแล้ว โปรดมาสอบตามวันเวลาที่นัดหมาย';
            $data['already_register'] = true;            
        } else if($status == 'success'){
            $data['status']['color'] = 'success';
            $data['status']['text'] = 'ลงสมัครสอบเรียบร้อย โปรดมาสอบตามวันเวลาที่นัดหมาย';
            $data['already_register'] = true;            
        } else if(@$this->DB_coop_test_has_student->check_student($student_id, $data['coop_test']->id)) {
            $data['status']['color'] = 'warning';
            $data['status']['text'] = 'คุณเคยลงทะเบียนไปแล้ว โปรดมาสอบตามวันเวลาที่นัดหมาย';
            $data['already_register'] = true;
        }
        else {
            $data['status'] = '';
        }

        

		$this->template->view('student/test_register_view', $data);
		
    }
    
    public function register()
    {
        $student_id = $this->Login_session->check_login()->login_value;
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm','Confirm','required|in_list[1]');
        if($this->form_validation->run() == false){
            return $this->index('error_unknown');
            die();
        } else {
            //get current test id
            $data['coop_test'] = $this->DB_coop_test->get_open_register();
            $data['student'] = $this->DB_student->get($student_id);

            //check already register?
            if(@$this->DB_coop_test_has_student->check_student($student_id, $data['coop_test']->id)) {
                return $this->index('error_student_dup');
                die();
            }

            //register
            $array['coop_test_id'] = $data['coop_test']->id;
            $array['coop_test_term_id'] = $data['coop_test']->term_id;
            $array['student_term_id'] = $data['student']->term_id;
            $array['student_id'] = $data['student']->id;
            $array['coop_test_status'] = '0';
        
            $this->DB_coop_test_has_student->add($array);

            return $this->index('success');

        }
    }


    public function result()
    {
        $student_id = $this->Login_session->check_login()->login_value;
        
        $data = array();
        $data['rows'] = array();
        foreach($this->DB_coop_test_has_student->gets_by_student($student_id) as $row) {
            //get testdate
            $coop_test = $this->DB_coop_test->get($row->coop_test_id);

            $row->test_date = $coop_test->test_date;
            $row->name = $coop_test->name;
            
            array_push($data['rows'], $row);
        }
		$this->template->view('student/test_result_view', $data);        
    }
}  
  
defined('BASEPATH') OR exit('No direct script access allowed');

class Train_register extends CI_Controller {

    public function index(){

        $data['data'] = $this->Train->get_list();
        $this->template->view('Student/Train_register_view',$data);
    }
    public function get_train(){
        $data['data'] = $this->Train->get_list();
        print_r($data);
    }

}
