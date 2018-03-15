<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        
    }
    public function index() {
                
                $this->load->view('login');
                
//                 redirect('administration');
}
public  function login(){
    $user_info=$this->login_model->CheckUser()->row();
                $session_items = array('IsUserLoggedIn' => TRUE, 'UserId' => $user_info->userid,'UserId' => $user_info->user_name);
                $this->session->set_userdata($session_items);
                redirect('administration');
}
public function logout()
	{
     		$array_items = array('IsAdminLoggedIn' => '', 'AdminUserId' => '', 'AdminUserName' => '','AdminUserPic' => '','AdminLogo' => '','AdminUserRoleId' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();	
		redirect(base_url());
	}
}