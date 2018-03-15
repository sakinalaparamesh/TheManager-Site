<?php

class controlleractionModel extends CI_Model {

    public function controlleractionSave($data) {
        $res_data = 1;
        $act_check = array(
        "controlleractionname" => $data["controlleractionname"]
        );
        $checkRes = $this->Model->check("tbl_mng_controlleractionmaster", $act_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            if ($this->Model->insert("tbl_mng_controlleractionmaster", $data)) {
                $res_data = 1;
            } else {
                 $res_data= 3;
            }
        }
        return $res_data;
    }
    public function getAllcontrolleractions($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $data['totalFiltered'] = $this->getcontrolleractionCountBySearch($search);
                //Filter records Data
                $this->db->select("tbl_mng_controlleractionmaster.actionid,tbl_mng_controlleractionmaster.controlleractionname,tbl_mng_controlleractionmaster.actioncodename,tbl_mng_controlleractionmaster.actiondisplayname,tbl_mng_controlleractionmaster.isactive,tbl_mng_controllermaster.controllername");
                $this->db->from("tbl_mng_controlleractionmaster");
                 $this->db->join("tbl_mng_controllermaster","tbl_mng_controlleractionmaster.controllerid=tbl_mng_controllermaster.controllerid","left");
                //Search
                if($search){
                    $this->db->like(array("CONCAT(controlleractionname,' ',actioncodename,' ',actiondisplayname)" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('controlleractionname', $dir);
                }
                else if($order == 2){
                    $this->db->order_by('actiondisplayname', $dir);
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
    public function getcontrolleractionCountBySearch($search='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tbl_mng_controlleractionmaster");
                if($search){
                    $this->db->like(array("CONCAT(controlleractionname,' ',actioncodename,' ',actiondisplayname)" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }

}


