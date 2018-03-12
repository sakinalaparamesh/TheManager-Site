<?php

class Agent_Model extends CI_Model {

    public function agentSave($data) {
        $res_data = 1;
        $agent_check = array(
            "agentname" => $data["agentname"]
        );
        $checkRes = $this->Model->check("tbl_mng_agentmaster", $agent_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            if ($this->Model->insert("tbl_mng_agentmaster", $data)) {
                $res_data = 1;
            } else {
                 $res_data= 2;
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
                $this->db->select("agentid,agentname,company,ic/passportnumber,exclusieveagent,contactno,email,address,comments,profilepic,isactive");
                $this->db->from("tbl_mng_agentmaster");
                //Search
                if($search){
                    $this->db->like(array("CONCAT(agentname,' ',company,' ',contactno)" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('agentname', $dir);
                }else if($order == 2){
                    $this->db->order_by('company', $dir);
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
                $this->db->from("tbl_mng_agentmaster");
                if($search){
                    $this->db->like(array("CONCAT(agentname,' ',company,' ',contactno)" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }

}
