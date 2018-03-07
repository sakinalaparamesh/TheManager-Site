<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_model {
    
    public function getAllClients($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $data['totalFiltered'] = $this->getAllClientsCount($search);
                //Filter records Data
                $this->db->select("id as CompanyId,company_name as CompanyName,email,phone,description,registration_number,logo,is_active as Status,DATE_FORMAT(created_on,'%d-%m-%Y') as CreatedOn");
                $this->db->from("company");
                //Search
                if($search){
                    $this->db->like(array("CONCAT(company_name,' ',email,' ',phone,' ',description,' ',registration_number)" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('company_name', $dir);
                }else if($order == 2){
                    $this->db->order_by('email', $dir);
                }else if($order == 3){
                    $this->db->order_by('phone', $dir);
                }else if($order == 4){
                    $this->db->order_by('description', $dir);
                }else if($order == 5){
                    $this->db->order_by('registration_number', $dir);
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
    public function getClientDetailsById($CompanyId)
    { 
        try{
                $this->db->select("id as CompanyId,company_name,email,phone,fax_number,description,registration_number,logo,is_active as Status,DATE_FORMAT(created_on,'%d-%m-%Y') as CreatedOn");
                $this->db->from("tbl_mng_clientmaster");
                $this->db->where('id', $CompanyId);
                $query = $this->db->get();
                return $query->result_array();
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return "ERROR: ".$e->getMessage();
        }
    }
    public function saveClientDetails($data)
    { 
        try{
                $id = $data['clientid'];
                unset($inputdata['clientid']);
                
                if($data['clientid']){
                    $data['updatedby'] = $this->session->userdata('UserId');
                    $data['updatedon'] = date('Y-m-d H:i:s');
                    $this->db->where('clientid', $id);
                    return $this->db->update('tbl_mng_clientmaster', $data);
                }else{
                    $data['createdby'] = $this->session->userdata('UserId');
                    $data['createdon'] = date('Y-m-d H:i:s');
                    return $this->db->insert('tbl_mng_clientmaster', $data);
                }
                
        }catch (Exception $e){
            log_message('error', $e->getMessage());
            return "ERROR: ".$e->getMessage();
        }
    }
    public function getAllClientsCount($search='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("company");
                if($search){
                    $this->db->like(array("CONCAT(company_name,' ',email,' ',phone,' ',description,' ',registration_number)" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }


    
	
}//class
