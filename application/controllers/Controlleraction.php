<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/BaseController.php';

class Controlleraction extends BaseController {

    public function __construct() {
        parent::__construct();
        //$this->load->helper('global_helper');
        //is_admin_loggedin();
        //$this->layout->setLayout('layout/adminLayout');
        $this->load->model('controlleractionModel');
        
    }

    public function index() {
        
        $data['title'] = "Controller Actions";
        
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administration', 'administration');       
        $this->breadcrumbs->push('Controller Actions', 'Controlleraction');
        
        $this->layout->view('controlleraction/controlleractions', $data);
    }

    public function addoredit($id = '') {
             
        $data["title"] = "Add or Edit Controller Actions";
        
        $data['controllerlist'] = $this->Model->fetch('tbl_mng_controllermaster')->result_array();
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Controller Actions', 'Controlleraction/controlleractionslist');
        $this->breadcrumbs->push('Add Controller Action', 'addoredit'); 
        
        if ($id != '') {
            $q_data = array(
                "actionid" => $id
            );
            $data['controlleraction_info'] = $this->Model->check("tbl_mng_controlleractionmaster", $q_data)->row();
        }
        //print_r($q_data);exit;
        $this->layout->view('controlleraction/controlleraction_form', $data);
    }

    public function savecontrolleraction() {
        $ps_data = $this->input->post("ControlleractionData");
        
        $act_data = array(  
             "actionid" => $ps_data["actionid"],
            "controllerid" => $ps_data["controllerid"],
            "controlleractionname" => $ps_data["controlleractionname"],
            "actioncodename" => $ps_data["actioncodename"],
            "actiondisplayname" => $ps_data["actiondisplayname"],
            "isactive" => "1",
            "createdon" => date("Y-m-d H:i:s")
        );      
       $resdata['error_code']=$this->controlleractionModel->controlleractionSave($act_data);
       $resdata['message'] = getErrorMessages("Controlleraction","savecontrolleraction",$resdata['error_code']);
       $resdata['isError'] = $resdata['error_code']>1?"Y":"N";
       echo json_encode($resdata);
    }
    public function controlleractionslist() {
        
        $data['title'] = "Controller Actions";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('controlleractionForm', 'Controlleraction/addoredit');
        $this->breadcrumbs->push('controlleraction', 'controlleraction');
        $this->layout->view('controlleraction/controlleractions', $data);
    }
    public function getAllcontrolleraction() {

//        $res = $this->Model->fetch("controlleractinmaster");
//        echo json_encode($res->result());
        
            $limit  = $this->input->post('length');
            $start  = $this->input->post('start');
            $order  = $this->input->post('order')[0]['column'];
            $dir    = $this->input->post('order')[0]['dir'];
            $search = $this->input->post('search')['value'];
            $search = (!empty($search)) ? $search : '';

            $result = $this->controlleractionModel->getAllcontrolleractions($limit,$start,$search,$order,$dir);
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
    public function getControlleractionFullDetailsAjax() {
        $data['title'] = "Controlleraction Details";
        $actionid = $this->input->post('actionid');        

        $data['details'] = $this->Model->check("tbl_mng_controlleractionmaster",array("actionid"=>$actionid))->row();

        $this->load->view('controlleraction/controlleraction_details', $data);
    }
    public function delete_controlleraction() {
        $id = $this->input->post("actionid");
        $resdata['error_code'] = $this->controlleractionModel->delete_controlleraction($id);
       // print_r($resdata);exit;
        $resdata['message'] = getErrorMessages("Controlleraction", "delete_controlleraction", $resdata['error_code']);

        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

}
