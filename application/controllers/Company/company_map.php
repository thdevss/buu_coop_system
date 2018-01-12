<?php
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
        $company_id = $this->Company->getByPerson($this->Login_session->check_login()->login_value)->id;
        
        $data['map'] = $this->Company_address->get($company_id)[0];
        $this->template->view('company/map_view', $data);
    }

    public function post_map()
    {
        $insert['latitude'] = $this->input->post('latitude');
        $insert['longitude'] = $this->input->post('longitude');
        $company_id = $this->Company->getByPerson($this->Login_session->check_login()->login_value);

        $arr = array(
            'status' => false,
            'txt' => 'err',            
        );

        if($this->Company_address->update($company_id, $insert)) {
            $arr['status'] = true;
            $arr['txt'] = 'ok';            
        }
        
        echo json_encode($arr);
    }


}