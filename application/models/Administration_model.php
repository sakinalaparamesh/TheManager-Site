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
        $dep_check = array(
            "menu_name" => $data["menu_name"]
        );
        $checkRes = $this->Model->check("tbl_mng_menu", $dep_check);
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
            $this->db->select("menu_id,menu_name,display_name,isactive");
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

}

//class
