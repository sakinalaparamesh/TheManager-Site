<?php

class ProductSubscriptions_model extends CI_Model {

    public function getAllSubscriptions($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getCountBySearch($search);
            //Filter records Data
            $this->db->select("pd.productname,sb.subscriptions_id,sb.subscriptions_code,cm.company_name as subscriptions_company_name,sb.isactive");
            $this->db->from("tbl_mng_subscriptions as sb");
            $this->db->join("tbl_mng_productmaster as pd", "pd.productid=sb.subscriptions_prd_id");
            $this->db->join("tbl_mng_subscriptions_companies as cm", "cm.subscription_id=sb.subscriptions_id");
            //Search
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(sb.subscriptions_code,''),' ',ifnull(cm.company_name,''))" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 1) {
                $this->db->order_by('sb.subscriptions_code', $dir);
            } else if ($order == 2) {
                $this->db->order_by('cm.company_name', $dir);
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
            $this->db->select("pd.productname,sb.subscriptions_id,sb.subscriptions_code,sb.isactive");
            $this->db->from("tbl_mng_subscriptions as sb");
            $this->db->join("tbl_mng_productmaster as pd", "pd.productid=sb.subscriptions_prd_id");
            $this->db->join("tbl_mng_subscriptions_companies as cm", "cm.subscription_id=sb.subscriptions_id");
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(sb.subscriptions_code,''),' ',ifnull(cm.company_name,''))" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getSubscriptionDetails($sub_id) {
        $this->db->select("bl.*,ad.*,pd.productname,sb.subscriptions_id,sb.subscriptions_code,cm.company_name as subscriptions_company_name,sb.isactive");
        $this->db->from("tbl_mng_subscriptions as sb");
        $this->db->join("tbl_mng_productmaster as pd", "pd.productid=sb.subscriptions_prd_id", "left");
        $this->db->join("tbl_mng_subscriptions_companies as cm", "cm.subscription_id=sb.subscriptions_id");
        $this->db->join("tbl_mng_subscription_ad as ad", "ad.scrb_id=sb.subscriptions_id && ad.isactive='Y'", "left");
        $this->db->join("tbl_mng_subscription_billing as bl", "bl.bill_subscriptions_id=sb.subscriptions_id", "left");
        $this->db->where("sb.subscriptions_id", $sub_id);
        $query = $this->db->get();
        return $query;
    }

    public function saveSubscription($data) {
        $check_data = array(
            "company_name" => $data["subscriptions_company_name"],
            "companies_email" => $data["subscriptions_cmp_email"]
        );
        $check_res = $this->Model->check("tbl_mng_subscriptions_companies", $check_data);
        if ($check_res->num_rows() > 0) {
            $this->db->trans_begin();
            $subsciption_data = array(
//            "subscriptions_code" => $data['subscriptions_code'],
                "subscriptions_prd_id" => $data['subscriptions_prd_id'],
                "subscriptions_status" => 1,
                "subscriptions_created_by" => 1,
                "subscriptions_status" => $data['subscriptions_status'],
                "date_of_subscription" => date("Y-m-d H:i:s"),
                "updatedby" => $this->session->userdata("UserInfo")['userid'],
                "updatedon" => date("Y-m-d H:i:s"),
                "filled_status" => 101
            );
            $this->Model->update("tbl_mng_subscriptions", array("subscriptions_id" => $data["subscriptions_id"]), $subsciption_data);
            $tbl_mng_subscriptions_companies = array(
                "subscription_id" => $data["subscriptions_id"],
                "company_name" => $data["subscriptions_company_name"],
                "company_reg_number" => $data["subscriptions_reg_number"],
                "companies_email" => $data["subscriptions_cmp_email"],
                "companies_phone" => $data["subscriptions_cmp_phone"],
                "companies_fax" => $data["subscriptions_cmp_fax"],
                "created_by" => $this->session->userdata("UserInfo")['userid'],
                "created_on" => date("Y-m-d H:i:s"),
                "subscriptions_cmp_type" => $data["subscriptions_cmp_type"],
                "subscriptions_cmp_innertype" => $data["subscriptions_cmp_innertype"],
                "subscriptions_cmp_parent" => $data["subscriptions_cmp_parent"],
                "subscriptions_cmp_address" => $data["subscriptions_cmp_address"],
                "company_title" => $data['company_title']
            );
            $this->Model->insert("tbl_mng_subscriptions_companies", $tbl_mng_subscriptions_companies);
            $company_id = $this->db->insert_id();
            $tbl_mng_subscriptions_poc = array(
                "subscription_id" => $data["subscriptions_id"],
                "companies_id" => $company_id,
                "poc_name" => $data["subscriptions_cmp_pc_pname"],
                "poc_email" => $data["subscriptions_cmp_pc_pemail"],
                "poc_phone" => $data["subscriptions_cmp_pc_pphone"],
                "created_by" => $this->session->userdata("UserInfo")['userid'],
                "created_on" => date("Y-m-d H:i:s")
            );
            $this->Model->insert("tbl_mng_subscriptions_poc", $tbl_mng_subscriptions_poc);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return 2;
            } else {
                $this->db->trans_commit();
                $dc_id = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "DC_ID"))->row()->configuration_name;
                $rems_id = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "REMS_ID"))->row()->configuration_name;
                $dc_key = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "DC_KEY"))->row()->configuration_name;
                $rems_key = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "REMS_KEY"))->row()->configuration_name;
                switch ($data['subscriptions_prd_id']) {
                    case $dc_id: $base_url = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "DC_URL"))->row()->configuration_name;
                        $head_data = array(
                            "DigiCoAuth-Token" => $dc_key,
                            "DigiCoAuthKey" => "TheManagerWebSite",
                            "DigiCentralUserId" => null,
                        );
                        $post_data = array(
                            "ComapnyName" => $data["subscriptions_company_name"],
                            "CompanyRegistrationNo" => $data["subscriptions_reg_number"],
                            "CompanyPhoneNumber" => $data["subscriptions_cmp_phone"],
                            "CompanyEmail" => $data["subscriptions_cmp_email"],
                            "FaxNumber" => $data["subscriptions_cmp_fax"],
                            "ComapnyAddress" => $data["subscriptions_cmp_address"],
                            "IsComapny" => ($data["subscriptions_cmp_type"] == 1) ? "Y" : "N",
                            "ParentComapnyId" => $data["subscriptions_cmp_parent"],
                            "PicName" => $data["subscriptions_cmp_pc_pname"],
                            "PicMobileNumber" => $data["subscriptions_cmp_pc_pphone"],
                            "PicEmail" => $data["subscriptions_cmp_pc_pemail"],
                            "TheManagerSubscriptionId" => $data["subscriptions_id"],
                            "TheManagerUserId" => $this->session->userdata("UserInfo")['userid'],
                            "SubscriptionCreatedBy" => 1,
                            "SourceApp" => "TheManagerWebSite",
                            "LoginUserName" => $this->session->userdata("UserInfo")['user_name']
                        );
                        $base_url .= "api/DGC_CompanySub/SaveCompany";
                        $response = curlExec($base_url, $post_data, $head_data);
                        if ($response["errorCode"] != 0) {
                            $error_data = array(
                                "subscription_id" => $data["subscriptions_id"],
                                "subscriptions_failures_created_on" => date("Y-m-d H:i:s")
                            );
                            $this->Model->insert("tbl_mng_subscriptions_failures", $error_data);
                        }
                        break;
                    case $rems_id:$base_url = $this->Model->check("tbl_mng_configuration_master", array("configuration_key" => "REMS_URL"))->row()->configuration_name;
                        $post_data = array(
                            "subscription_code" => $data["subscriptions_code"],
                            "company_name" => $data["subscriptions_company_name"],
                            "address" => $data["subscriptions_cmp_address"],
                            "registration_number" => $data["subscriptions_reg_number"],
                            "title" => $data["company_title"],
                            "cmp_type" => 1,
                            "cmp_parent_id" => NULL,
                            "subscription_status" => 1,
                            "subscription_central_code" => $data["subscriptions_id"],
                            "subscription_created_by_name" => $this->session->userdata("UserInfo")['user_name'],
                            "cmp_email" => $data["subscriptions_cmp_email"],
                            "cmp_phone" => $data["subscriptions_cmp_phone"],
                            "cmp_fax_number" => $data["subscriptions_cmp_fax"],
                            "spoc_name" => $data["subscriptions_cmp_pc_pname"],
                            "spoc_email" => $data["subscriptions_cmp_pc_pemail"],
                            "spoc_phone" => $data["subscriptions_cmp_pc_pphone"],
                            "created_by" => $this->session->userdata("UserInfo")['userid'],
                            "created_on" => date("Y-m-d H:i:s"),
                            "subscriptions_created_by" => 1,
                            "X-API-KEY" => $rems_key
                        );
                        $response = curlExec($base_url, $post_data);
                        if ($response["errorCode"] != 0) {
                            $error_data = array(
                                "subscription_id" => $data["subscriptions_id"],
                                "subscriptions_failures_created_on" => date("Y-m-d H:i:s")
                            );
                            $this->Model->insert("tbl_mng_subscriptions_failures", $error_data);
                        }
                        break;
                }
                return 1;
            }
        } else {
            return 3;
        }
    }

    public function activateSubscription($data) {
        $this->Model->insert("tbl_mng_subscription_ad", $data);
        return 1;
    }

    public function deactivateSubscription($data) {
        $this->Model->update("tbl_mng_subscription_ad", array("scrb_id" => $data['scrb_id'], "isactive" => "Y"), $data);
        return 1;
    }

    public function saveBillConfigDetails($data) {
        $this->Model->insert("tbl_mng_subscription_billing", $data);
        return 1;
    }

    public function addSubscription() {
        $sql="select * from tbl_mng_subscriptions where subscriptions_created_by='1' order by subscriptions_id desc limit 1";
        $code = $this->db->query($sql)->row()->subscriptions_code;
        $sub_code = ($code != "") ? genSubCode($code) : "AAAAA00001";
        $sub_check = $this->Model->check("tbl_mng_subscriptions", array("subscriptions_code" => $sub_code))->num_rows();
        if ($sub_check == 0) {
            $fill_check = $this->Model->check("tbl_mng_subscriptions", array("filled_status<=" => 100));
            if ($fill_check->num_rows() > 0) {
                $res_data['sub_id'] = $fill_check->row()->subscriptions_id;
                $res_data['sub_code'] = $fill_check->row()->subscriptions_code;
                return $res_data;
            } else {
                $this->Model->insert("tbl_mng_subscriptions", array("subscriptions_code" => $sub_code, "createdon" => date("Y-m-d H:is"), "createdby" => $this->session->userdata("UserInfo")['userid'], "filled_status" => 100));

                $res_data['sub_id'] = $this->db->insert_id();
                $res_data['sub_code'] = $sub_code;
                return $res_data;
            }
        } else {
            return 0;
        }
    }

    public function updateBillConfigDetails($info, $id) {
        $this->Model->update("tbl_mng_subscription_billing", array("sub_billing_id" => $id), $info);
        return 2;
    }

    public function getCompanies() {
        $sql = "select * from tbl_mng_subscriptions_companies where subscriptions_cmp_innertype='1'";
        return $this->db->query($sql);
    }

}
