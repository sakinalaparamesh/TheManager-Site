<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(0);
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function listOfJobs() {
        if ($this->input->post('gui_key') != GUI_KEY && $this->input->post('gui_name') != GUI_NAME) {
            $data['error_code'] = 0;
            $data['message'] = "Please recheck the gui key or gui name...!";
            echo json_encode($data);
        } else {
            $this->load->model("Jobs_model");
            $data['error_code'] = 1;
            $data['list'] = $this->Jobs_model->getActiveJobs()->result_array();
            echo json_encode($data);
        }
    }

    //email check
    public function saveText() {
        $unique_id = uniqid();
        $fpath = APPPATH . 'views/templates/' . $unique_id . '.php';
        $myfile = fopen($fpath, "w") or die("Unable to open file!");
        $txt = $this->input->post("message");
        fwrite($myfile, $txt);

        fclose($myfile);
        $this->Model->insert("tbl_email_templates", array("message" => $unique_id));
        redirect("Welcome");
    }

    public function view($id = '') {
        $data['message'] = $this->Model->check("msg_text", array("text_id" => $id))->row()->text_msg;
        $this->load->view("email_template", $data);
    }

    public function preview() {
        $data['message'] = $this->input->post("message");
        $this->load->view("email_template", $data);
    }

    public function sendEmail() {
        $data['message'] = $this->input->post("message");
//        $msg = $this->load->view("email_template", $data, true);
        echo sendEmail("nagamurali.garisapati@provalley.net", "template test", $data['message']);
    }

    public function uploadImages() {

//        $file_names = explode(",", $this->input->post('file_names'));
        $total = count($_FILES['file']);
//        if (count(array_unique($file_names)) < count($file_names)) {
//            echo "array duplicated";
//        } else {
        $uploads = array();
        $unique_id = uniqid();
        for ($i = 0; $i < $total; $i++) {

            $tmpFilePath = $_FILES['file']['tmp_name'][$i];


            if ($tmpFilePath != "") {
                $array = explode('.', $_FILES['file']['name'][$i]);
                $extension = end($array);
                $newFilePath = "./template_images/" . $unique_id . '.' . $extension;
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                    array_push($uploads, $unique_id . '.' . $extension);
                }
            }
        }

        echo json_encode($uploads);
//        }
    }

    public function deleteImage() {
        $file = "./template_images/" . $this->input->post('img');
        if (!unlink($file)) {
            echo true;
        } else {
            echo false;
        }
    }

}
