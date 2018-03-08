<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Admin extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('login');
    }

    public function departments() {
        $data['content_for_layout']="department_form";
        
        $this->viewData($data);
    }

    public function user() {

        $this->load->view('layouts/header');
        $this->load->view('userRegistration');
        $this->load->view('layouts/footer');
    }

}
