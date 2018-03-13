<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Role extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->load->model('RoleModel');
    }

    public function index() {
        
        $data['title'] = "Roles";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Roles', 'role');
        
        $this->layout->view('role/roles', $data);
    }

    public function addOrEdit() {

        
        $data['title'] = "Add Role";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Roles', 'role');
        $this->breadcrumbs->push('Add Role', 'role/addOrEdit');
        
        $data['controller_list'] = $this->Model->check('tbl_mng_controllermaster', array("isactive" => "Y"))->result_array();
        foreach ($data['controller_list'] as $list) {
            $data[$list['controllerid']] = $this->Model->check('tbl_mng_controlleractionmaster', array("controllerid" => $list['controllerid'], "isactive" => "Y"))->result_array();
        }
        $data['department_list'] = $this->Model->check('tbl_mng_departmentmaster', array("isactive" => "Y"))->result_array();

        $this->layout->view('role/role_form', $data);
    }

    public function saveRole() {
        $ps_data = $this->input->post("RoleData");

        $role_data = array(
            "rolename" => $ps_data["RoleName"],
            "roledescription" => $ps_data["RoleDescription"],
            "departmentid" => $ps_data["departmentid"],
            "displayname" => $ps_data["displayname"],
            "isactive" => "Y",
            "createdby" => $this->session->userdata('UserId'),
            "createdon" => date("Y-m-d H:i:s")
        );

        $resdata['error_code'] = $this->RoleModel->roleSave($role_data);
        $resdata['message'] = getErrorMessages("Role", "Save", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";

        echo json_encode($resdata);
    }

    public function getAllRoles() {

//        $res = $this->Model->fetch("tbl_mng_rolemaster");
//        echo json_encode($res->result());

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->RoleModel->getAllRoles($limit, $start, $search, $order, $dir);
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

    public function getRolesbyDepartmentid() {
        $department_id = $this->input->get('department_id');
        $roles = $this->Model->check("tbl_mng_rolemaster", array("departmentid" => $department_id))->result_array();
        echo json_encode($roles);
    }

}
