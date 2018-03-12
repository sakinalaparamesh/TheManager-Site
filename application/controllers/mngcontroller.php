<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mngcontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->helper('global_helper');
        //is_admin_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        $this->load->model('mngcontrollerModel');
        
    }

    public function index() {
         $data['title']="mngcontroller";
        $this->layout->view('mngcontroller/mngcontrollers', $data);
         $this->breadcrumbs->push('Add C0ntroller','mngcontroller/addoredit');
        
    }

    public function addoredit() {
        $data['title']="Add Controller";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('mngcontroller','mngcontroller/mngcontrollerlist');
        $this->breadcrumbs->push('ControllerForm', 'ControllerForm');
        $this->layout->view('mngcontroller/mngcontroller_form', $data);
    }

    public function savemngcontroller() {
        $ps_data = $this->input->post("mngcontrollerData");
        
        $mng_data = array(            
            "controllername" => $ps_data["controllername"],
            "displayname" => $ps_data["displayname"],
            "description" => $ps_data["description"],
            "isactive" => "Y",
            "createdon" => date("Y-m-d H:i:s")
        );      
       $resdata['error_code']=$this->mngcontrollerModel->mngcontrollerSave($mng_data);
       $resdata['message'] = getErrorMessages("mngcontroller","Save",$resdata['error_code']);
       $resdata['isError'] = $resdata['error_code']>1?"Y":"N";
       echo json_encode($resdata);
    }
    public function mngcontrollerlist() {
        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('MngControllers', 'mngcontrollers');
        $this->layout->view('mngcontroller/mngcontrollers', $data);
    }
    public function getAllmngcontrollers() {

//        $res = $this->Model->fetch("tbl_mng_controllermaster");
//        echo json_encode($res->result());
        
            $limit  = $this->input->post('length');
            $start  = $this->input->post('start');
            $order  = $this->input->post('order')[0]['column'];
            $dir    = $this->input->post('order')[0]['dir'];
            $search = $this->input->post('search')['value'];
            $search = (!empty($search)) ? $search : '';

            $result = $this->mngcontrollerModel->getAllmngcontrollers($limit,$start,$search,$order,$dir);
            $totalFiltered = $totalData = $result['totalFiltered'];
            $data =  $result['ResultData'];
            if(!empty($search)) $totalFiltered = count($data);

            $json_data = array(
                            "draw"            => intval($this->input->post('draw')),  
                            "recordsTotal"    => intval($totalData),  
                            "recordsFiltered" => intval($totalFiltered), 
                            "data"            => $data,
                            "limit"            => $limit,
                            "start"            => $start,
                            );

            echo json_encode($json_data); 
    }

}
