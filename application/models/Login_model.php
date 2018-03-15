<?php

class Login_model extends CI_model {

    public function CheckUser()
    {
        try{
           $username= $this->input->post("user_email");
           $password=md5($this->input->post("current_password"));
            $res= $this->Model->check("tdl_mng_usermaster",array("user_email"=>$username,"current_password"=>$password));
            if($res->num_rows()>0){
                return  $res;
            }else{
                return 0;
            }
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return 0;
        }
    }
	
	
}//class
