<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration_model extends CI_model {
    
   public function getClientsCount()
    { 
        try{
                $data = array();
                //Total Clients
                $this->db->select("COUNT(*) as total_clients");
                $this->db->where(array('isactive'=>'Y'));
                $query = $this->db->get("tbl_mng_clientmaster");
                $data['total_clients'] = $query->row()->total_clients;
                //Total Branches
                $this->db->select("COUNT(*) as total_branches");
                $this->db->where(array('isactive'=>'Y'));
                $query = $this->db->get("tbl_mng_clientbranchmaster");
                $data['total_branches'] = $query->row()->total_branches;
                //Total Persons
                $this->db->select("COUNT(*) as total_persons");
                $this->db->where(array('isactive'=>'Y'));
                $query = $this->db->get("tbl_clientbranchcontactdetails");
                $data['total_persons'] = $query->row()->total_persons;
                
                return $data;
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }

    
	
}//class
