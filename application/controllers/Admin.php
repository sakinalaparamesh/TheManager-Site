<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Admin extends BaseController {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        
        if(isset($_POST['loginSubmit'])){
            
            $session_items = array('IsUserLoggedIn' => TRUE, 'UserId' => 1);
            $this->session->set_userdata($session_items);
            redirect('administration');
        }
        $this->load->view('login');
    }

}
