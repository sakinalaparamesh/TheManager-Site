<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class ProductSubscriptions extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductSubscriptions_model');
        error_reporting(0);
    }

    public function index() {
        $data['title'] = "Product Subscriptions";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'Administration');
        $this->breadcrumbs->push('Product Subscriptions', 'Product Subscriptions');
        $this->layout->view('products/subscription_lists', $data);
    }

    public function getAllSubscriptions() {
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->ProductSubscriptions_model->getAllSubscriptions($limit, $start, $search, $order, $dir);
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

    public function addSubscription() {
        $data['title'] = "Add Subscription";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'Administration');
        $this->breadcrumbs->push('Add Subscription', 'Add Subscription');

        $res_data = $this->ProductSubscriptions_model->addSubscription();
        $data['sub_id'] = $res_data['sub_id'];
        $data['sub_code'] = $res_data['sub_code'];
        $data['dc_id'] = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "DC_ID"))->row();
        if ($data['sub_id'] != 0) {
            $data['Products'] = $this->Model->check("tbl_mng_productmaster", array("isactive" => 'Y'));
            $this->layout->view('products/add_subscription', $data);
        } else {

            $this->session->set_flashdata("message", getErrorMessages("ProductSubscriptions", "addSubscription", 0));
            redirect("ProductSubscriptions");
        }
    }

    public function saveSubscription() {
        $data = $this->input->post();
//        $data["updatedby"] = $this->session->userdata("UserInfo")['userid'];
//        $data["updatedon"] = date("Y-m-d H:is");
//        $data["filled_status"] = 101;
        $resdata['error_code'] = $this->ProductSubscriptions_model->saveSubscription($data);
        $resdata['message'] = getErrorMessages("ProductSubscriptions", "saveSubscription", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function billForm() {
        $data['title'] = "Administration";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->layout->view('products/bill_config_form', $data);
    }

    public function detailsView() {
        $data['title'] = "Detail View";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $subsrc_id = $this->input->post('subsrc_id');
        $data['sub_info'] = $this->Model->check("tbl_mng_subscriptions", array("subscriptions_id" => $subsrc_id))->row();
        $this->load->view('products/subscription_details', $data);
    }

    public function activeSubscription() {
        $data['subsrc_id'] = $this->input->post('subsrc_id');
        $data['company'] = $this->ProductSubscriptions_model->getSubscriptionDetails($data['subsrc_id'])->row();
        $this->load->view('products/subscription_active', $data);
    }

    public function activateSubscription() {
        $data = $this->input->post();
        unset($data['subscriptions_company_name']);
//        $data['scrb_act_or_de_state'] = 1;

        $resdata['error_code'] = $this->ProductSubscriptions_model->activateSubscription($data);
        $resdata['message'] = getErrorMessages("ProductSubscriptions", "activateSubscription", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function deactiveSubscription() {
        $data['subsrc_id'] = $this->input->post('subsrc_id');

        $this->load->view('products/subscription_deactive', $data);
    }

    public function deactivateSubscription() {
        $data = $this->input->post();
        $data['scrb_act_or_de_state'] = 2;
        $data['scrb_deact_date'] = date("Y-m-d", strtotime($data['scrb_deact_date']));
        $data["updatedby"] = $this->session->userdata("UserInfo")['userid'];
        $data["updatedon"] = date("Y-m-d H:i:s");

        $resdata['error_code'] = $this->ProductSubscriptions_model->deactivateSubscription($data);
        $resdata['message'] = getErrorMessages("ProductSubscriptions", "deactivateSubscription", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function billing() {
        $data['title'] = "Detail View";
        $data['subsrc_id'] = $this->input->post('subsrc_id');
        $data['details'] = $this->ProductSubscriptions_model->getSubscriptionDetails($data['subsrc_id'])->row();

        $this->load->view('products/subscription_billing', $data);
    }

    public function saveBillConfigDetails() {
        $billing_configid = $this->input->post("billing_configid");

        $s_from = explode(",", $this->input->post("slab_from"));
        $s_to = explode(",", $this->input->post("slab_to"));
        $s_rate = explode(",", $this->input->post("slab_rate"));
        $json_array = array();
        foreach ($s_from as $k => $vals) {
            array_push($json_array, array("s_from" => $s_from[$k], "s_to" => $s_to[$k], "s_rate" => $s_rate[$k]));
        }

        $info = array(
            "bill_subscriptions_id" => $this->input->post("subscriptions_id"),
//            "measuring_unit" => $this->input->post("measuring_unit"),
            "sub_billing_recurrign_duration" => $this->input->post("recurring_duration"),
            "sub_billing_type" => $this->input->post("billing_type"),
            "sub_billing_amount" => $this->input->post("fixed_bill_rate"),
            "sub_billing_slabs" => json_encode($json_array),
            "sub_billing_effective_from" => date("Y-m-d", strtotime($this->input->post("effective_from"))),
            "sub_billing_currency" => $this->input->post("billing_currency")
        );

        if ($billing_configid == "") {
            $info["createdby"] = $this->session->userdata("UserInfo")['userid'];
            $info["createdon"] = date("Y-m-d H:i:s");
            $info["isactive"] = "Y";
            $resdata['error_code'] = $this->ProductSubscriptions_model->saveBillConfigDetails($info);
        } else {
            $info["updatedby"] = $this->session->userdata("UserInfo")['userid'];
            $info["updatedon"] = date("Y-m-d H:i:s");
            $info["isactive"] = "Y";
            $resdata['error_code'] = $this->ProductSubscriptions_model->updateBillConfigDetails($info, $billing_configid);
        }
        $resdata['message'] = getErrorMessages("ProductSubscriptions", "saveBillConfigDetails", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 2 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function getCompanies() {
        $result = $this->ProductSubscriptions_model->getCompanies()->result();
        echo json_encode($result);
    }

    public function pocDetails() {
        $data['title'] = "POC Detail";
        $data['subsrc_id'] = $this->input->post('subsrc_id');
        $data['details'] = $this->ProductSubscriptions_model->getSubscriptionDetails($data['subsrc_id'])->row();

        $this->load->view('products/subscription_poc', $data);
    }

    public function pocSubscriptionUpdate() {
        $data = $this->input->post();
        $this->Model->update("tbl_mng_subscriptions_poc", array("poc_id" => $data["poc_id"]), $data);
//-------------start third party---------------------->
        $dc_id = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "DC_ID"))->row()->configuration_name;
        $rems_id = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "REMS_ID"))->row()->configuration_name;
//        $dc_key = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "DC_KEY"))->row()->configuration_name;
        $rems_key = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "REMS_KEY"))->row()->configuration_name;
        $subscriptions_details = $this->Model->check("tbl_mng_subscriptions", array("subscriptions_id" => $data["subscription_id"]))->row();
        $company_id = $this->Model->check("tbl_mng_subscriptions_companies", array("subscription_id" => $data["subscription_id"]))->row()->companies_id;
        switch ($subscriptions_details->subscriptions_prd_id) {
            case $dc_id:
                break;
            case $rems_id:
                $base_url = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "REMS_URL"))->row()->configuration_name;
                $head_data = array(
                    'X-API-KEY:' . $rems_key
                );
                $post_data = array(
                    "subscription_id" => $data["subscription_id"],
                    "company_id" => $company_id,
                    "spoc_name" => $data["poc_name"],
                    "spoc_email" => $data["poc_email"],
                    "spoc_phone" => $data["poc_phone"],
                    "created_by" => $this->session->userdata("UserInfo")['userid'],
                    "created_on" => date("Y-m-d H:i:s")
                );

                $base_url .= "company/savePocDetails";
                $response = curlExec($base_url, $post_data, $head_data);
                $filter = json_decode($response, TRUE);

                if ($filter["error_code"] == 0) {
                    
                } else {
                    
                }

                break;
        }
//-------------end third party---------------------->
        $resdata['error_code'] = 1;
        $resdata['message'] = getErrorMessages("ProductSubscriptions", "pocSubscriptionUpdate", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function billingAddressDetails() {
        $data['title'] = "Billing Address Detail";
        $data['subsrc_id'] = $this->input->post('subsrc_id');
        $data['details'] = $this->Model->check("tbl_mng_subscription_billing_address", array("subscription_id" => $data['subsrc_id'], "isactive" => "Y"))->row();
        $data["currency_codes"] = $this->Model->check("tbl_currency_codes", array("isactive" => "Y"))->result();
        $this->load->view('products/billing_addr_details', $data);
    }

    public function billingConfigSubscriptionUpdate() {
        $data = $this->input->post();
        $resdata['error_code'] = $this->ProductSubscriptions_model->billingConfigSubscriptionUpdate($data);
        $resdata['message'] = getErrorMessages("ProductSubscriptions", "billingConfigSubscriptionUpdate", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

}
