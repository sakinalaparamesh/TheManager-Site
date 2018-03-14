<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Administration extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('administration_model');
    }
    public function index() {
        
        $data['title']="Administration";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        
        $data['clients_count'] = $this->administration_model->getClientsCount();
        
        //echo "<pre>"; print_r($data); exit;
        
        $this->layout->view('administration/administration', $data);
    }
   

}
