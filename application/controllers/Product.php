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

    public function addOrEdit() {
        
        $data['title'] = "Add Product";

        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Products', 'product');
        $this->breadcrumbs->push('Add Product', 'product/addOrEdit');
        
        $this->layout->view('products/product_form', $data);
    }

    public function saveProduct() {
        
        $ps_data = $this->input->post("ProductData");
        
        $pro_data = array(
            
            "productname" => $ps_data["ProductName"],
            "productcode" => $ps_data["ProductCode"],
            "productdescription" => $ps_data["ProductDescription"],
            "isactive" => "Y",
            "createdon" => date("Y-m-d H:i:s")
        );
        
       $resdata['error_code']=$this->ProductModel->productSave($pro_data);
       $resdata['message'] = getErrorMessages("Product","Save",$resdata['error_code']);
       $resdata['isError'] = $resdata['error_code']>1?"Y":"N";
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
        
            $limit  = $this->input->post('length');
            $start  = $this->input->post('start');
            $order  = $this->input->post('order')[0]['column'];
            $dir    = $this->input->post('order')[0]['dir'];
            $search = $this->input->post('search')['value'];
            $search = (!empty($search)) ? $search : '';

            $result = $this->ProductModel->getAllProducts($limit,$start,$search,$order,$dir);
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
