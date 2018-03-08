<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

//    private $obj;

    public function __construct() {
        parent::__construct();
//        $this->obj = & get_instance();
        is_user_loggedin();
        $this->layout->setLayout('layout/adminLayout');
    }

    public function viewData($data = "") {
        $this->load->view('layout/adminLayout',$data);
    }

}
