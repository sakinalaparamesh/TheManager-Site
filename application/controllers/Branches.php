<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Branches extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->load->model('branches_model');
    }

    public function index($branchId = '') {
        $data['title'] = "Branches";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Branches', 'branches');

        $this->layout->view('branches/branchesList', $data);
    }

    public function addBranch($id = 0) {
        $data['title'] = "Add Branch";
        $details = array();
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Branches', 'branches');
        $this->breadcrumbs->push('Add Branch', 'Add Branch');

//        $details = $this->branches_model->getBranchDetailsById($id);
//        if(count($details)>0){
//            $data['details'] = $details;
//        }else{
//            $data['details'][] = array('branchid'=>0,'branchname'=>'','branchcode'=>'','branchdescription'=>'','isactive'=>'Y');
//        }
        //echo "<pre>"; print_r($data); exit;
        $this->layout->view('branches/addBranch', $data);
    }

    public function saveBranchAjax() {
        $ps_data = $this->input->post("BranchData");

        $save_data = array(
            "location" => $ps_data["location"],
            "address" => $ps_data["address"],
            "phonenumber" => $ps_data["phonenumber"],
            "email" => $ps_data["email"],
            "isactive" => "Y",
            "createdby" => $this->session->userdata('UserId'),
            "createdon" => date("Y-m-d H:i:s")
        );
        $resdata['error_code'] = $this->branches_model->brabchSave($save_data);
        $resdata['message'] = getErrorMessages("Branches", "saveBranchAjax", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }
    public function getAllBranches() {

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->branches_model->getAllBranches($limit, $start, $search, $order, $dir);
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

}
