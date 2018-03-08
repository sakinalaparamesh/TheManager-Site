<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Administration extends BaseController {

    public function __construct() {
        parent::__construct();
        
    }
    public function index() {
        $data['title']="Administration";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        
        $this->layout->view('administration/administration', $data);
    }
   

}
