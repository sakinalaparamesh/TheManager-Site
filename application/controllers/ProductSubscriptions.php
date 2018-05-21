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
        $code = $this->Model->last_inserted_rec("tbl_mng_subscriptions", "subscriptions_id")->subscriptions_code;
        $sub_code = ($code != "") ? genSubCode($code) : "AAAAA00001";
        $this->Model->insert("tbl_mng_subscriptions", array("subscriptions_code" => $sub_code, "createdon" => date("Y-m-d H:is"), "createdby" => $this->session->userdata("UserInfo")['userid']));
        $data['sub_id'] = $this->db->insert_id();
        $data['Products'] = $this->Model->check("tbl_mng_productmaster", array("isactive" => 'Y'));
        $this->layout->view('products/add_subscription', $data);
    }

    public function saveSubscription() {
        $data = $this->input->post();
        $data["updatedby"] = $this->session->userdata("UserInfo")['userid'];
        $data["updatedon"] = date("Y-m-d H:is");

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
        $data['company'] = $this->ProductSubscriptions_model->getSubscriptionDetails($data['subsrc_id'])->row()->subscriptions_company_name;
        $this->load->view('products/subscription_active', $data);
    }

    public function activateSubscription() {
        $data = $this->input->post();
        unset($data['subscriptions_company_name']);
        $data['scrb_act_or_de_state'] = 1;
        $data['scrb_act_date'] = date("Y-m-d", strtotime($data['scrb_act_date']));
        $data['scrb_act_or_de_paid_on'] = date("Y-m-d", strtotime($data['scrb_act_or_de_paid_on']));
        $data["createdby"] = $this->session->userdata("UserInfo")['userid'];
        $data["createdon"] = date("Y-m-d H:i:s");
        $data["isactive"] = "Y";
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
        $data['details']=$this->ProductSubscriptions_model->getSubscriptionDetails($data['subsrc_id'])->row();
        
        $this->load->view('products/subscription_billing', $data);
    }

    public function saveBillConfigDetails() {
        $s_from= explode(",", $this->input->post("slab_from"));
        $s_to= explode(",", $this->input->post("slab_to"));
        $s_rate= explode(",", $this->input->post("slab_rate"));
        $json_array=array();
        foreach($s_from as $k=>$vals){
            array_push($json_array, array("s_from"=>$s_from[$k],"s_to"=>$s_to[$k],"s_rate"=>$s_rate[$k]));
        }
        
        $info = array(
            "subscriptions_id" => $this->input->post("subscriptions_id"),
//            "measuring_unit" => $this->input->post("measuring_unit"),
            "sub_billing_recurrign_duration" => $this->input->post("recurring_duration"),
            "sub_billing_type" => $this->input->post("billing_type"),
            "sub_billing_amount" => $this->input->post("fixed_bill_rate"),
            "sub_billing_slabs" => json_encode($json_array),
            "sub_billing_effective_from" => date("Y-m-d", strtotime($this->input->post("effective_from"))),
            "sub_billing_currency" => $this->input->post("billing_currency")
        );
        $info["createdby"] = $this->session->userdata("UserInfo")['userid'];
        $info["createdon"] = date("Y-m-d H:i:s");
        $info["isactive"] = "Y";
        $resdata['error_code'] = $this->ProductSubscriptions_model->saveBillConfigDetails($info);
        $resdata['message'] = getErrorMessages("ProductSubscriptions", "saveBillConfigDetails", $resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

}
