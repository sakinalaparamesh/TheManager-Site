<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_model {
    
    public function getAllClients($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $searchcols = "CONCAT(PersonName,' ',C.clientname,' ',C.clientcode,' ',C.CreatedOn)";
                $data['totalFiltered'] = $this->getAllClientsCount($search, $searchcols);
                //Filter records Data
                //$this->db->select("C.clientid as clientid,CD.personname as PersonName,C.clientname as ClientName,B.location as BranchName,CD.mobilenumber as Mobile,DATE_FORMAT(C.createdon,'%d-%m-%Y') as CreatedOn,C.isactive as Status");
                $this->db->select("C.clientid as ClientId,CD.personname as PersonName,C.clientname as ClientName,B.location as BranchName,CD.mobilenumber as Mobile, B.branchid as BranchId, CD.branchcontactid as ContactId");
                $this->db->from("tbl_mng_clientmaster C");
                $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                $this->db->join("tbl_clientbranchcontactdetails CD","CD.clientbranchid = B.branchid","LEFT");
                //Search
                if($search){
                    $this->db->like(array($searchcols => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 2){
                    $this->db->order_by('CD.personname', $dir);
                }else if($order == 3){
                    $this->db->order_by('C.clientname', $dir);
                }else if($order == 4){
                    $this->db->order_by('B.location', $dir);
                }else if($order == 5){
                    $this->db->order_by('CD.mobilenumber', $dir);
                }
                $this->db->limit($limit, $start);
                $query = $this->db->get();
                //echo $this->db->last_query(); exit;
                $data['ResultData'] = $query->result_array();
                //echo "<pre>"; print_r($data); exit;
                return $data;
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    public function getClientDetailsById($id)
    { 
        try{
                $this->db->select("clientid,clientname,clientcode,clientdescription,isactive");
                $this->db->from("tbl_mng_clientmaster");
                $this->db->where('clientid', $id);
                $query = $this->db->get();
                return $query->result_array();
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return "ERROR: ".$e->getMessage();
        }
    }
    public function getClientFullDetails($data)
    { 
        try{
                $data['clientId'] = $_POST['clientId'];
                $data['branchId'] = $_POST['branchId'];
                $data['contactId'] = $_POST['contactId'];
                
                if($data['contactId']){
                    $this->db->select("CD.personname as PersonName,CD.designation as Designation,CD.mobilenumber as Mobile,CD.email as Email,C.clientname as ClientName,B.location as BranchName, B.branchid as BranchId, CD.branchcontactid as ContactId");
                    $this->db->from("tbl_mng_clientmaster C");
                    $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                    $this->db->join("tbl_clientbranchcontactdetails CD","CD.clientbranchid = B.branchid","LEFT");
                    $this->db->where(array('CD.branchcontactid'=>$data['contactId']));
                    $query = $this->db->get();
                    return $query->result_array();
                }else if($data['branchId']){
                    $this->db->select("C.clientname as ClientName,B.location as BranchName");
                    $this->db->from("tbl_mng_clientmaster C");
                    $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                    $this->db->where(array('B.branchid'=>$data['branchId']));
                    $query = $this->db->get();
                    return $query->result_array();
                }else{
                    $this->db->select("C.clientname as ClientName");
                    $this->db->from("tbl_mng_clientmaster C");
                    $this->db->where(array('C.clientid'=>$data['clientId']));
                    $query = $this->db->get();
                    return $query->result_array();
                }
                
               
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return "ERROR: ".$e->getMessage();
        }
    }
    public function saveClientDetails($data)
    { 
        try{
                $error_code = 3;
                
                $id = $data['clientid'];
                unset($data['clientid']);
                if($id == 0){
                    $this->db->select("1")->where(array('isactive'=>'Y', 'clientname'=>$data['clientname']));
                }else{
                    $this->db->select("1")->where(array('isactive'=>'Y', 'clientname'=>$data['clientname'], 'clientid !='=>$id));
                }
                $query = $this->db->get("tbl_mng_clientmaster");
                if($query->num_rows() > 0){
                    $error_code = 2;
                }else{                   
                    if($id){
                        $data['updatedby'] = $this->session->userdata('UserId');
                        $data['updatedon'] = date('Y-m-d H:i:s');
                        $this->db->where('clientid', $id);
                        $error_code = ($this->db->update('tbl_mng_clientmaster', $data)) ? 1 : 3;                    
                    }else{
                        $data['createdby'] = $this->session->userdata('UserId');
                        $data['createdon'] = date('Y-m-d H:i:s');
                        $error_code = ($this->db->insert('tbl_mng_clientmaster', $data)) ? 1 : 3; 
                    }
                }
                
        }catch (Exception $e){
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }
    public function deleteClient($id)
    { 
        try{
                $error_code = 3;
                  
                if($id){
                    $data['isactive'] = 'N';
                    $data['updatedby'] = $this->session->userdata('UserId');
                    $data['updatedon'] = date('Y-m-d H:i:s');
                    $this->db->where('clientid', $id);
                    $error_code = ($this->db->update('tbl_mng_clientmaster', $data)) ? 1 : 3;                    
                }
               
                
        }catch (Exception $e){
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }
    public function getAllClientsCount($search='', $searchcols='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tbl_mng_clientmaster C");
                $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                $this->db->join("tbl_clientbranchcontactdetails CD","CD.clientbranchid = B.branchid","LEFT");
                if($search){
                    $this->db->like(array($searchcols => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    //Branches
    public function getBranchDetailsById($id)
    { 
        try{
                $this->db->select("branchid,clientid,location,address,phonenumber,faxnumber,email,isactive");
                $this->db->from("tbl_mng_clientbranchmaster");
                $this->db->where('branchid', $id);
                $query = $this->db->get();
                return $query->result_array();
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return "ERROR: ".$e->getMessage();
        }
    }
    public function saveBranchDetails($data)
    { 
        try{
                $error_code = 3;
                
                $id = $data['branchid'];
                unset($data['branchid']);
                if($id == 0){
                    $this->db->select("1")->where(array('isactive'=>'Y', 'location'=>$data['location']));
                }else{
                    $this->db->select("1")->where(array('isactive'=>'Y', 'location'=>$data['location'], 'branchid !='=>$id));
                }
                $query = $this->db->get("tbl_mng_clientbranchmaster");
                if($query->num_rows() > 0){
                    $error_code = 2;
                }else{                   
                    if($id){
                        $data['updatedby'] = $this->session->userdata('UserId');
                        $data['updatedon'] = date('Y-m-d H:i:s');
                        $this->db->where('branchid', $id);
                        $error_code = ($this->db->update('tbl_mng_clientbranchmaster', $data)) ? 1 : 3;                    
                    }else{
                        $data['createdby'] = $this->session->userdata('UserId');
                        $data['createdon'] = date('Y-m-d H:i:s');
                        $data['isactive'] = 'Y';
                        $error_code = ($this->db->insert('tbl_mng_clientbranchmaster', $data)) ? 1 : 3; 
                    }
                }
                
        }catch (Exception $e){
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }
    //Contact Details
    public function getContactDetailsById($id)
    { 
        try{
                $this->db->select("branchcontactid,clientbranchid,personname,designation,mobilenumber,email,comments,profilepic,isbillingcontact,greetings,isactive");
                $this->db->from("tbl_clientbranchcontactdetails");
                $this->db->where('branchcontactid', $id);
                $query = $this->db->get();
                return $query->result_array();
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return "ERROR: ".$e->getMessage();
        }
    }
    public function saveBranchContactDetails($data)
    { 
        try{
                $error_code = 3;
                
                $id = $data['branchcontactid'];
                unset($data['branchcontactid']);
                if($id == 0){
                    $this->db->select("1")->where(array('isactive'=>'Y', 'personname'=>$data['personname'], 'clientbranchid'=>$data['clientbranchid']));
                }else{
                    $this->db->select("1")->where(array('isactive'=>'Y', 'personname'=>$data['personname'], 'branchcontactid !='=>$id, 'clientbranchid'=>$data['clientbranchid']));
                }
                $query = $this->db->get("tbl_clientbranchcontactdetails");
                if($query->num_rows() > 0){
                    $error_code = 2;
                }else{                   
                    if($id){
                        $data['updatedby'] = $this->session->userdata('UserId');
                        $data['updatedon'] = date('Y-m-d H:i:s');
                        $this->db->where('branchcontactid', $id);
                        $error_code = ($this->db->update('tbl_clientbranchcontactdetails', $data)) ? 1 : 3;                    
                    }else{
                        $data['createdby'] = $this->session->userdata('UserId');
                        $data['createdon'] = date('Y-m-d H:i:s');
                        $data['isactive'] = 'Y';
                        $error_code = ($this->db->insert('tbl_clientbranchcontactdetails', $data)) ? 1 : 3; 
                    }
                }
                
        }catch (Exception $e){
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }
    


    
	
}//class
