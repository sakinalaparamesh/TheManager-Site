<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->helper('global_helper');
        //is_admin_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        $this->load->model('Agent_Model');
        
    }

    public function index() {
        
        $data['title'] = "Agents";
        
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Agents','agent');
          
        $this->layout->view('agents/agentsList', $data);
    }

    public function addOrEdit() {
        
        $data['title'] = "Agent Registration";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Agents','agent');
        $this->breadcrumbs->push('Agent Registration', 'agent/addOrEdit');
        
        $this->layout->view('agents/agent_registration', $data);
    }

    public function saveAgent() {
        
        $ps_data = $this->input->post("AgentData");
        
        $agent_data = array(            
            "agentname" => $ps_data["Agentname"],
            "company" => $ps_data["Company"],
            "ic/passportnumber" => $ps_data["Passportnumber"],
            "exclusieveagent" => $ps_data["Exclusieveagent"],
            "contactno" => $ps_data["Contactno"],
            "email" => $ps_data["Email"],
            "address" => $ps_data["Address"],
            "comments" => $ps_data["comments"],
            "profilepic" => $ps_data["profilepic"],
            "isactive" => "Y",
            "createdon" => date("Y-m-d H:i:s")
        );
       $resdata['error_code']=$this->Agent_Model->agentSave($agent_data);
       $resdata['message'] = getErrorMessages("Agent","Save",$resdata['error_code']);
       $resdata['isError'] = $resdata['error_code']>1?"Y":"N";
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
        
           $limit  = $this->input->post('length');
            $start  = $this->input->post('start');
            $order  = $this->input->post('order')[0]['column'];
            $dir    = $this->input->post('order')[0]['dir'];
            $search = $this->input->post('search')['value'];
            $search = (!empty($search)) ? $search : '';

            $result = $this->Agent_Model->getAllAgents($limit,$start,$search,$order,$dir);
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
