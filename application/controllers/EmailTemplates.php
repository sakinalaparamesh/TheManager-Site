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
            $fpath = APPPATH . 'views/templates/' . $details[0]['message'] . '.php';
            $file = fopen($fpath, "r");
            $content=fread($file, filesize($fpath));
            fclose($file);
            $data['details'][0]['message']=$content;

        } else {
            $data['template_id'] = uniqid();
            $this->Model->insert("tbl_email_templates", array("template_id" => $data['template_id'], "createdby" => $this->session->userdata()['UserInfo']['userid'], "createdon" => date('Y-m-d H:i:s')));
            $data['id'] = $this->db->insert_id();
            
            
            $data['details'][] = array('id' => $data['id'], 'template_id' => $data['template_id'], 'template_title' => '', 'subject' => '', 'message' => '', 'template_type' => '', 'productids' => '', 'isactive' => 'Y');
        }

        $this->layout->view('emailTemplates/addTemplate', $data);
    }

    public function addTemplateAjax() {
        $inputdata = $_POST;
        //$inputdata['message'] = mysqli_real_escape_string($inputdata['CK_message']);
        //$inputdata['message'] = $inputdata['CK_message'];
        //print_r($inputdata); exit;
        $resdata['error_code'] = $this->emailTemplatesModel->saveTemplateDetails($_POST);
        $resdata['message'] = getErrorMessages("EmailTemplates", "Save", $resdata['error_code']);
        $resdata['isError'] = ($resdata['error_code'] > 1) ? "Y" : "N";
        echo json_encode($resdata);
    }

//new method
    public function createTemplate() {

        $resdata['error_code'] = $this->emailTemplatesModel->saveTemplate($_POST);
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

    public function uploadImages() {
        $total = count($_FILES);

        $id = $this->input->post('id');
        $uploads = array();

        for ($i = 0; $i < $total; $i++) {
            $unique_id = uniqid();
            $tmpFilePath = $_FILES['file']['tmp_name'][$i];

            if ($tmpFilePath != "") {
                $array = explode('.', $_FILES['file']['name'][$i]);
                $extension = end($array);
                $file_name = $unique_id . '.' . $extension;
                $newFilePath = "./template_images/" . $file_name;
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $this->Model->insert("tbl_mng_template_images", array("email_template_id" => $id, "template_images_name" => $file_name, "created_on" => date('Y-m-d H:i:s'), "created_by" => $this->session->userdata()['UserInfo']['userid']));
                    array_push($uploads, $file_name);
                }
            }
        }

        echo json_encode($uploads);
    }

    public function deleteImage() {
        $image = $this->input->post('img');
        $file = "./template_images/" . $image;

        if (unlink($file)) {
            $this->Model->delete("tbl_mng_template_images", array('template_images_name' => $image));
            echo true;
        } else {
            echo false;
        }
    }

}
