<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class ProductSubscriptions extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductSubscriptions_model');
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
        $code= $this->Model->last_inserted_rec("tbl_mng_subscriptions","subscriptions_id")->subscriptions_code;
        $sub_code = ($code!="")?genSubCode($code):"AAAAA00001";
        $this->Model->insert("tbl_mng_subscriptions",array("subscriptions_code"=>$sub_code,"createdon"=>date("Y-m-d H:is"),"createdby"=>$this->session->userdata("UserInfo")['userid']));
        $data['sub_id']= $this->db->insert_id();
        $data['Products'] = $this->Model->check("tbl_mng_productmaster", array("isactive" => 'Y'));
        $this->layout->view('products/add_subscription', $data);
    }

    public function saveSubscription() {
        $data = $this->input->post();
        $data["updatedby"]= $this->session->userdata("UserInfo")['userid'];
        $data["updatedon"]= date("Y-m-d H:is");
        $this->Model->update("tbl_mng_subscriptions",array("subscriptions_id"=>$data["subscriptions_id"]),$data);
        $resdata['error_code']=1;
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

}
