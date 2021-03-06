<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administration_model extends CI_model {

    public function getClientsCount() {
        try {
            $data = array();
            //Total Clients
            $this->db->select("COUNT(*) as total_clients");
            $this->db->where(array('isactive' => 'Y'));
            $query = $this->db->get("tbl_mng_clientmaster");
            $data['total_clients'] = $query->row()->total_clients;
            //Total Branches
            $this->db->select("COUNT(*) as total_branches");
            $this->db->where(array('isactive' => 'Y'));
            $query = $this->db->get("tbl_mng_clientbranchmaster");
            $data['total_branches'] = $query->row()->total_branches;
            //Total Persons
            $this->db->select("COUNT(*) as total_persons");
            $this->db->where(array('isactive' => 'Y'));
            $query = $this->db->get("tbl_clientbranchcontactdetails");
            $data['total_persons'] = $query->row()->total_persons;

            return $data;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function saveMenu($data) {
        $res_data = 1;
        $menu_check = array(
            "menu_name" => $data["menu_name"]
        );
        $checkRes = $this->Model->check("tbl_mng_menu", $menu_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            if ($this->Model->insert("tbl_mng_menu", $data)) {
                $res_data = 1;
            } else {
                $res_data = 3;
            }
        }
        return $res_data;
    }

    public function getAllMenus($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getMenuCountBySearch($search);
            //Filter records Data
            $this->db->select("menu_id,menu_name,display_name,isparent,isactive");
            $this->db->from("tbl_mng_menu");
            //Search
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(menu_name,''),' ',ifnull(display_name,''))" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 2) {
                $this->db->order_by('menu_name', $dir);
            } else if ($order == 3) {
                $this->db->order_by('display_name', $dir);
            }
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            //echo $this->db->last_query(); exit;
            $data['ResultData'] = $query->result_array();
            //echo "<pre>"; print_r($data); exit;
            return $data;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getMenuCountBySearch($search = '') {
        try {
            //Filtered Records Count
            $this->db->select("*");
            $this->db->from("tbl_mng_menu");
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(menu_name,''),' ',ifnull(display_name,''))" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }
/*
    public function mainMenuList($user_id) {

       $query="SELECT m.* FROM tbl_mng_menu AS m , tdl_mng_user_roles as r "
               . "WHERE m.isparent = 1 AND m.isactive = 'Y' AND FIND_IN_SET(r.role_id , m.role_id) AND r.isactive='Y' AND r.user_id='".$user_id."' GROUP BY m.menu_name"; 
        $result = $this->db->query($query);
        return $result;
    }
    public function submainMenuList($menu_id,$user_id) {

        $query="SELECT m.* FROM tbl_mng_menu AS m , tdl_mng_user_roles as r "
               . "WHERE m.isparent = 0 AND m.isactive = 'Y' AND FIND_IN_SET(r.role_id , m.role_id) AND"
                . " parent_id='".$menu_id."' AND r.isactive='Y' AND r.user_id='".$user_id."' GROUP BY m.menu_name"; 
        $result = $this->db->query($query);
        return $result;
    }
    */
    public function mainMenuList($user_id) {

        $query = "SELECT m.* FROM tbl_mng_menu AS m left join menu_role_mapping mrm on m.menu_id=mrm.menu_id"
                . " left join tdl_mng_user_roles as ur on ur.role_id=mrm.role_id left join tbl_mng_rolemaster as r on r.roleid=ur.role_id"
                . " WHERE m.isparent = 1 AND m.isactive = 'Y' AND r.isactive='Y' "
                . "AND ur.user_id='" . $user_id . "' AND ur.isactive='Y' GROUP BY m.menu_name";
        $result = $this->db->query($query);
        return $result;
    }

    public function submainMenuList($menu_id, $user_id) {

        $query = "SELECT m.* FROM tbl_mng_menu AS m left join menu_role_mapping mrm on m.menu_id=mrm.menu_id"
                . " left join tdl_mng_user_roles as ur on ur.role_id=mrm.role_id left join tbl_mng_rolemaster as r on r.roleid=ur.role_id"
                . " WHERE m.isparent = '0' AND m.parent_id='" . $menu_id . "' AND m.isactive = 'Y' AND r.isactive='Y' AND ur.user_id='" . $user_id . "'  AND ur.isactive='Y' GROUP BY m.menu_name";

        $result = $this->db->query($query);
        return $result;
    }
    
    public function getAllEnquiries($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getEnquiriesCountBySearch($search);
            //Filter records Data
            $this->db->select("eq.enquiries_id,eq.enquiries_name,eq.enquiries_company,eq.enquiries_email,eq.enquiries_phone,eq.enquiries_message,pd.productname,eq.created_on");
            $this->db->from("tbl_mng_enquiries as eq");
            $this->db->join("tbl_mng_productmaster as pd","pd.productid=eq.enquiries_product_id","left");
            //Search
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(eq.enquiries_name,''))" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 2) {
                $this->db->order_by('pd.productname', $dir);
            } else if ($order == 3) {
                $this->db->order_by('eq.enquiries_name', $dir);
            }
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            //echo $this->db->last_query(); exit;
            $data['ResultData'] = $query->result_array();
            //echo "<pre>"; print_r($data); exit;
            return $data;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getEnquiriesCountBySearch($search = '') {
        try {
            //Filtered Records Count
            $this->db->select("eq.enquiries_id,eq.enquiries_name,eq.enquiries_company,eq.enquiries_email,eq.enquiries_phone,eq.enquiries_message,pd.productname,eq.created_on");
            $this->db->from("tbl_mng_enquiries as eq");
            $this->db->join("tbl_mng_productmaster as pd","pd.productid=eq.enquiries_product_id","left");
            if ($search) {
                $this->db->like(array("CONCAT(ifnull(pd.productname,''),' ',ifnull(eq.enquiries_name,''))" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

}

//class
