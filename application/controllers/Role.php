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

    public function addOrEdit($id = '') {

        
        $data['title'] = "Add Role";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Roles', 'role');
        $this->breadcrumbs->push('Add Role', 'role/addOrEdit');
        if ($id != '') {
            $q_data = array(
                "roleid" => $id
            );
            $data['info'] = $this->Model->check("tbl_mng_rolemaster", $q_data)->row();

            $data['role_privileges'] = $this->RoleModel->getRolePrivileges($id)->row();
            $data['role_menuprivileges'] = $this->RoleModel->getRoleMenuPrivileges($id)->row();
        }
        
        $data['menus']= $this->RoleModel->menusList();

        $data['controller_list'] = $this->Model->check('tbl_mng_controllermaster', array("isactive" => "Y"))->result_array();
//        print_r($data['controller_list']);exit;
        foreach ($data['controller_list'] as $list) {
           
            $data['actions'][$list['controllerid']] = $this->RoleModel->getControllerActions($list['controllerid'])->result_array();
        }

        $this->layout->view('role/role_form', $data);
    }

    public function saveRole() {
        $role = $this->input->post("RoleJson");
//        print_r($role);exit;
        $roleid=$role['id'];
        if ($roleid == "") {
            
            $resdata['error_code'] = $this->RoleModel->roleSave();
            $resdata['message'] = getErrorMessages("Role", "saveRole", $resdata['error_code']);
        } else {
//            echo "hi"; exit;
            $resdata['error_code'] = $this->RoleModel->updateRole();
            $resdata['message'] = getErrorMessages("Role", "saveRole", $resdata['error_code']);
        }
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";

        echo json_encode($resdata);
    }

    public function getAllRoles() {
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

    public function getRoleFullDetailsAjax() {

        $roleid = $this->input->post("roleid");
        $data = $this->RoleModel->getRoleFullDetails($roleid);
//        $data['role_check'] = $this->RoleModel->verifyAdminRole($roleid);
        $data['title'] = "Role Details";

        $this->load->view('role/roles_details', $data);
    }

    public function deleteRole() {
        $id = $this->input->post("id");
        $resdata['error_code'] = $this->RoleModel->deleteRole($id);
        $resdata['message'] = getErrorMessages("Role", "deleteRole", $resdata['error_code']);

        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

}
