<?php

class mngcontrollerModel extends CI_Model {

    public function mngcontrollerSave($data) {
        $res_data = 1;
        $mng_check = array(
        "controllername" => $data["controllername"]
        );
        $checkRes = $this->Model->check("tbl_mng_controllermaster", $mng_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            if ($this->Model->insert("tbl_mng_controllermaster", $data)) {
                $res_data = 1;
            } else {
                 $res_data= 3;
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

}
