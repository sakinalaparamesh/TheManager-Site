<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Department extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('DepartmentModel');
    }

    public function index() {
        
        $data['title'] = "Departments";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Departments', 'department');
        
        $this->layout->view('departments/departments', $data);
    }

    public function addOrEdit($id = '') {
        
        $data['title'] = "Add Department";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Departments', 'department');
        $this->breadcrumbs->push('Add Department', 'department/addOrEdit');
        
        if ($id != '') {
            $q_data = array(
                "departmentid" => $id
            );
            $data['department_info'] = $this->Model->check("tbl_mng_departmentmaster", $q_data)->row();
        }
        $this->layout->view('departments/department_form', $data);
    }

    public function saveDepartment() {
        $ps_data = $this->input->post("DepartmentData");


        if ($ps_data["departmentid"] == "") {
            $dep_data = array(
                "departmentname" => $ps_data["DepartmentName"],
                "departmentcode" => $ps_data["DepartmentName"],
                "departmentdescription" => $ps_data["DepartmentName"],
                "isactive" => "Y",
                "createdby" => $this->session->userdata('UserId'),
                "createdon" => date("Y-m-d H:i:s")
            );
            $resdata['error_code'] = $this->DepartmentModel->departmentSave($dep_data);

            $resdata['message'] = getErrorMessages("Department", "saveDepartment", $resdata['error_code']);
        } else {
            $dep_data = array(
                "departmentname" => $ps_data["DepartmentName"],
                "departmentcode" => $ps_data["DepartmentName"],
                "departmentdescription" => $ps_data["DepartmentName"],
                "isactive" => "Y",
                "updatedby" => $this->session->userdata('UserId'),
                "createdon" => date("Y-m-d H:i:s")
            );
            $resdata['error_code'] = $this->DepartmentModel->departmentUpdate($dep_data, $ps_data["departmentid"]);

            $resdata['message'] = getErrorMessages("Department", "saveDepartment", $resdata['error_code']);
        }

        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function getAllDepartments() {

//        $res = $this->Model->fetch("tbl_mng_departmentmaster");
//        echo json_encode($res->result());

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->DepartmentModel->getAllDepartments($limit, $start, $search, $order, $dir);
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

    public function getDepartmentsForDdl() {
        $list = $this->Model->fetch('tbl_mng_departmentmaster')->result_array();
        echo json_encode($list);
    }
    public function getDepartmentFullDetailsAjax() {
        $data['title'] = "Department Details";
        $departmentid = $this->input->post('departmentid');        

        $data['details'] = $this->Model->check("tbl_mng_departmentmaster",array("departmentid"=>$departmentid))->row();

        $this->load->view('departments/department_details', $data);
    }

    public function delete_department($id = '') {
        try {
            $this->DepartmentModel->delete_department($id);
        } catch (Exception $e) {
            $this->session->set_flashdata('flashmsg', 'Unable to delete the department..!');
        }
        redirect("Department");
    }

}
