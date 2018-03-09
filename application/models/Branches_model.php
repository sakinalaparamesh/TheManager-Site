<?php

class Branches_model extends CI_Model {

    public function brabchSave($data) {
        $res_data = 1;
        $q_check = array(
            "location" => $data["location"]
        );
        $checkRes = $this->Model->check("tbl_mng_clientbranchmaster", $q_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            if ($this->Model->insert("tbl_mng_clientbranchmaster", $data)) {
                $res_data = 1;
            } else {
                $res_data = 2;
            }
        }
        return $res_data;
    }

    public function getAllBranches($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getBranchCountBySearch($search);
            //Filter records Data
            $this->db->select("clientid,location,address,phonenumber,faxnumber,email");
            $this->db->from("tbl_mng_clientbranchmaster");
            //Search
            if ($search) {
                $this->db->like(array("CONCAT(location,' ',address,' ',phonenumber,' ',faxnumber,' ',email)" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 1) {
                $this->db->order_by('location', $dir);
            } else if ($order == 2) {
                $this->db->order_by('address', $dir);
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

    public function getBranchCountBySearch($search = '') {
        try {
            //Filtered Records Count
            $this->db->select("*");
            $this->db->from("tbl_mng_clientbranchmaster");
            if ($search) {
                $this->db->like(array("CONCAT(location,' ',address,' ',phonenumber,' ',faxnumber,' ',email)" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

}
