<?php

class Agent_Model extends CI_Model {

    public function agentSave($data,$user_roles) {
        $res_data = 1;
        $agent_check = array(
            "user_name" => $data["user_name"]
        );
        $checkRes = $this->Model->check("tdl_mng_usermaster", $agent_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            
            if ($this->Model->insert("tdl_mng_usermaster", $data)) {
                $user_id=$this->db->insert_id();
                $user_roles["user_id"]=$user_id;
                $this->Model->insert("tdl_mng_user_roles", $user_roles);
                $res_data = 1;
            } else {
                 $res_data= 3;
            }
        }
        return $res_data;
    }
    public function getAllAgents($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $data['totalFiltered'] = $this->getAgentCountBySearch($search);
                //Filter records Data
                $this->db->select("userid,user_name,user_email,user_mobilenumber,user_address,user_profilepic,user_countryid,icr_passportnumber,user_agentcompany,date_of_birth,date_of_joining,reporting_to,user_comments,isemployee,isactive,current_password,temparary_password");
                $this->db->from("tdl_mng_usermaster");
                //Search
                if($search){
                    $this->db->like(array("CONCAT(user_name,' ',user_mobilenumber,' ',user_email,user_agentcompany,' ',user_email)" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('user_name', $dir);
                }else if($order == 2){
                    $this->db->order_by('user_agentcompany', $dir);
                }
                $this->db->limit($limit, $start);
                $query = $this->db->get();
                //echo $this->db->last_query(); exit;
                $data['ResultData'] = $query->result_array();
                //echo "<pre>"; print_r($data); exit;
                return $data;
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    public function getAgentCountBySearch($search='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tdl_mng_usermaster");
                if($search){
                    $this->db->like(array("CONCAT(user_name,' ',user_mobilenumber,' ',user_email,user_agentcompany,' ',user_email)" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }

}
