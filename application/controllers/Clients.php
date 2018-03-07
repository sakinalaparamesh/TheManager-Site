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
    public function addClient($id = 0)
    {
        $data['title']="Add Client";
        //breadcrumbs
        $this->breadcrumbs->push('Administration', 'administration');
        $this->breadcrumbs->push('Clients','Clients');
        $this->breadcrumbs->push('Add Client','Add Client');
        
        //echo $this->session->userdata('UserId'); exit;

        if(isset($_POST['formSubmit']))
        {
            $inputdata = array();
            $inputdata = $_POST;
            unset($inputdata['formSubmit']);
            //echo "<pre>"; print_r($inputdata); exit;
            $error = $this->clients_model->saveClientDetails($inputdata);
            if(!$error){
                $status = ($inputdata['clientid'] == 0) ? 'Added' : 'Updated';  
                $this->session->set_flashdata('flashmsg', '<div class="text-success">Client '.$status.' Successfully</div>');
            }else{
                $this->session->set_flashdata('flashmsg', '<div class="text-danger">'.$error.'</div>');
            }
            redirect(base_url().'clients');
        }//submit
        
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

}
