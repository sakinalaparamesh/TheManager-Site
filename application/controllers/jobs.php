<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class jobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->helper('global_helper');
        //is_admin_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        //$this->load->model('RoleModel');        
    }
    
    public function addOrEdit() {
        $data = array();
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('jobpost', 'jobpost');
        $this->layout->view('jobs/jobpost_frm', $data);
    }
    
    public function jobpostList() {
        $data = array();     
        $this->layout->view('jobs/jobpostlist', $data);
    }
   

}
