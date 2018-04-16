<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->helper('global_helper');
        //is_admin_loggedin();
        $this->layout->setLayout('layout/adminLayout');
        $this->load->model('ProductModel');
    }

    public function index() {

        $data['title'] = "Products";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Products', 'product');

        $this->layout->view('products/products', $data);
    }

    public function addOrEdit($id = '') {

        $data['title'] = "Add Product";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Products', 'product');
        $this->breadcrumbs->push('Add Product', 'product/addOrEdit');
        if ($id != '') {
            $q_data = array(
                "productid" => $id
            );
            $data['product_info'] = $this->Model->check("tbl_mng_productmaster", $q_data)->row();
//            print_r($data['product_info']);exit;
        }

        $this->layout->view('products/product_form', $data);
    }

    public function saveProduct() {

        $productid = $this->input->post("ProductId");
        if ($productid == "") {
            $data = array(
                "productname" => $this->input->post("ProductName"),
                "productcode" => $this->input->post("ProductCode"),
                "product_url" => $this->input->post("product_url"),
                "product_id" => $this->input->post("product_id"),
                "productdescription" => $this->input->post("ProductDescription"),
                "isactive" => "Y",
                "createdby" => $this->session->userdata("UserInfo")['userid'],
                "createdon" => date("Y-m-d H:i:s")
            );
            
            if (@$_FILES["productlogo"]["name"] != "" && isset($_FILES["productlogo"]["name"])) {
                $file_data = do_upload("productlogo", 'product', $_FILES["productlogo"]['type']);
                if (isset($file_data['error'])) {
                    $resdata['isError'] = "Y";
                    $resdata['message'] = strip_tags($file_data['error']);
                    echo json_encode($resdata);
                    exit;
                }
                $data['product_logo'] = $file_data['file_name'];
            }
            $total = $this->input->post('files_count');
            $uploads = array();

            for ($i = 0; $i < $total; $i++) {
                $unique_id = uniqid();
                $tmpFilePath = $_FILES['file']['tmp_name'][$i];

                if ($tmpFilePath != "") {
                    $array = explode('.', $_FILES['file']['name'][$i]);
                    $extension = end($array);
                    $file_name = $unique_id . '.' . $extension;
                    $newFilePath = "./manager_gallary/product/" . $file_name;
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                        array_push($uploads, $file_name);
                    }
                }
            }
            $data['product_gallery'] = implode(",", $uploads);
            $resdata['error_code'] = $this->ProductModel->productSave($data);

            $resdata['message'] = getErrorMessages("Product", "saveProduct", $resdata['error_code']);
        } else {
            $data = array(
                "productname" => $this->input->post("ProductName"),
                "productcode" => $this->input->post("ProductCode"),
                "product_url" => $this->input->post("product_url"),
                "product_id" => $this->input->post("product_id"),
                "productdescription" => $this->input->post("ProductDescription"),
                "isactive" => "Y",
                "updatedby" => $this->session->userdata("UserInfo")['userid'],
                "updatedon" => date("Y-m-d H:i:s")
            );
            
            if (@$_FILES["productlogo"]["name"] != "" && isset($_FILES["productlogo"]["name"])) {
                $file_data = do_upload("productlogo", 'product', $_FILES["productlogo"]['type']);
                if (isset($file_data['error'])) {
                    $resdata['isError'] = "Y";
                    $resdata['message'] = strip_tags($file_data['error']);
                    echo json_encode($resdata);
                    exit;
                }
                $data['product_logo'] = $file_data['file_name'];
            }
            $total = $this->input->post('files_count');
            $exfiles_count=$this->input->post('exfiles_count');
            $uploads = array();

            for ($i = 0; $i < $total; $i++) {
                $unique_id = uniqid();
                $tmpFilePath = $_FILES['file']['tmp_name'][$i];

                if ($tmpFilePath != "") {
                    $array = explode('.', $_FILES['file']['name'][$i]);
                    $extension = end($array);
                    $file_name = $unique_id . '.' . $extension;
                    $newFilePath = "./manager_gallary/product/" . $file_name;
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                        array_push($uploads, $file_name);
                    }
                }
            }
            $data['product_gallery'] =$exfiles_count;
            $data['product_gallery'] .= implode(",", $uploads);
            $resdata['error_code'] = $this->ProductModel->productUpdate($data, $productid);

            $resdata['message'] = getErrorMessages("Product", "productSave", $resdata['error_code']);
        }

        $resdata['isError'] = $resdata['error_code'] > 1 ? "Y" : "N";
        echo json_encode($resdata);
    }

    public function products() {

        $data = array();

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Add Product', 'product/addOrEdit');
        $this->layout->view('products/products', $data);
    }

    public function getAllProducts() {

//        $res = $this->Model->fetch("tbl_mng_productmaster");
//        echo json_encode($res->result());

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $this->input->post('order')[0]['column'];
        $dir = $this->input->post('order')[0]['dir'];
        $search = $this->input->post('search')['value'];
        $search = (!empty($search)) ? $search : '';

        $result = $this->ProductModel->getAllProducts($limit, $start, $search, $order, $dir);
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

    public function getProductFullDetailsAjax() {
        $data['title'] = "Product Details";
        $productid = $this->input->post('productid');

        $data['details'] = $this->Model->check("tbl_mng_productmaster", array("productid" => $productid))->row();

        $this->load->view('products/product_details', $data);
    }

}
