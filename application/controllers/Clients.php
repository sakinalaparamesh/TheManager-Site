<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class Clients extends BaseController {

    public function __construct() {
        parent::__construct();
        //is_user_loggedin();
        //$this->layout->setLayout('layout/adminLayout');
        $this->load->model('clients_model');
        $this->load->model('productModel');
        $this->load->model('emailTemplatesModel');        
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
        $data['productscount'] = $this->productModel->getActiveProducts();
        //echo "<pre>"; print_r($data); exit;
        $this->load->view('clients/clientDetails', $data);
    }
    public function getBranchRegFormAajx() {
        $data = array();
        $clientId = $_POST['clientId'];
        $branchId = $_POST['branchId'];
        if ($branchId) {
            $details = $this->clients_model->getBranchDetailsById($branchId);
            if (count($details) > 0) {
                $data['details'] = $details;
            } else {
                $data['details'][] = array('branchid' => 0, 'clientid' => '', 'location' => '', 'address' => '', 'phonenumber' => '', 'faxnumber' => '', 'email' => '', 'isactive' => 'Y');
            }
        } else {
            $data['details'][] = array('branchid' => 0, 'clientid' => $clientId, 'location' => '', 'address' => '', 'phonenumber' => '', 'faxnumber' => '', 'email' => '', 'weburl' => '', 'isactive' => 'Y');
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
            "weburl" => $ps_data["weburl"]
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
            $data['details'][] = array('branchcontactid' => 0, 'clientbranchid' => $clientbranchid, 'title' => '', 'personname' => '', 'designation' => '', 'mobilenumber' => '', 'email' => '', 'comments' => '', 'profilepic' => '', 'isbillingcontact' => '', 'greetings' => '', 'isactive' => 'Y');
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
            "title" => $inputdata["title"],
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
    //Client Product Mapping
    public function getClientProductMappingFormAjax() {
        
        error_reporting(0);
        
        $data = array();
        $data['clientid'] = $_POST['clientId'];
        
        //$data['products'] = $this->productModel->getActiveProducts();
        //$data['clientDetails'] = $this->clients_model->getClientDetailsById($data['clientid']);        
        
        if ($data['clientid']) {
            $details = $this->clients_model->getClientProductsMappingDetails($data['clientid']);
            if (count($details) > 0) {
                $data['details'] = $details;
            } else {
                $data['details'][] = array('id' => 0, 'clientname' => '', 'clientid' => '', 'productid' => '', 'isactive' => 'Y');
            }
        } else {
            $data['details'][] = array('id' => 0, 'clientname' => '', 'clientid' => '', 'productid' => '', 'isactive' => 'Y');
        }
        
       //echo "<pre>"; print_r($data); exit;
        $this->load->view('clients/clientProductMappingForm', $data);
    }
    public function saveClientProductMapping() {

        $data = $_POST;
        //echo json_encode($data); exit;
        //delete products
        $this->db->delete('tbl_client_product_mapping', array('clientid' => $data["clientid"]));
  
        foreach ($data['products'] as $prod){
            $save_data = array(
                //"id" => $data["id"],
                "id" => 0,
                "clientid" => $data["clientid"],
                "productid" => $prod
            );
            $resdata['error_code'] = $this->clients_model->saveClientProductMapping($save_data);
        }
        //echo json_encode($save_data); exit;
        $resdata['message'] = getErrorMessages("Clients", "saveClientProductMapping", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }
    //Send Email
    public function emailFormAjax() {
        $data = array();
        $clientId = $_POST['clientId'];
        $branchId = $_POST['branchId'];
        
        $data['templates_list'] = $this->emailTemplatesModel->getActiveEmailTemplates();
        
        //echo "<pre>"; print_r($data);

        $this->load->view('clients/emailForm', $data);
    }
    public function sendEmailAjax() {

        $data = $_POST;
        //echo json_encode($data); exit;
        
        //print_r($data['allids']);  
        
        
        $template_id = $data['template_id'];
    
        foreach($data['allids'] as $ids){
            //$to_email = $this->clients_model->getEmailId($ids);
            $allids['clientId'] = $ids['clientid'];
            $allids['branchId'] = $ids['branchid'];
            $allids['contactId'] = $ids['contactid'];
            $result  = $this->clients_model->getClientFullDetails($allids);
            
            if(isset($result[0]['Email']) && $result[0]['Email'] != ''){
                $to_emails = array($result[0]['Email']);
                $name = (isset($result[0]['PersonName'])) ? $result[0]['PersonName'] : 'Sir/Madam';
                //Send Email
                $recipients = array('to' => $to_emails);
                $replace_items = array('name'=>$name);
                $this->load->library('emailtemplate');               
                $sent_status = $this->emailtemplate->sendEmail($template_id, $recipients, $replace_items);
                //echo json_encode($sent_status); exit;
                
                $save_data = array(
                    "template_id" => $template_id,
                    "clientid" => $ids["clientid"],
                    "branchid" => $ids["branchid"],
                    "contactid" => $ids["contactid"],
                    "to_email" => $result[0]['Email'],
                    //"from_email" => $from_email,
                    "sent_on" => date('Y-m-d H:i:s'),
                    "sent_by" => $this->session->userdata()['UserInfo']['userid'],
                    "sent_status" => $sent_status,
                );
                $resdata['error_code'] = $this->clients_model->saveEmailSentDetails($save_data);
            }
        }//foreach
        //print_r($final_output);
        
        $resdata['message'] = getErrorMessages("Clients", "SendEmail", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

}
