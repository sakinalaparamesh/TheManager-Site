<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_model {
    
    public function getAllClients($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $searchcols = "CONCAT(clientname,' ',clientcode,' ',CreatedOn)";
                $data['totalFiltered'] = $this->getAllClientsCount($search, $searchcols);
                //Filter records Data
                $this->db->select("clientid,clientname,clientcode,DATE_FORMAT(createdon,'%d-%m-%Y') as CreatedOn,isactive as Status");
                $this->db->from("tbl_mng_clientmaster");
                //Search
                if($search){
                    $this->db->like(array($searchcols => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('clientname', $dir);
                }else if($order == 2){
                    $this->db->order_by('clientcode', $dir);
                }else if($order == 3){
                    $this->db->order_by('CreatedOn', $dir);
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
    public function getAllClientsCount($search='', $searchcols='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tbl_mng_clientmaster");
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


    
	
}//class
