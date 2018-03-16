<?php

class RoleModel extends CI_Model {

    public function roleSave($data) {
        $res_data = 1;
        $role_check = array(
            "rolename" => $data["rolename"]
        );
        $checkRes = $this->Model->check("tbl_mng_rolemaster", $role_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            if ($this->Model->insert("tbl_mng_rolemaster", $data)) {
                $role_id = $this->db->insert_id();
                $controller_ids = $this->input->post("controller_ids");
                foreach ($controller_ids as $controller_id) {
                    $action_ids = $this->input->post($controller_id);
                    foreach ($action_ids as $action) {
                        $privilages_data = array(
                            "role_id" => $role_id,
                            "controller_id" => $controller_id,
                            "action_id" => $action,
                            "isgranted" => "Y",
                            "isactive" => "Y",
                            "createdby" => $this->session->userdata('UserId'),
                            "createdon" => date("Y-m-d H:i:s")
                        );
                        $this->Model->insert("tbl_mng_role_privilages", $privilages_data);
                    }
                }
                $res_data = 1;
            } else {
                $res_data = 2;
            }
        }
        return $res_data;
    }

    public function getAllRoles($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getRoleCountBySearch($search);
            //Filter records Data
            $this->db->select("tbl_mng_rolemaster.roleid,tbl_mng_rolemaster.rolename,tbl_mng_rolemaster.roledescription,tbl_mng_rolemaster.isactive,tbl_mng_departmentmaster.departmentname");
            $this->db->from("tbl_mng_rolemaster");
            $this->db->join("tbl_mng_departmentmaster", "tbl_mng_rolemaster.departmentid=tbl_mng_departmentmaster.departmentid", "left");
            //Search
            if ($search) {
                $this->db->like(array("tbl_mng_rolemaster.rolename" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 1) {
                $this->db->order_by('tbl_mng_rolemaster.rolename', $dir);
            }
//                }else if($order == 2){
//                    $this->db->order_by('rolecode', $dir);
//                }
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

    public function getRoleCountBySearch($search = '') {
        try {
            //Filtered Records Count
            $this->db->select("*");
            $this->db->from("tbl_mng_rolemaster");
            if ($search) {
                $this->db->like(array("CONCAT(tbl_mng_rolemaster.rolename,' ')" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getRoleFullDetails($roleid) {
        $data['role_info'] = $this->Model->check("tbl_mng_rolemaster", array("roleid" => $roleid))->row_array();
        $controllers_query = "select * from tbl_mng_controllermaster where controllerid in (select GROUP_CONCAT(controller_id SEPARATOR ',') AS controller_id from tbl_mng_role_privilages where role_id='" . $roleid . "' "
                . "group by tbl_mng_role_privilages.controller_id)";
        $data['controllers'] = $this->db->query($controllers_query)->result_array();
        foreach ($data['controllers'] as $ctrl_list) {
            $actions_query = $this->Model->check("tbl_mng_controlleractionmaster", array("controllerid" => $ctrl_list['controllerid']));

            $data['actions_info'][$ctrl_list['controllerid']] = $actions_query->result_array();
        }
        return $data;
    }

}
