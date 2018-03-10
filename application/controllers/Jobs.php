<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Jobs extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $this->layout->view('jobs/jobs_list', $data);
    }

    public function jobsForms() {
        $data = array();
        $this->layout->view('jobs/jobs_post', $data);
    }

}
