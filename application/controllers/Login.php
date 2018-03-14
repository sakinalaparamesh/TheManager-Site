<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/BaseController.php';

class Login extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('layout/adminLayout');	
		$this->load->model('login_model');
//                $this->load->helper('global_helper');
	}
	public function index()
	{       
            $data['title'] = $base_url." Login";
             $this->layout->view('login/login', $data);

            if(isset($_POST['AdminSubmit'])){

                $this->load->library('form_validation');
                $this->form_validation->set_rules('email','Email','required|trim|valid_email');
                $this->form_validation->set_rules('password','Password','required|trim');

                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

                if($this->form_validation->run() == FALSE){

                }else{
                    $inputdata = array('email'=>$this->input->post('email'), 'password'=>$this->input->post('password'));
                    $UserId = $this->login_model->CheckUser($inputdata);
                    if(!$UserId){
                        $this->session->set_flashdata('flashmsg', '<div class="text-danger">Invalid Credentials</div>');
                        redirect(base_url());
                    }else{
                        mysqli_next_result($this->db->conn_id);
                        $UserData = GetUserDetailsById($UserId);
                        mysqli_next_result($this->db->conn_id);
                        $CompanyDetails = GetCompanyDetails();
                        //echo "<pre>"; print_r($UserData); exit;
                        $session_items = array('IsAdminLoggedIn' => TRUE, 'AdminUserId' => $UserData->userid, 'AdminUserName' => $UserData->UserName, 'AdminUserPic' => $UserData->ProfilePicPath, 'AdminUserRoleId' => $UserData->roleId, 'AdminLogo' => $CompanyDetails[0]['logo']);
                        $this->session->set_userdata($session_items);
                        /*if($UserData->roleId == 1){
                            redirect(base_url().$this->config->item('admin_url_path').'companyInfo');
                        }else if($UserData->roleId == 2){
                            redirect(base_url().$this->config->item('admin_url_path').'branchInfo/head');
                        }else if($UserData->roleId == 3){
                            redirect(base_url().$this->config->item('admin_url_path').'branchInfo/manager');
                        }else if($UserData->roleId == 4){
                            redirect(base_url().$this->config->item('admin_url_path').'propertyRequest');
                        }*/
                        redirect(base_url().$this->config->item('base_url').'dashboard');
                    }
                }
            }//submit		
            $this->layout->view('login/login', $data);
		
	}
	public function logout()
	{
     		$array_items = array('IsAdminLoggedIn' => '', 'AdminUserId' => '', 'AdminUserName' => '','AdminUserPic' => '','AdminLogo' => '','AdminUserRoleId' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();	
		redirect(base_url());
	}
	
}//class
