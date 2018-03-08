<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_user_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        //$this->load->model('clients_model');
        $session_items = array('IsUserLoggedIn' => TRUE, 'UserId' => 1);
        $this->session->set_userdata($session_items);
        
    }
    public function index() {
        $data['title']="Administration";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        
        $this->layout->view('administration/administration', $data);
    }
   

}
