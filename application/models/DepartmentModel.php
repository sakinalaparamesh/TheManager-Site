<?php

class DepartmentModel extends CI_Model {

    public function departmentSave($data) {
        $res_data = 1;
        $dep_check = array(
            "departmentname" => $data["departmentname"]
        );
        $checkRes = $this->Model->check("tbl_mng_departmentmaster", $dep_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            if ($this->Model->insert("tbl_mng_departmentmaster", $data)) {
                $res_data = 1;
            } else {
                 $res_data= 3;
            }
        }
        return $res_data;
    }
    public function departmentUpdate($data,$id='') {
        $res_data = 1;
        $dep_check = array(
            "departmentid!="=>$id,
            "departmentname" => $data["departmentname"]
        );
        $checkRes = $this->Model->check("tbl_mng_departmentmaster", $dep_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            $q_data=array(
                "departmentid"=>$id
            );
            if ($this->Model->update("tbl_mng_departmentmaster",$q_data,$data)) {
                $res_data = 1;
            } else {
                 $res_data= 2;
            }
        }
        return $res_data;
    }
    public function getAllDepartments($limit=10,$start=0,$search='',$order=null,$dir=null)
    { 
        try{
                $data = array();
                $data['totalFiltered'] = $this->getDepartmentCountBySearch($search);
                //Filter records Data
                $this->db->select("departmentid,departmentname,departmentcode,isactive");
                $this->db->from("tbl_mng_departmentmaster");
                //Search
                if($search){
                    $this->db->like(array("CONCAT(departmentname,' ',departmentcode)" => $search));
                }
                //OrderBy
                if($dir == null) $dir = 'DESC';
                if($order == 2){
                    $this->db->order_by('departmentname', $dir);
                }else if($order == 3){
                    $this->db->order_by('departmentcode', $dir);
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
    public function getDepartmentCountBySearch($search='')
    { 
        try{
                //Filtered Records Count
                $this->db->select("*");
                $this->db->from("tbl_mng_departmentmaster");
                if($search){
                    $this->db->like(array("CONCAT(departmentname,' ',departmentcode)" => $search));
                }
                $query = $this->db->get();
                return  $query->num_rows(); 
                
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            echo "ERROR: ".$e->getMessage();
        }
    }
    public function delete_department($id) {
        
        $q_data=array(
            "departmentid"=>$id
        );
        $this->Model->delete("tbl_mng_departmentmaster",$q_data);
        $this->session->set_flashdata('flashmsg', 'Department deleted successfully.');
    }
   

}
