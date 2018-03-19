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
                $res_data = 3;
            }
        }
        return $res_data;
    }
    public function updateJob($data, $id = '') {
        $res_data = 1;
        $job_check = array(
            "jobs_id!=" => $id,
            "jobs_position" => $data["jobs_position"]
        );
        $checkRes = $this->Model->check("tbl_mng_jobs", $job_check);
        if ($checkRes->num_rows() > 0) {
            $res_data = 3;
        } else {
            $q_data = array(
                "jobs_id" => $id
            );
            if ($this->Model->update("tbl_mng_jobs", $q_data, $data)) {
                $res_data = 1;
            } else {
                $res_data = 2;
            }
        }
        return $res_data;
    }
    public function getAllJobs($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $data['totalFiltered'] = $this->getJobCountBySearch($search);
            //Filter records Data
            $this->db->select("jobs_id,jobs_position,jobs_numberofposition,jobs_joiningdate,tbl_mng_jobs.jobs_position_startdate,jobs_position_enddate,jobs_country,jobs_description,jobs_eligibilitycriteria,isactive");
            $this->db->from("tbl_mng_jobs"); //Search
            if ($search) {
                $this->db->like(array("CONCAT(jobs_skillset,' ',jobs_position,' ',jobs_numberofposition)" => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 1) {
                $this->db->order_by('jobs_skillset', $dir);
            } else if ($order == 2) {
                $this->db->order_by('tbl_mng_jobs', $dir);
            }
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

    public function getJobCountBySearch($search = '') {
        try {
            //Filtered Records Count
            $this->db->select("*");
            $this->db->from("tbl_mng_jobs");
            if ($search) {
                $this->db->like(array("CONCAT(jobs_skillset,' ',jobs_position,' ',jobs_numberofposition)" => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getJobFullDetails($id) {
        $details_q = "select tbl_mng_jobs.*,(select GROUP_CONCAT(configuration_name SEPARATOR ',') from tbl_mng_configuration_master "
                . "where configuration_id in(tbl_mng_jobs.jobs_skillset)) as skillset from tbl_mng_jobs where jobs_id='" . $id . "'";
        return $this->db->query($details_q);
    }
    public function delete_job($id) {
        $res_data = 2;
        try {
        $this->Model->delete("tbl_mng_jobs",array("jobs_id"=>$id));
        $res_data = 1;
        }catch (Exception $e) {
            log_message('error', $e->getMessage());
            $res_data = 3;
        }
        return $res_data;
    }

}
