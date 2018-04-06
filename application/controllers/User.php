<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/BaseController.php';

class User extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->load->model('User_model');
    }

    public function index() {

        $data['title'] = "Users";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('User', 'user');

        $this->layout->view('user/users_list', $data);
    }

    public function addOrEdit() {

        $data['title'] = "User Registration";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('User', 'user');
        $this->breadcrumbs->push('User Registration', 'user/addOrEdit');

        $data['country_list'] = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "COUNTRIES", "isactive" => "Y"))->result_array();

        $this->layout->view('user/user_registration', $data);
    }

    public function saveUser() {

        $user_data = array(
            "user_name" => $_REQUEST["Username"],
            "user_agentcompany" => $_REQUEST["Company"],
            "icr_passportnumber" => $_REQUEST["Passportnumber"],
            "user_mobilenumber" => $_REQUEST["Contactno"],
            "user_email" => $_REQUEST["Email"],
            "user_address" => $_REQUEST["Address"],
            "user_countryid" => $_REQUEST["user_countryid"],
            "user_comments" => $_REQUEST["comments"],
            "isactive" => "Y",
            "createdby" => $this->session->userdata('UserId'),
            "createdon" => date("Y-m-d H:i:s")
        );
        if ($_FILES["profilepic"]["name"] != "") {
            $file_data = do_upload("profilepic", 'user', $_FILES["profilepic"]['type']);
            if (isset($file_data['error'])) {
                $resdata['isError'] = "Y";
                $resdata['message'] = strip_tags($file_data['error']);
                echo json_encode($resdata);
                exit;
            }
            $user_data['user_profilepic'] = $file_data['file_name'];
        } else {
            $user_data['user_profilepic'] = "";
        }

        $user_roles = array(
            "department_id" => 1,
            "role_id" => 1,
            "isactive" => "Y",
            "createdby" => $this->session->userdata('UserId'),
            "createdon" => date("Y-m-d H:i:s")
        );
        $resdata['error_code'] = $this->User_model->userSave($user_data, $user_roles);
        $resdata['message'] = getErrorMessages("User", "saveUser", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function users() {
        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Add-User', 'UserForm');
        $this->layout->view('user/users_list', $data);
    }

    public function getAllUsers() {

//        $res = $this->Model->fetch("tbl_mng_agentmaster");
//        echo json_encode($res->result());

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->User_model->getAllUsers($limit, $start, $search, $order, $dir);
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
