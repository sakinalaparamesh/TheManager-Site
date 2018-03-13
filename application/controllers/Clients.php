<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_user_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        $this->load->model('clients_model');
    }

    public function index() {
        
        $data['title'] = "Clients";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Clients', 'Clients');

        $this->layout->view('clients/clientsList', $data);
    }

    public function getAllClients() {

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->clients_model->getAllClients($limit, $start, $search, $order, $dir);
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

    public function addClient($id = 0) {
        $data['title'] = "Add Client";
        $details = array();
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Clients', 'Clients');
        $this->breadcrumbs->push('Add Client', 'Add Client');

        $details = $this->clients_model->getClientDetailsById($id);
        $data['clientTypes'] = $this->clients_model->getAllClientTypes($id);
        if (count($details) > 0) {
            $data['details'] = $details;
        } else {
            $data['details'][] = array('clientid' => 0, 'client_type' => '', 'clientname' => '', 'clientcode' => '', 'clientdescription' => '', 'is_individual' => 'N', 'isactive' => 'Y');
        }
        //echo "<pre>"; print_r($data); exit;
        $this->layout->view('clients/addClient', $data);
    }

    public function addClientAjax() {
        $inputdata = $_POST;
        //print_r($inputdata); exit;
        $resdata['error_code'] = $this->clients_model->saveClientDetails($_POST);
        $resdata['message'] = getErrorMessages("Clients", "Save", $resdata['error_code']);
        $resdata['isError'] = ($resdata['error_code'] > 1) ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function deleteClient($id) {
        $resdata['error_code'] = $this->clients_model->deleteClient($id);
        $resdata['message'] = getErrorMessages("Clients", "Delete", $resdata['error_code']);

        if ($resdata['error_code'] > 1) {
            $this->session->set_flashdata('flashmsg', '<div class="text-danger">' . $resdata['message'] . '</div>');
        } else {
            $this->session->set_flashdata('flashmsg', '<div class="text-success">Client ' . $resdata['message'] . ' Successfully</div>');
        }
        redirect(base_url() . 'clients');
    }

    public function getClientFullDetailsAjax() {
        $data['title'] = "Client Details";
        $data['clientId'] = $_POST['clientId'];
        $data['branchId'] = $_POST['branchId'];
        $data['contactId'] = $_POST['contactId'];

        $data['details'] = $this->clients_model->getClientFullDetails($data);
        //echo "<pre>"; print_r($data); exit;
        $this->load->view('clients/clientDetails', $data);
    }

    public function getBranchRegFormAajx() {
        $data = array();
        $clientId = $_POST['clientId'];
        $branchId = $_POST['branchId'];
        if ($branchId) {
            $details = $this->clients_model->getBranchDetailsById($id);
            if (count($details) > 0) {
                $data['details'] = $details;
            } else {
                $data['details'][] = array('branchid' => 0, 'clientid' => '', 'location' => '', 'address' => '', 'phonenumber' => '', 'faxnumber' => '', 'email' => '', 'isactive' => 'Y');
            }
        } else {
            $data['details'][] = array('branchid' => 0, 'clientid' => $clientId, 'location' => '', 'address' => '', 'phonenumber' => '', 'faxnumber' => '', 'email' => '', 'isactive' => 'Y');
        }
        $this->load->view('clients/addBranchForm', $data);
    }

    public function saveBranchAjax() {

        $ps_data = $_POST;
        //echo json_encode($ps_data); exit;

        $save_data = array(
            "branchid" => $ps_data["branchid"],
            "clientid" => $ps_data["clientid"],
            "location" => $ps_data["branchLocation"],
            "address" => $ps_data["branchAddress"],
            "phonenumber" => $ps_data["branchPhone"],
            "faxnumber" => $ps_data["branchFax"],
            "email" => $ps_data["branchEmail"],
        );
        $resdata['error_code'] = $this->clients_model->saveBranchDetails($save_data);
        $resdata['message'] = getErrorMessages("Clients", "BranchSave", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    //Contact Details
    public function getClientContactFormAjax() {
        $data = array();
        $branchcontactid = $_POST['branchcontactid'];
        $clientbranchid = $_POST['clientbranchid'];

        if ($branchcontactid) {
            $details = $this->clients_model->getContactDetailsById($branchcontactid);
            if (count($details) > 0) {
                $data['details'] = $details;
            } else {
                $data['details'][] = array('branchcontactid' => 0, 'clientbranchid' => '', 'personname' => '', 'designation' => '', 'mobilenumber' => '', 'email' => '', 'comments' => '', 'profilepic' => '', 'isbillingcontact' => '', 'greetings' => '', 'isactive' => 'Y');
            }
        } else {
            $data['details'][] = array('branchcontactid' => 0, 'clientbranchid' => $clientbranchid, 'personname' => '', 'designation' => '', 'mobilenumber' => '', 'email' => '', 'comments' => '', 'profilepic' => '', 'isbillingcontact' => '', 'greetings' => '', 'isactive' => 'Y');
        }
        $this->load->view('clients/clientContactRegForm', $data);
    }

    public function saveBranchContactAjax() {

        $inputdata = $_POST;
        //echo json_encode($inputdata); exit;
        $ProfilePicPath = (isset($inputdata['profilepic'])) ? $inputdata['profilepic'] : $inputdata['ProfilePicPath1'];
        $greetings = (isset($inputdata['greetings'])) ? $inputdata['greetings'] : $inputdata['greetings1'];
        $isbillingcontact = (isset($inputdata['isbillingcontact'])) ? $inputdata['isbillingcontact'] : $inputdata['isbillingcontact1'];

        $save_data = array(
            "branchcontactid" => $inputdata["branchcontactid"],
            "clientbranchid" => $inputdata["clientbranchid"],
            "personname" => $inputdata["personname"],
            "designation" => $inputdata["designation"],
            //"phonenumber" => $inputdata["phonenumber"],
            "mobilenumber" => $inputdata["mobilenumber"],
            "email" => $inputdata["email"],
            "comments" => $inputdata["comments"],
            "profilepic" => $ProfilePicPath,
            "isbillingcontact" => $isbillingcontact,
            "greetings" => $greetings
        );
        $resdata['error_code'] = $this->clients_model->saveBranchContactDetails($save_data);
        $resdata['message'] = getErrorMessages("Clients", "BranchContactSave", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

//client type
    public function clientTypeForm() {
        
        $data['title'] = "Add Client Type";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Client Types', 'clients/clientTypes');
        $this->breadcrumbs->push('Add Client Type', 'clients/clientTypeForm');
        
        $this->layout->view('clients/client_type_registration', $data);
    }

    public function saveClientTypes() {
        $ps_data = $this->input->post("ClienttypsJson");

        $clienttype_data = array(
            "configuration_name" => $ps_data["configuration_name"],
            "configuration_description" => $ps_data["configuration_description"],
            "configuration_key" => "CLIENTTYPE",
            "isactive" => "Y",
            "createdon" => date("Y-m-d H:i:s")
        );

        $resdata['error_code'] = $this->clients_model->saveClientTypes($clienttype_data);
        $resdata['message'] = getErrorMessages("Clients", "saveClientTypes", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function clientTypes() {
        
        $data['title'] = "Client Types";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Client Types', 'clients/clientTypes');

        $this->layout->view('clients/client_type', $data);
    }

    public function getAllClientTypes() {
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->clients_model->getAllClienttype($limit, $start, $search, $order, $dir);
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
    public function getClientTypeDetailsAjax($param) {
        
    }

}
