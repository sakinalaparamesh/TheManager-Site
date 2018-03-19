<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Jobs extends BaseController {

    public function __construct() {
        
        parent::__construct();
        $this->load->model("Jobs_model");
    }

    public function index() {
        $data = array();
       $data['title'] = "Jobs";
       //Bread Crumbs
       $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Jobs', 'jobs');
        
        $this->layout->view('jobs/jobs_list', $data);
    }

    public function jobsForms() {
        $data['title'] = "Jobs Form";
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Jobs', 'Jobs');
        $this->breadcrumbs->push('Add Job', 'jobsForms');
        $data['country_list'] = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "COUNTRIES", "isactive" => "Y"))->result_array();
        $data['skillset_list'] = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "SKILLSET", "isactive" => "Y"))->result_array();
        
        $this->layout->view('jobs/jobs_post', $data);
    }

    public function saveJob() {
        $ps_data = $this->input->post("jobJson");

        $dep_data = array(
            "jobs_skillset" => $ps_data["jobs_skillset"],
            "jobs_position" => $ps_data["jobs_position"],
            "jobs_numberofposition" => $ps_data["jobs_numberofposition"],
            "jobs_joiningdate" => date("Y-m-d", strtotime($ps_data["jobs_joiningdate"])),
            "jobs_position_startdate" => date("Y-m-d", strtotime($ps_data["jobs_position_startdate"])),
            "jobs_position_enddate" => date("Y-m-d", strtotime($ps_data["jobs_position_enddate"])),
            "jobs_country" => $ps_data["jobs_country"],
            "jobs_description" => $ps_data["jobs_description"],
            "jobs_eligibilitycriteria" => $ps_data["jobs_eligibilitycriteria"],
            "isactive" => "Y",
            "createdby" => $this->session->userdata("UserInfo")['userid'],
            "createdon" => date("Y-m-d H:i:s")
        );

        $resdata['error_code'] = $this->Jobs_model->saveJob($dep_data);

        $resdata['message'] = getErrorMessages("Jobs", "saveJob", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }
    public function jobs() {
        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Add-Job', 'JobForm');
        
        $this->layout->view('jobs/jobs_list', $data);
    }
     public function getAllJobs() {

//        $res = $this->Model->fetch("tbl_mng_jobmaster");
//        echo json_encode($res->result());

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->Jobs_model->getAllJobs($limit, $start, $search, $order, $dir);
        $totalFiltered = $totalData = $result['totalFiltered'];
        $data = $result['ResultData'];
        if (!empty($search))
            $totalFiltered = count($data);

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
            "limit" => $limit,
            "start" => $start,
        );

        echo json_encode($json_data);
    }
    public function getJobFullDetailsAjax() {
        $id= $this->input->post("jobid");
        $data['job_details']= $this->Model->check("tbl_mng_jobs",array("jobs_id"=>$id))->row_array();
        $data['title']="Job Details";
//        print_r($data);
        $this->load->view('jobs/job_details', $data);
    }

}
