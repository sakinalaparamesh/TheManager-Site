<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/BaseController.php';

class EmailTemplates extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('emailTemplatesModel');
        $this->load->model('productModel');
        
    }

    public function index() {
        
        $data['title'] = "Email Templates";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Email Templates', 'e-templates');

        $this->layout->view('emailTemplates/emailTemplatesList', $data);
    }

    public function getAllTemplates() {

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->emailTemplatesModel->getAllTemplates($limit, $start, $search, $order, $dir);
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

    public function addTemplate($id = 0) {
        
        $data['title'] = "Add Template";
        $details = array();
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Email Templates', 'e-templates');
        $this->breadcrumbs->push('Add Template', 'Add Template');

        $details = $this->emailTemplatesModel->getTemplateDetailsById($id);
        $data['products'] = $this->productModel->getActiveProducts($id);
        if (count($details) > 0) {
            $data['details'] = $details;
        } else {
            $data['details'][] = array('id' => 0, 'template_id' => '', 'template_title' => '', 'subject' => '', 'message' => '', 'template_type' => '', 'productids' => '', 'isactive' => 'Y');
        }
        //echo "<pre>"; print_r($data); exit;
        $this->layout->view('emailTemplates/addTemplate', $data);
    }

    public function addTemplateAjax() {
        $inputdata = $_POST;
        //print_r($inputdata); exit;
        $resdata['error_code'] = $this->emailTemplatesModel->saveTemplateDetails($_POST);
        $resdata['message'] = getErrorMessages("EmailTemplates", "Save", $resdata['error_code']);
        $resdata['isError'] = ($resdata['error_code'] > 1) ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function deleteTemplate($id) {
        $resdata['error_code'] = $this->emailTemplatesModel->deleteTemplate($id);
        $resdata['message'] = getErrorMessages("EmailTemplates", "Delete", $resdata['error_code']);

        if ($resdata['error_code'] > 1) {
            $this->session->set_flashdata('flashmsg', '<div class="text-danger">' . $resdata['message'] . '</div>');
        } else {
            $this->session->set_flashdata('flashmsg', '<div class="text-success">Template ' . $resdata['message'] . ' Successfully</div>');
        }
        redirect(base_url() . 'e-templates');
    }

    

}
