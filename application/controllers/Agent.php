<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/BaseController.php';

class Agent extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->load->model('Agent_Model');
    }

    public function index() {

        $data['title'] = "Agents";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Agents', 'agent');

        $this->layout->view('agents/agentsList', $data);
    }

    public function addOrEdit() {

        $data['title'] = "Agent Registration";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Agents', 'agent');
        $this->breadcrumbs->push('Agent Registration', 'agent/addOrEdit');
        
        $data['country_list'] = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "COUNTRIES", "isactive" => "Y"))->result_array();

        $this->layout->view('agents/agent_registration', $data);
    }

    public function saveAgent() {

        $agent_data = array(
            "user_name" => $_REQUEST["Agentname"],
            "user_agentcompany" => $_REQUEST["Company"],
            "icr_passportnumber" => $_REQUEST["Passportnumber"],
            "user_mobilenumber" => $_REQUEST["Contactno"],
            "user_email" => $_REQUEST["Email"],
            "user_address" => $_REQUEST["Address"],
            "user_countryid"=>$_REQUEST["user_countryid"],
            "user_comments" => $_REQUEST["comments"],
            "isactive" => "Y",
            "createdby"=> $this->session->userdata('UserId'),
            "createdon" => date("Y-m-d H:i:s")
        );
        if($_FILES["profilepic"]["name"]!=""){
           $file_data=do_upload("profilepic",'agent',$_FILES["profilepic"]['type']);

           $agent_data['user_profilepic']=$file_data['file_name'];
        }else{
            $agent_data['user_profilepic']="";
        }
        
        $user_roles=array(
            "department_id"=>1,
            "role_id"=>1,
            "isactive"=>"Y",
            "createdby"=> $this->session->userdata('UserId'),
            "createdon" => date("Y-m-d H:i:s")
        );
        $resdata['error_code'] = $this->Agent_Model->agentSave($agent_data,$user_roles);
        $resdata['message'] = getErrorMessages("Agent", "saveAgent", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function agents() {
        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Add-Agent', 'AgentForm');
        $this->layout->view('agents/agent', $data);
    }

    public function getAllAgents() {

//        $res = $this->Model->fetch("tbl_mng_agentmaster");
//        echo json_encode($res->result());

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->Agent_Model->getAllAgents($limit, $start, $search, $order, $dir);
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
