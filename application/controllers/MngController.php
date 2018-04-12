<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/BaseController.php';

class MngController extends BaseController {

    public function __construct() {
        parent::__construct();
        //$this->load->helper('global_helper');
        //is_admin_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        $this->load->model('mngcontrollerModel');
        
    }

    public function index() {
        
         $data['title']="mngcontroller";
         
         $this->load->library('breadcrumbs');
         $this->breadcrumbs->push('Administration', 'administration');
         $this->breadcrumbs->push('Add C0ntroller','MngController/addoredit');
         
         $this->layout->view('mngcontroller/mngcontrollers', $data);
        
    }

    public function addoredit($id = '') {
        $data['title']="Add Controller";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('mngcontroller','mngController/mngcontrollerlist');
        $this->breadcrumbs->push('ControllerForm', 'ControllerForm');
        if ($id != '') {
            $q_data = array(
                "controllerid" => $id
            );
            $data['mngcontroller_info'] = $this->Model->check("tbl_mng_controllermaster", $q_data)->row();
        }
        $this->layout->view('mngcontroller/mngcontroller_form', $data);
    }

    public function savemngcontroller() {
        
        $ps_data = $this->input->post("mngcontrollerData");
        
//        print_r($ps_data); exit;
        if ($ps_data["controllerid"] == "") {
            $mng_data = array(
                "controllername" => $ps_data["controllername"],
                "displayname" => $ps_data["displayname"],
                "description" => $ps_data["description"],
                "isactive" => "1",
                "createdby" => $this->session->userdata("UserInfo")['userid'],
                "createdon" => date("Y-m-d H:i:s")
            );
            $resdata['error_code'] = $this->mngcontrollerModel->mngcontrollerSave($mng_data);
            $resdata['message'] = getErrorMessages("MngController", "savemngcontroller", $resdata['error_code']);
        } else {
            $mng_data = array(
                "controllername" => $ps_data["controllername"],
                "displayname" => $ps_data["displayname"],
                "description" => $ps_data["description"],
                "isactive" => "Y",
                "updatedby" => $this->session->userdata("UserInfo")['userid'],
                "createdon" => date("Y-m-d H:i:s")
            );
            $resdata['error_code'] = $this->mngcontrollerModel->mngcontrollerUpdate($mng_data, $ps_data["controllerid"]);
            $resdata['message'] = getErrorMessages("MngController", "savemngcontroller", $resdata['error_code']);
        }

        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }
        
//        $mng_data = array(            
//            "controllername" => $ps_data["controllername"],
//            "displayname" => $ps_data["displayname"],
//            "description" => $ps_data["description"],
//            "isactive" => "Y",
//            "createdon" => date("Y-m-d H:i:s")
//        );      
//       $resdata['error_code']=$this->mngcontrollerModel->mngcontrollerSave($mng_data);
//       $resdata['message'] = getErrorMessages("mngController","Save",$resdata['error_code']);
//       $resdata['isError'] = $resdata['error_code']>1?"Y":"N";
//       echo json_encode($resdata);
//    }
    public function mngcontrollerlist() {
        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('MngControllers', 'mngController');
        $this->layout->view('mngcontroller/mngcontrollers', $data);
    }
    public function getAllmngcontrollers() {

//        $res = $this->Model->fetch("controllermaster");
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
    public function getmngcontrollerFullDetailsAjax() {
        $data['title'] = "Controller Details";
        $controllerid = $this->input->post('controllerid');        

        $data['details'] = $this->Model->check("tbl_mng_controllermaster",array("controllerid"=>$controllerid))->row();

        $this->load->view('mngcontroller/mngcontroller_details', $data);
    }
    public function delete_mngcontroller() {
        $id = $this->input->post("mng_id");
        $resdata['error_code'] = $this->mngcontrollerModel->delete_mngcontroller($id);
        $resdata['message'] = getErrorMessages("MngController", "delete_mngcontroller", $resdata['error_code']);

        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
        redirect("MngController");
    }

}
