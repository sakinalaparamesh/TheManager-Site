<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->helper('global_helper');
        //is_admin_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        $this->load->model('DepartmentModel');
        
    }

    public function index() {
        $data = array();
        $this->layout->view('employees', $data);
    }

    public function addOrEdit() {
        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('DepartmentForm', 'DepartmentForm');
        $this->layout->view('department_form', $data);
    }

    public function saveDepartment() {
        $ps_data = $this->input->post("DepartmentData");
        
        $dep_data = array(
            
            "departmentname" => $ps_data["DepartmentName"],
            "departmentcode" => $ps_data["DepartmentName"],
            "departmentdescription" => $ps_data["DepartmentName"],
            "isactive" => "Y",
            "createdon" => date("Y-m-d H:i:s")
        );
        
       $resdata['error_code']=$this->DepartmentModel->departmentSave($dep_data);
       $resdata['message'] = getErrorMessages("Department","Save",$resdata['error_code']);
       $resdata['isError'] = $resdata['error_code']>1?"Y":"N";
       echo json_encode($resdata);
    }
    public function departments() {
        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('DepartmentForm', 'DepartmentForm');
        $this->layout->view('departments', $data);
    }
    public function getAllDepartments() {

//        $res = $this->Model->fetch("tbl_mng_departmentmaster");
//        echo json_encode($res->result());
        
           $limit  = $this->input->post('length');
            $start  = $this->input->post('start');
            $order  = $this->input->post('order')[0]['column'];
            $dir    = $this->input->post('order')[0]['dir'];
            $search = $this->input->post('search')['value'];
            $search = (!empty($search)) ? $search : '';

            $result = $this->DepartmentModel->getAllClients($limit,$start,$search,$order,$dir);
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
