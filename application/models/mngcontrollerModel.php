<?php

class mngcontrollerModel extends CI_Model {

    public function mngcontrollerSave($data) {
        $res_data = 1;
        $mng_check = array(
        "controllername" => $data["controllername"]
        );
        $checkRes = $this->Model->check("tbl_mng_controllermaster", $mng_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            if ($this->Model->insert("tbl_mng_controllermaster", $data)) {
                $res_data = 1;
            } else {
                 $res_data= 2;
            }
        }
        return $res_data;
    }
    public function mngcontrollerUpdate($data, $id = '') {
        $res_data = 1;
        $dep_check = array(
            "controllerid!=" => $id,
            "controllername" => $data["controllername"]
        );
        $checkRes = $this->Model->check("tbl_mng_controllermaster", $dep_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            $q_data = array(
                "controllerid" => $id
            );
            if ($this->Model->update("tbl_mng_controllermaster", $q_data, $data)) {
                $res_data = 1;
            } else {
                $res_data = 2;
            }
        }
        return $res_data;
    }
    public function getAllmngcontrollers($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $data['totalFiltered'] = $this->getmngcontrollerCountBySearch($search);
                //Filter records Data
                $this->db->select("controllerid,controllername,displayname,description,isactive");
                $this->db->from("tbl_mng_controllermaster");
                //Search
                if($search){
                    $this->db->like(array("CONCAT(controllername,' ',displayname)" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 1){
                    $this->db->order_by('controllername', $dir);
                }
                else if($order == 2){
                    $this->db->order_by('displayname', $dir);
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
    public function getmngcontrollerCountBySearch($search='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tbl_mng_controllermaster");
                if($search){
                    $this->db->like(array("CONCAT(controllername,' ',displayname)" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    public function delete_mngcontroller($id) {
        $res_data = 1;
        $roles = $this->Model->check("tbl_mng_controllermaster", array("controllerid" => $id));
        if ($roles->num_rows() == 0) {
            try{
            $q_data = array(
                "controllerid" => $id
            );
            $this->Model->delete("tbl_mng_controllermaster", $q_data);
            $res_data = 1;
            }catch(Exception $e){
                $res_data = 3;
            }
            
        }else{
            $res_data = 2;
            
        }
        return $res_data;
    }

}
