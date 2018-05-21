<?php

class ProductSubscriptions_model extends CI_Model {

    public function getAllSubscriptions($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getCountBySearch($search);
            //Filter records Data
            $this->db->select("pd.productname,sb.subscriptions_id,sb.subscriptions_code,sb.subscriptions_company_name,sb.isactive");
            $this->db->from("tbl_mng_subscriptions as sb");
            $this->db->join("tbl_mng_productmaster as pd", "pd.productid=sb.subscriptions_prd_id");
            //Search
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(sb.subscriptions_code,''),' ',ifnull(sb.subscriptions_company_name,''))" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 1) {
                $this->db->order_by('sb.subscriptions_company_name', $dir);
            } else if ($order == 2) {
                $this->db->order_by('sb.subscriptions_company_name', $dir);
            }
            $this->db->limit($limit, $start);
            $query = $this->db->get();

            $data['ResultData'] = $query->result_array();

            return $data;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getCountBySearch($search = '') {
        try {
            //Filtered Records Count
            $this->db->select("pd.productname,sb.subscriptions_id,sb.subscriptions_code,sb.subscriptions_company_name,sb.isactive");
            $this->db->from("tbl_mng_subscriptions as sb");
            $this->db->join("tbl_mng_productmaster as pd", "pd.productid=sb.subscriptions_prd_id");
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(sb.subscriptions_code,''),' ',ifnull(sb.subscriptions_company_name,''))" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getSubscriptionDetails($sub_id) {
        $this->db->select("bl.*,ad.*,pd.productname,sb.subscriptions_id,sb.subscriptions_code,sb.subscriptions_company_name,sb.isactive");
        $this->db->from("tbl_mng_subscriptions as sb");
        $this->db->join("tbl_mng_productmaster as pd", "pd.productid=sb.subscriptions_prd_id","left");
        $this->db->join("tbl_mng_subscription_ad as ad", "ad.scrb_id=sb.subscriptions_id && ad.isactive='Y'","left");
        $this->db->join("tbl_mng_subscription_billing as bl", "bl.bill_subscriptions_id=sb.subscriptions_id","left");
        $this->db->where("sb.subscriptions_id", $sub_id);
        $query = $this->db->get();
        return $query;
    }
    public function saveSubscription($data) {
        $this->Model->update("tbl_mng_subscriptions",array("subscriptions_id"=>$data["subscriptions_id"]),$data);
        return 1;
    }
    public function activateSubscription($data) {
        $this->Model->insert("tbl_mng_subscription_ad",$data);
        return 1;
    }
    public function deactivateSubscription($data) {
        $this->Model->update("tbl_mng_subscription_ad",array("scrb_id"=>$data['scrb_id'],"isactive"=>"Y"),$data);
        return 1;
    }

    public function saveBillConfigDetails($data) {
        $this->Model->insert("tbl_mng_subscription_billing",$data);
        return 1;
    }
}
