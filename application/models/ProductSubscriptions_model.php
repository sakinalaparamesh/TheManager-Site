<?php

class ProductSubscriptions_model extends CI_Model {

    public function getAllSubscriptions($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $data['totalFiltered'] = $this->getCountBySearch($search);
                //Filter records Data
                $this->db->select("pd.productname,sb.subscriptions_id,sb.subscriptions_code,sb.subscriptions_company_name,sb.isactive");
                $this->db->from("tbl_mng_subscriptions as sb");
                $this->db->join("tbl_mng_productmaster as pd","pd.productid=sb.subscriptions_prd_id");
                //Search
                if($search){
                    $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(sb.subscriptions_code,''),' ',ifnull(sb.subscriptions_company_name,''))" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('sb.subscriptions_company_name', $dir);
                }else if($order == 2){
                    $this->db->order_by('sb.subscriptions_company_name', $dir);
                }
                $this->db->limit($limit, $start);
                $query = $this->db->get();
                
                $data['ResultData'] = $query->result_array();
                
                return $data;
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    public function getCountBySearch($search='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("pd.productname,sb.subscriptions_id,sb.subscriptions_code,sb.subscriptions_company_name,sb.isactive");
                $this->db->from("tbl_mng_subscriptions as sb");
                $this->db->join("tbl_mng_productmaster as pd","pd.productid=sb.subscriptions_prd_id");
                if($search){
                    $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(sb.subscriptions_code,''),' ',ifnull(sb.subscriptions_company_name,''))" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
   

}
