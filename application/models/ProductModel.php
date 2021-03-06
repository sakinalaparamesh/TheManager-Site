<?php

class ProductModel extends CI_Model {

    public function productSave($data) {
        $res_data = 1;
        $pro_check = array(
            "productname" => $data["productname"]
        );
        $checkRes = $this->Model->check("tbl_mng_productmaster", $pro_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            if ($this->Model->insert("tbl_mng_productmaster", $data)) {
                $productid = $this->db->insert_id();
                $res_data = 1;
            } else {
                $res_data = 2;
            }
        }
        return $res_data;
    }

    public function productUpdate($data, $id = '') {
        $res_data = 1;
        $dep_check = array(
            "productid!=" => $id,
            "productname" => $data["productname"]
        );
        $checkRes = $this->Model->check("tbl_mng_productmaster", $dep_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            $q_data = array(
                "productid" => $id
            );
            if ($this->Model->update("tbl_mng_productmaster", $q_data, $data)) {
                $res_data = 1;
            } else {
                $res_data = 3;
            }
        }
        return $res_data;
    }

    public function getAllProducts($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getProductCountBySearch($search);
            //Filter records Data
            $this->db->select("productid,productname,productcode,product_logo,isactive");
            $this->db->from("tbl_mng_productmaster");
            //Search
            if ($search) {
                $this->db->like(array("CONCAT(productname,' ',productcode)" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 1) {
                $this->db->order_by('productname', $dir);
            } else if ($order == 2) {
                $this->db->order_by('productcode', $dir);
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

    public function getProductCountBySearch($search = '') {
        try {
            //Filtered Records Count
            $this->db->select("*");
            $this->db->from("tbl_mng_productmaster");
            if ($search) {
                $this->db->like(array("CONCAT(productname,' ',productcode)" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getActiveProducts() {
        try {
            $this->db->select("productid,productname,product_logo");
            $this->db->where(array('isactive' => 'Y'));
            $query = $this->db->get("tbl_mng_productmaster");
            return$query->result_array();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

}
