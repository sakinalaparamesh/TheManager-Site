<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        $this->load->view('login');
    }

    public function departments() {
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/footer');
    }

}
