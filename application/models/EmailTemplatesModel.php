<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailTemplatesModel extends CI_model {

    public function getAllTemplates($limit = 10, $start = 0, $search = '', $order = null, $dir = null) {
        try {
            $data = array();
            $searchcols = "CONCAT(ifnull(T.template_title, ' '), ' ', ifnull(T.subject, ' '), ' ', ifnull(T.createdby, ' '), ' ', ifnull(T.createdon, ' '))";
            $data['totalFiltered'] = $this->getAllTemplatesCount($search, $searchcols);
            //Filter records Data
            //$this->db->select("T.clientid as clientid,CD.personname as PersonName,T.clientname as ClientName,B.location as BranchName,CD.mobilenumber as Mobile,DATE_FORMAT(T.createdon,'%d-%m-%Y') as CreatedOn,T.isactive as Status");
            $this->db->select("T.id,DATE_FORMAT(T.createdon, '%d-%m-%Y') as date,T.template_title,T.subject,T.createdby");
            $this->db->from("tbl_email_templates T");
            $this->db->where(array('T.isactive' => 'Y'));
            //Search
            if ($search) {
                $this->db->like(array($searchcols => $search));
            }
            //OrderBy
            if ($dir == null)
                $dir = 'DESC';
            if ($order == 2) {
                $this->db->order_by('T.createdon', $dir);
            } else if ($order == 3) {
                $this->db->order_by('T.template_title', $dir);
            } else if ($order == 4) {
                $this->db->order_by('T.subject', $dir);
            } else if ($order == 5) {
                $this->db->order_by('T.createdby', $dir);
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

    public function getTemplateDetailsById($id) {
        try {
            $this->db->select("T.id,T.template_id,T.template_title,T.subject,T.message,T.template_type,T.productids,T.isactive,T.createdby,T.createdon");
            $this->db->from("tbl_email_templates T");
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return "ERROR: " . $e->getMessage();
        }
    }

    public function saveTemplateDetails($data) {
        try {
            $error_code = 3;

            $id = $data['id'];
            unset($data['id']);
            if ($data['template_type'] == 'product') {
                $data['productids'] = implode(',', $data['productids']);
            } else {
                $data['productids'] = '';
            }
            $data['template_title'] = trim($data['template_title']);
            $data['template_id'] = str_replace(' ', '_', strtoupper($data['template_title']));

            if ($id == 0) {
                $this->db->select("1")->where(array('isactive' => 'Y', 'template_title' => $data['template_title']));
            } else {
                $this->db->select("1")->where(array('isactive' => 'Y', 'template_title' => $data['template_title'], 'id !=' => $id));
            }
            $query = $this->db->get("tbl_email_templates");
            if ($query->num_rows() > 0) {
                $error_code = 2;
            } else {
                if ($id) {
                    $data['updatedby'] = $this->session->userdata()['UserInfo']['userid'];
                    $data['updatedon'] = date('Y-m-d H:i:s');
                    $this->db->where('id', $id);
                    $error_code = ($this->db->update('tbl_email_templates', $data)) ? 1 : 3;
                } else {
                    $data['createdby'] = $this->session->userdata()['UserInfo']['userid'];
                    $data['createdon'] = date('Y-m-d H:i:s');
                    $error_code = ($this->db->insert('tbl_email_templates', $data)) ? 1 : 3;
                }
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }

    //new model to create template
    public function saveTemplate($data) {
        try {
            $error_code = 3;

            $id = $data['id'];
            unset($data['id']);
            if ($data['template_type'] == 'product') {
                $data['productids'] = implode(',', $data['productids']);
            } else {
                $data['productids'] = '';
            }
            $data['template_title'] = trim($data['template_title']);
            $data['template_id'] = $data['template_id'];

            if ($id == 0) {
                $this->db->select("1")->where(array('isactive' => 'Y', 'template_title' => $data['template_title']));
            } else {
                $this->db->select("1")->where(array('isactive' => 'Y', 'template_title' => $data['template_title'], 'id !=' => $id));
            }
            $query = $this->db->get("tbl_email_templates");
            if ($query->num_rows() > 0) {
                $error_code = 2;
            } else {
                if ($id) {
                    $unique_id = $data['template_id'];
                    $fpath = APPPATH . 'views/templates/' . $unique_id . '.php';
                    $myfile = fopen($fpath, "w") or die("Unable to open file!");
                    $txt = $data["message"];
                    fwrite($myfile, $txt);

                    fclose($myfile);
                    $data["message"] = $unique_id;
                    $data['updatedby'] = $this->session->userdata()['UserInfo']['userid'];
                    $data['updatedon'] = date('Y-m-d H:i:s');
                    $this->db->where('id', $id);
                    $error_code = ($this->db->update('tbl_email_templates', $data)) ? 1 : 3;
                } else {
                    $unique_id = $data['template_id'];
                    $fpath = APPPATH . 'views/templates/' . $unique_id . '.php';
                    $myfile = fopen($fpath, "w") or die("Unable to open file!");
                    $txt = $data["message"];
                    fwrite($myfile, $txt);

                    fclose($myfile);
                    $data["message"] = $unique_id;
                    
                    $data['createdby'] = $this->session->userdata()['UserInfo']['userid'];
                    $data['createdon'] = date('Y-m-d H:i:s');
                    $error_code = ($this->db->insert('tbl_email_templates', $data)) ? 1 : 3;
                }
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            //return "ERROR: ".$e->getMessage();
            $error_code = 3;
        }
        return $error_code;
    }

    public function getAllTemplatesCount($search = '', $searchcols = '') {
        try {
            //Filtered Records Count
            $this->db->select("*");
            $this->db->from("tbl_email_templates T");
            $this->db->where(array('T.isactive' => 'Y'));

            if ($search) {
                $this->db->like(array($searchcols => $search));
            }
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getActiveEmailTemplates() {
        try {
            $this->db->select("T.id,T.template_id,T.template_title");
            $this->db->from("tbl_email_templates T");
            $this->db->where('isactive', 'Y');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return "ERROR: " . $e->getMessage();
        }
    }

}

//class
