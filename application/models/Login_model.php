<?php

class Login_model extends CI_model {

    public function CheckUser() {
        $IsValid = 0;
        $data = array();
        try {
            $useremail = $this->input->post("user_email");
            $password = md5($this->input->post("current_password"));
            $res = $this->Model->check("tdl_mng_usermaster", array("user_email" => $useremail, "current_password" => $password, "isactive" => "Y")
            );
            if ($res->num_rows() > 0) {
                $IsValid = 1;
                $this->db->select("userid,user_name,user_mobilenumber,user_profilepic,isemployee,isactive");
                $this->db->from("tdl_mng_usermaster um");
                $this->db->where(array("isactive" => "Y", "user_email" => $useremail));
                $userquery = $this->db->get();
                $data['UserInfo'] = $userquery->row_array();

                /* Need to fetch user roles */
                $this->db->select("urm.role_id,rm.rolename,urm.department_id,dm.departmentname");
                $this->db->from("tdl_mng_user_roles urm");
                $this->db->Join("tbl_mng_rolemaster rm", "rm.roleid = urm.role_id", "inner");
                $this->db->Join("tbl_mng_departmentmaster dm", "dm.departmentid = urm.department_id", "inner");
                $this->db->where("urm.user_id", $res->row()->userid);
                $this->db->where(array("urm.isactive" => "Y"));
                $userrolequery = $this->db->get();
                $data['UserRoleInfo'] = $userrolequery->result_array();
                
//                $data['UserRoleInfo'] = $this->db->last_query();
                $q1 = "SELECT GROUP_CONCAT(role_id SEPARATOR ',') AS role_ids 
FROM tdl_mng_user_roles where user_id='" . $res->row()->userid . "' AND isactive='Y'";
                $role_ids = $this->db->query($q1)->row()->role_ids;
                $this->db->select("rp.role_id,rm.rolename,rp.controller_id,cm.controllername,cam.actioncodename");
                $this->db->from("tbl_mng_role_privilages rp");
                $this->db->Join("tbl_mng_rolemaster rm", "rm.roleid = rp.role_id", "inner");
                $this->db->Join("tbl_mng_controllermaster cm", "cm.controllerid = rp.controller_id", "inner");
                $this->db->Join("tbl_mng_controlleractionmaster cam", "cam.actionid = rp.action_id", "inner");
                $this->db->where_in("rm.roleid", $role_ids, false);
                $this->db->where(array("rp.isactive" => "Y", "isgranted" => "Y"));
                $userrole_privilages = $this->db->get();
                $data['UserRolePrevillages'] = $userrole_privilages->result_array();
//                $data['UserRolePrevillages'] = $this->db->last_query();
            } else {
                $IsValid = 0;
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            $IsValid = 0;
        }
        return $data;
    }

//     public function checkPermission($actionName)
//    {
//        $user = $this->UserModel->getUserFromSession();
//        $this->db->select('user_id, action_id');
//        $this->db->from('permission');
//        $this->db->join('action','action.id=permission.action_id AND acao.nome='.'"'.$actionName.'"');
//        $this->db->where('user_id',$user->id) 
//        $queryPermission = $this->db->get();
//        #Se retornou somento um resultado, significa que o usuário tem acesso.
//        if ($queryPermission->num_rows() == 1) {
//            return true;
//        }
//        return false;
//    }
}

//class
