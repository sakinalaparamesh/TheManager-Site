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
        $data['title']="Clients";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Clients','Clients');
        
        $this->layout->view('clients/clientsList', $data);
    }
    public function getAllClients()
    {

            $limit  = $this->input->post('length');
            $start  = $this->input->post('start');
            $order  = $this->input->post('order')[0]['column'];
            $dir    = $this->input->post('order')[0]['dir'];
            $search = $this->input->post('search')['value'];
            $search = (!empty($search)) ? $search : '';

            $result = $this->clients_model->getAllClients($limit,$start,$search,$order,$dir);
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
    public function addClient($id = 0)
    {
        $data['title']="Add Client";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Clients','Clients');
        $this->breadcrumbs->push('Add Client','Add Client');
        
        //echo $this->session->userdata('UserId'); exit;

//        if(isset($_POST['formSubmit']))
//        {
//            $inputdata = array();
//            $inputdata = $_POST;
//            unset($inputdata['formSubmit']);
//            //echo "<pre>"; print_r($inputdata); exit;
//            $error = $this->clients_model->saveClientDetails($inputdata);
//            if(!$error){
//                $status = ($inputdata['clientid'] == 0) ? 'Added' : 'Updated';  
//                $this->session->set_flashdata('flashmsg', '<div class="text-success">Client '.$status.' Successfully</div>');
//            }else{
//                $this->session->set_flashdata('flashmsg', '<div class="text-danger">'.$error.'</div>');
//            }
//            redirect(base_url().'clients');
//        }//submit
        
        //$details = $this->clients_model->getClientDetailsById($id);
        $details = array();
        if(count($details)>0){
            $data['details'] = $details;
        }else{
            $data['details'][] = array('clientid'=>0,'clientname'=>'','clientdescription'=>'','clientcode'=>'','isactive'=>1);
        }
        //echo "<pre>"; print_r($data); exit;
        $this->layout->view('clients/addClient', $data);
    }
    public function addClientAjax()
    {
        $inputdata = $_POST;
        //print_r($inputdata); exit;
        $resdata['error_code'] = $this->clients_model->saveClientDetails($_POST);
        $resdata['message'] = getErrorMessages("Clients","Save",$resdata['error_code']);
        $resdata['isError'] = $resdata['error_code'] > 0 ? "Y" : "N";
        echo json_encode($resdata);

    }

}
