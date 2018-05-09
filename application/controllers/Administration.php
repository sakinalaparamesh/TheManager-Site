<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Administration extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Administration_model');
    }

    public function index() {

        $data['title'] = "Administration";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
 
//        $data['clients_count'] = $this->Administration_model->getClientsCount();
        $UserInfo=$this->session->userdata("UserInfo");
        $user_id=$UserInfo['userid'];
//        $this->Administration_model->submainMenuList(4,$user_id);
//        echo $this->db->last_query();exit;
        $data["main_menu"] = $this->Administration_model->mainMenuList($user_id)->result_array();
        
        foreach($data["main_menu"] as $list){
            $data["sub_menu"][$list['menu_id']]= $this->Administration_model->submainMenuList($list['menu_id'],$user_id)->result_array();
        }
        
        $this->layout->view('administration/administration', $data);
    }

    public function menuForm() {

        $data['title'] = "Menu";
        $data['childtmenu_list'] = $this->Model->check("tbl_mng_menu", array("isactive" => "Y"))->result_array();
        $data['parentmenu_list'] = $this->Model->check("tbl_mng_menu", array("isactive" => "Y", "isparent" => 1))->result_array();
        $data['roles_list'] = $this->Model->check("tbl_mng_rolemaster", array("isactive" => "Y"))->result_array();
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Menu', 'Menu');
        $this->layout->view('administration/menu_form', $data);
    }

    public function saveMenu() {
        $ps_data = $this->input->post("MenuJson");

        $menu_data = array(
            "isparent" => $ps_data["isparent"],
            "parent_id" => $ps_data["parent_id"],
//            "role_id" => $ps_data["controller_id"],
            "menu_name" => $ps_data["menu_name"],
            "display_name" => $ps_data["display_name"],
            "description" => $ps_data["description"],
            "menu_url" => $ps_data["menu_url"],
            "menu_icon" => $ps_data["menu_icon"],
            "menu_order" => $ps_data["menu_order"],
            "menu_color" => $ps_data["menu_color"],
            "isactive" => "Y",
            "createdby" => $this->session->userdata("UserInfo")['userid'],
            "createdon" => date("Y-m-d H:i:s")
        );
        $resdata['error_code'] = $this->Administration_model->saveMenu($menu_data);

        $resdata['message'] = getErrorMessages("Administration", "saveMenu", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function menuList() {
        $data['title'] = "Menu List";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Menu List', 'Menu List');

        $this->layout->view('administration/menu_list', $data);
    }

    public function getAllMenus() {

//        $res = $this->Model->fetch("tbl_mng_departmentmaster");
//        echo json_encode($res->result());

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->Administration_model->getAllMenus($limit, $start, $search, $order, $dir);
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
    
    public function enquiries() {
        $data['title'] = "Enquiries";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'Administration');
        $this->breadcrumbs->push('Enquiries', 'Enquiries');
        $this->layout->view('administration/enquiries', $data);
    }
    
    public function getAllEnquiries() {

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->Administration_model->getAllEnquiries($limit, $start, $search, $order, $dir);
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
