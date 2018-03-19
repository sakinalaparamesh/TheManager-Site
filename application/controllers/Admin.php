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

    public function login() {
        $user_info = $this->login_model->CheckUser();
        $user_info['IsUserLoggedIn'] = TRUE;
        
        
//        print_r($user_info);exit;

        if (!isset($IsValid)) {
            $this->session->set_userdata($user_info);
            redirect('administration');
        } else {
            $this->session->set_flashdata('flashmsg', 'please recheck your credentials.');
            redirect('Admin');
        }
    }

    public function logout() {
        $array_items = array('IsUserLoggedIn' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();

        redirect(base_url());
    }

}
