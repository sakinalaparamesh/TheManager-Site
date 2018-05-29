<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_model {
    
    public function getAllClients($limit=10,$start=0,$search='',$order=null,$dir=null,$colum_s='')
    { 
        try{
                $data = array();
                $searchcols = "CONCAT(ifnull(CD.personname, ' '),' ',ifnull(C.clientname, ' '),' ',ifnull(B.location, ' '),' ',ifnull(CD.mobilenumber, ' '))";
                $data['totalFiltered'] = $this->getAllClientsCount($search, $searchcols,$colum_s);
                //Filter records Data
                //$this->db->select("C.clientid as clientid,CD.personname as PersonName,C.clientname as ClientName,B.location as BranchName,CD.mobilenumber as Mobile,DATE_FORMAT(C.createdon,'%d-%m-%Y') as CreatedOn,C.isactive as Status");
                $this->db->select("cm.configuration_name,C.clientid as ClientId,CD.personname as PersonName,C.clientname as ClientName,B.location as BranchName,CD.mobilenumber as Mobile, B.branchid as BranchId, CD.branchcontactid as ContactId");
                $this->db->from("tbl_mng_clientmaster C");
                $this->db->join("tbl_mng_configuration_master cm","cm.configuration_id = C.client_type && cm.configuration_key='CLIENTTYPE'","LEFT");
                $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                $this->db->join("tbl_clientbranchcontactdetails CD","CD.clientbranchid = B.branchid","LEFT");
                $this->db->where(array('C.isactive'=>'Y'));
                if($colum_s!=""){
                    $this->db->where_in('cm.configuration_id',$colum_s,false);
                }
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
//                $data['clientId'] = $_POST['clientId'];
//                $data['branchId'] = $_POST['branchId'];
//                $data['contactId'] = $_POST['contactId'];
                
                if($data['contactId']){
                    $this->db->select("CD.greetings,cm.configuration_name,CD.personname as PersonName,CD.designation as Designation,CD.mobilenumber as Mobile,CD.email as Email,C.clientname as ClientName,B.location as BranchName,B.address as BranchAddress, B.branchid as BranchId, CD.branchcontactid as ContactId");
                    $this->db->from("tbl_mng_clientmaster C");
                    $this->db->join("tbl_mng_configuration_master cm","cm.configuration_id = C.client_type && cm.configuration_key='CLIENTTYPE'","LEFT");
                    $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                    $this->db->join("tbl_clientbranchcontactdetails CD","CD.clientbranchid = B.branchid","LEFT");
                    $this->db->where(array('CD.branchcontactid'=>$data['contactId']));
                    $query = $this->db->get();
                    return $query->result_array();
                }else if($data['branchId']){
                    $this->db->select("cm.configuration_name,C.clientname as ClientName,B.location as BranchName,B.address as BranchAddress,B.email as Email");
                    $this->db->from("tbl_mng_clientmaster C");
                    $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                    $this->db->join("tbl_mng_configuration_master cm","cm.configuration_id = C.client_type && cm.configuration_key='CLIENTTYPE'","LEFT");
                    $this->db->where(array('B.branchid'=>$data['branchId']));
                    $query = $this->db->get();
                    return $query->result_array();
                }else{
                    $this->db->select("C.clientname as ClientName,cm.configuration_name");
                    $this->db->from("tbl_mng_clientmaster C");
                    $this->db->join("tbl_mng_configuration_master cm","cm.configuration_id = C.client_type && cm.configuration_key='CLIENTTYPE'","LEFT");
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
                        $data['updatedby'] = $this->session->userdata()['UserInfo']['userid'];
                        $data['updatedon'] = date('Y-m-d H:i:s');
                        $this->db->where('clientid', $id);
                        $error_code = ($this->db->update('tbl_mng_clientmaster', $data)) ? 1 : 3;                    
                    }else{
                        $data['createdby'] = $this->session->userdata()['UserInfo']['userid'];
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
                    $data['updatedby'] = $this->session->userdata()['UserInfo']['userid'];
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
    public function getAllClientsCount($search='', $searchcols='',$colum_s='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tbl_mng_clientmaster C");
                $this->db->join("tbl_mng_configuration_master cm","cm.configuration_id = C.client_type && cm.configuration_key='CLIENTTYPE'","LEFT");
                $this->db->join("tbl_mng_clientbranchmaster B","B.clientid = C.clientid","LEFT");
                $this->db->join("tbl_clientbranchcontactdetails CD","CD.clientbranchid = B.branchid","LEFT");
                $this->db->where(array('C.isactive'=>'Y'));
                if($colum_s!=""){
                    $this->db->where_in('cm.configuration_id',$colum_s,false);
                }
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
    //Client Types
    public function getAllClientTypes()
    { 
        try{
                //Filtered Records Count
                $this->db->select("configuration_id as clientTypeId,configuration_name as clientType");
                $this->db->where(array('configuration_key'=>'CLIENTTYPE', 'isactive'=>'Y'));
                $query = $this->db->get("tbl_mng_configuration_master");
                return  $query->result_array(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    //Branches
    public function getBranchDetailsById($id)
    { 
        try{
                $this->db->select("branchid,clientid,location,address,phonenumber,faxnumber,email,weburl,isactive");
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
                    $this->db->select("1")->where(array('isactive'=>'Y', 'location'=>$data['location'], 'clientid'=>$data['clientid']));
                }else{
                    $this->db->select("1")->where(array('isactive'=>'Y', 'location'=>$data['location'], 'clientid'=>$data['clientid'], 'branchid !='=>$id));
                }
                $query = $this->db->get("tbl_mng_clientbranchmaster");
                if($query->num_rows() > 0){
                    $error_code = 2;
                }else{                   
                    if($id){
                        $data['updatedby'] = $this->session->userdata()['UserInfo']['userid'];
                        $data['updatedon'] = date('Y-m-d H:i:s');
                        $this->db->where('branchid', $id);
                        $error_code = ($this->db->update('tbl_mng_clientbranchmaster', $data)) ? 1 : 3;                    
                    }else{
                        $data['createdby'] = $this->session->userdata()['UserInfo']['userid'];
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
                $this->db->select("branchcontactid,clientbranchid,title,personname,designation,mobilenumber,email,comments,profilepic,isbillingcontact,greetings,isactive");
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
                        $data['updatedby'] = $this->session->userdata()['UserInfo']['userid'];
                        $data['updatedon'] = date('Y-m-d H:i:s');
                        $this->db->where('branchcontactid', $id);
                        $error_code = ($this->db->update('tbl_clientbranchcontactdetails', $data)) ? 1 : 3;                    
                    }else{
                        $data['createdby'] = $this->session->userdata()['UserInfo']['userid'];
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
    
    public function saveClientTypes($data) {
        $res_data = 1;
        $clienttype_check = array(
            "configuration_name" => $data["configuration_name"]
        );
        $checkRes = $this->Model->check("tbl_mng_configuration_master", $clienttype_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            if ($this->Model->insert("tbl_mng_configuration_master", $data)) {
                $res_data = 1;
            } else {
                 $res_data= 3;
            }
        }
        return $res_data;
    }
    public function getAllClienttype($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $data['totalFiltered'] = $this->getClienttypeCountBySearch($search);
                //Filter records Data
                $this->db->select("configuration_id,configuration_name,configuration_description,isactive");
                $this->db->from("tbl_mng_configuration_master");
                $this->db->where(array('configuration_key'=>'CLIENTTYPE'));
                //Search
                if($search){
                    $this->db->like(array("CONCAT(configuration_name,' ',configuration_description)" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('configuration_name', $dir);
                }
//                else if($order == 2){
//                    $this->db->order_by('departmentcode', $dir);
//                }
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
    public function getClienttypeCountBySearch($search='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tbl_mng_configuration_master");
                if($search){
                    $this->db->like(array("CONCAT(configuration_name,' ',configuration_description)" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    //Client-Products-mapping details 
    public function getClientProductsMappingDetails($clientId)
    { 
        try{
                $this->db->select("PM.id,P.productid,P.productname,PM.clientid,C.clientname,P.product_logo as ProductLogo");
                $this->db->from("tbl_mng_productmaster P");
                $this->db->join("tbl_client_product_mapping PM", "PM.productid = P.productid AND PM.clientid = ".$clientId, "LEFT");
                $this->db->join("tbl_mng_clientmaster C", "C.clientid = ".$clientId, "LEFT");
                $this->db->where('P.isactive', 'Y');
                $this->db->order_by('P.productname', 'asc');
                $query = $this->db->get();
                return $query->result_array();
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return "ERROR: ".$e->getMessage();
        }
    }
    public function saveClientProductMapping($data)
    { 
        try{
                $error_code = 3;
                
                $id = $data['id'];
                unset($data['id']);
               
                    if($id){
                        $data['updatedby'] = $this->session->userdata()['UserInfo']['userid'];
                        $data['updatedon'] = date('Y-m-d H:i:s');
                        $data['createdby'] = $this->session->userdata()['UserInfo']['userid'];
                        $data['createdon'] = date('Y-m-d H:i:s');
                        $data['isactive'] = 'Y';
                        $error_code = ($this->db->insert('tbl_client_product_mapping', $data)) ? 1 : 3;                
                    }else{
                        $data['createdby'] = $this->session->userdata()['UserInfo']['userid'];
                        $data['createdon'] = date('Y-m-d H:i:s');
                        $data['isactive'] = 'Y';
                        $error_code = ($this->db->insert('tbl_client_product_mapping', $data)) ? 1 : 3; 
                    }
        }catch (Exception $e){
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }
    public function saveEmailSentDetails($data)
    { 
        try{
                $error_code = 3;
 
                $error_code = ($this->db->insert('tbl_email_reports', $data)) ? 1 : 3; 
  
                
        }catch (Exception $e){
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }
    

    public function getClients($pid) {
        $sql="select tbl_mng_clientmaster.clientid,tbl_mng_clientmaster.clientname from tbl_mng_clientmaster join tbl_client_product_mapping on"
                . " tbl_mng_clientmaster.clientid=tbl_client_product_mapping.clientid where tbl_client_product_mapping.productid='".$pid."'";
        return $this->db->query($sql);
    }
    
	
}//class
