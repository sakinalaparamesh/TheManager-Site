<?php

class RoleModel extends CI_Model {

    public function roleSave() {
        $role = $this->input->post("RoleJson");
        if ($role['chk_tiles'] != "" && $role['chk_tiles'] != NULL) {

            $role_check = array(
                "rolename" => $role['rolename']
            );
            $checkRes = $this->Model->check("tbl_mng_rolemaster", $role_check);
            if ($checkRes->num_rows() > 0) {
                return 2;
            } else {
                $this->db->trans_begin();

                $role_data = array(
                    "rolename" => $role['rolename'],
//                "rolename" => $roleid['id'],
//                "chk_tiles" => $roleid['chk_tiles'],
//                "chk_module" => $roleid['chk_module'],
                    
                    "isactive" => 'Y',
                    "createdby" => $this->session->userdata("UserInfo")['userid'],
                    "createdon" => date("Y-m-d H:i:s")
                );
                $this->Model->insert("tbl_mng_rolemaster", $role_data);
                $role_id = $this->db->insert_id();
                $action_ids = $role['chk_module'];
                foreach ($action_ids as $action) {
                    $privilages_data = array(
                        "role_id" => $role_id,
                        "controller_id" => $action['ControllerId'],
                        "action_id" => $action['ModuleId'],
                        "isgranted" => "Y",
                        "isactive" => 'Y',
                        "createdby" => $this->session->userdata("UserInfo")['userid'],
                        "createdon" => date("Y-m-d H:i:s")
                    );
                    $this->Model->insert("tbl_mng_role_privilages", $privilages_data);
                }
                $menus = $role['chk_tiles'];
                foreach (explode(",", $menus) as $parent) {

                    $map_details = array(
                        "menu_id" => $parent,
                        "role_id" => $role_id,
                        
                        "isactive" => 'Y',
                        "created_by" => $this->session->userdata("UserInfo")['userid'],
                        "created_on" => date("Y-m-d H:i:s")
                    );
                    $this->Model->insert("menu_role_mapping", $map_details);
                }
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return 3;
                } else {
                    $this->db->trans_commit();
                    return 1;
                }
            }
        } else {
            return 4;
        }
    }

    public function updateRole() {
        $role = $this->input->post("RoleJson");
        if ($role['chk_tiles'] != "" && $role['chk_tiles'] != NULL) {
            $role_data = array(
                "rolename" => $role['rolename'],
                
                "isactive" => 'Y',
                "updatedby" => $this->session->userdata("UserInfo")['userid'],
                "updatedon" => date("Y-m-d H:i:s")
            );


            $role_check = array(
                "roleid!=" => $role['id'],
                "rolename" => $role["rolename"]
            );
            $checkRes = $this->Model->check("tbl_mng_rolemaster", $role_check);
            if ($checkRes->num_rows() > 0) {
                return 2;
            } else {
                $q_data = array(
                    "roleid" => $role['id']
                );
                $this->db->trans_begin();
                $this->Model->update("tbl_mng_rolemaster", $q_data, $role_data);
                $role_id = $role['id'];

                $this->db->delete("tbl_mng_role_privilages", array("role_id" => $role_id));

                $action_ids = $role['chk_module'];
                foreach ($action_ids as $action) {
                    $privilages_data = array(
                        "role_id" => $role_id,
                        "controller_id" => $action['ControllerId'],
                        "action_id" => $action['ModuleId'],
                        "isgranted" => "Y",
                        "isactive" => 'Y',
                        "createdby" => $this->session->userdata("UserInfo")['userid'],
                        "createdon" => date("Y-m-d H:i:s")
                    );
                    $this->Model->insert("tbl_mng_role_privilages", $privilages_data);
                }

                $this->db->delete("menu_role_mapping", array("role_id" => $role_id));
                $menus = $role['chk_tiles'];


                foreach (explode(",", $menus) as $parent) {

                    $map_details = array(
                        "menu_id" => $parent,
                        "role_id" => $role_id,
                        
                        "isactive" => 'Y',
                        "created_by" => $this->session->userdata("UserInfo")['userid'],
                        "created_on" => date("Y-m-d H:i:s")
                    );
                    $this->Model->insert("menu_role_mapping", $map_details);
                }


                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return 3;
                } else {
                    $this->db->trans_commit();
                    return 1;
                }
            }
        }else{
            return 4;
        }
    }

    public function getAllRoles($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
//            $is_prv_admin = $this->session->userdata("UserRoleInfo")['is_prv_admin'];
            $data = array();
            $data['totalFiltered'] = $this->getRoleCountBySearch($search);
            //Filter records Data
            $this->db->select("tbl_mng_rolemaster.roleid,tbl_mng_rolemaster.rolename,tbl_mng_rolemaster.roledescription,tbl_mng_rolemaster.isactive");
            $this->db->from("tbl_mng_rolemaster");
//            $this->db->join("tbl_mng_departmentmaster", "tbl_mng_rolemaster.departmentid=tbl_mng_departmentmaster.departmentid", "left");
//            if ($is_prv_admin == 0) {
//            $this->db->where("is_prv_admin", $is_prv_admin);
//            }
            
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
//            $is_prv_admin = $this->session->userdata("UserRoleInfo")['is_prv_admin'];
            //Filtered Records Count
            $this->db->select("*");
            $this->db->from("tbl_mng_rolemaster");
//            if ($is_prv_admin == 0) {
//            $this->db->where("is_prv_admin", $is_prv_admin);
//            }
            
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
            $action_query = "select * from tbl_mng_controlleractionmaster where controllerid='" . $ctrl_list['controllerid'] . "'&& actionid in(select GROUP_CONCAT(action_id SEPARATOR ',') AS action_id from tbl_mng_role_privilages where role_id='" . $roleid . "' "
                    . "group by tbl_mng_role_privilages.action_id)";
            $actions_res = $this->db->query($action_query);
//            $actions_query = $this->Model->check("tbl_mng_controlleractionmaster", array("controllerid" => $ctrl_list['controllerid']));

            $data['actions_info'][$ctrl_list['controllerid']] = $actions_res->result_array();
        }
        return $data;
    }

    public function getRolePrivileges($id) {
        $check = "select GROUP_CONCAT(controller_id SEPARATOR ',') AS controller_id,GROUP_CONCAT(action_id SEPARATOR ',') AS action_id from tbl_mng_role_privilages where role_id='" . $id . "' "
                . "";
        return $this->db->query($check);
    }

    public function getRoleMenuPrivileges($id) {
        $check = "select GROUP_CONCAT(menu_id SEPARATOR ',') AS menu_id from menu_role_mapping where role_id='" . $id . "'";
        return $this->db->query($check);
    }

    public function deleteRole($id = '') {
        $res_data = 1;
        // $res = $this->Model->check("role_privilages", array("role_id" => $id));
        $user_role = $this->Model->check("user_roles", array("role_id" => $id));
//        if (($res->num_rows() == 0) && ($user_role->num_rows() == 0)) {
        if (($user_role->num_rows() == 0)) {
            try {
                $q_data = array(
                    "roleid" => $id
                );
                $this->Model->update("tbl_mng_tbl_mng_rolemaster", $q_data, array("isactive" => 'N'));
                $res_data = 1;
            } catch (Exception $e) {
                $res_data = 3;
            }
        } else {
            $res_data = 2;
        }
        return $res_data;
    }

    public function getControllerActions($controllerid) {
//        $is_prv_admin = $this->session->userdata("UserRoleInfo")['is_prv_admin'];
        $q = "select * from tbl_mng_controlleractionmaster where controllerid='" . $controllerid . "'&&isactive='Y'";
        return $this->db->query($q);
    }

    public function menusList() {
//        $is_prv_admin = $this->session->userdata("UserRoleInfo")['is_prv_admin'];
//        $prv_states = ($is_prv_admin != "") ? $is_prv_admin . ",2" : "2";
        $this->db->select("menu_id,menu_name,display_name,isparent,isactive");
        $this->db->from("tbl_mng_menu");
//        $this->db->where_in("is_prv_admin", $prv_states, false);
        $this->db->where("isparent", 1);
        $this->db->where("isactive", 'Y');
        $data['parents'] = $this->db->get()->result_array();
        foreach ($data['parents'] as $parent) {
            $this->db->select("menu_id,menu_name,display_name,isparent,isactive");
            $this->db->from("tbl_mng_menu");
//            $this->db->where_in("is_prv_admin", $prv_states, false);
            $this->db->where("isparent", 0);
            $this->db->where("isactive", 'Y');
            $this->db->where("parent_id", $parent['menu_id']);
            $data['childs'][$parent['menu_id']] = $this->db->get()->result_array();
        }
        return $data;
    }

    public function verifyAdminRole($role_id) {
        $check1q = "select c.* from company as c join company_subscriptions as cs on cs.company_id=c.id left join usermaster as u on "
                . "c.email=u.eMail left join user_roles ur on (ur.user_id=u.userid && ur.isactive='Y') where "
                . " ur.role_id='" . $role_id . "'";
        $check_cmp = $this->db->query($check1q);
        return $check_cmp;
    }

}
