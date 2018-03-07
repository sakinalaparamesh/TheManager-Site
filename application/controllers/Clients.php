<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('global_helper');
        is_admin_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        //$this->load->model('clients_model');
        
    }
    public function index() {
        $data['title']="Clients";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Clients','Clients');
        
        $this->layout->view('clients/clients', $data);
    }

}
