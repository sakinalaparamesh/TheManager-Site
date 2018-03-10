<?php

class Jobs_model extends CI_Model {

    public function saveJob($data) {
        $res_data = 1;
        $dep_check = array(
            "jobs_position" => $data["jobs_position"]
        );
        $checkRes = $this->Model->check("tbl_mng_jobs", $dep_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 2;
        } else {
            if ($this->Model->insert("tbl_mng_jobs", $data)) {
                $res_data = 1;
            } else {
                 $res_data= 3;
            }
        }
        return $res_data;
    }
   

}
