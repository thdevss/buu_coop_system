<?php

class MY_Form_validation extends CI_Form_validation {


    public function thai_character($input) 
    {

        $this->set_message('thai_character', '{field}, โปรดกรอกภาษาไทยเท่านั้น');

        if (preg_match("/^[ก-๙]+$/", $input)) {
            return true;
        }
    
        return false;
    }

    public function thai_eng_character($input)
    {
        $this->set_message('thai_eng_character', '{field}, โปรดกรอกภาษาไทยและภาษาอังกฤษเท่านั้น');

       

        return true;
    }
}