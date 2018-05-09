<?php

//Check Admin User loggedIN or not
//if (!function_exists('is_user_loggedin'))
//{
//    function is_user_loggedin()
//    {
//        try{
//            $CI =& get_instance();
//            if ($CI->session->userdata('IsAdminLoggedIn') == FALSE){
//                redirect(base_url());
//            }
//        } catch (Exception $e){
//            log_message('error', $e->getMessage());
//            redirect(base_url().);
//        }
//    }	
//}

if (!function_exists('is_user_loggedin')) {

    function is_user_loggedin() {

        try {
            $CI = & get_instance();
            if ($CI->session->userdata('IsUserLoggedIn')) {

//                $controller = $CI->uri->segment(1);
//                $check_point = 0;
//                $privileges = $CI->session->userdata("UserRolePrevillages");
//                foreach ($privileges as $list) {
//                    if (strpos(strtolower($list['controllername']),strtolower($controller)) !== false) {
//                        $check_point++;
//                    }
//                }
//                if ($check_point > 0) {
//                    return TRUE;
//                } else {
//
//                    echo "You don't have access to this page..!"; exit;
//                }
                return TRUE;
            } else {
                $CI->session->set_flashdata('flashmsg', 'Your session is expired, please login again...!');
                redirect("Admin");
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            redirect(base_url() . $CI->config->item('base_url'));
        }
    }

}
if (!function_exists('getErrorMessages')) {

    function getErrorMessages($controller_name, $method, $error_code) {
        $path = base_url() . "data/error_details.json";
        $res = file_get_contents($path);
        $data = json_decode($res, TRUE);
        for ($i = 0; count($data) > $i; $i++) {
            if ($data[$i]['controlname'] == $controller_name && $data[$i]['ActionName'] == $method && $data[$i]['ErrorCode'] == $error_code) {
                return $data[$i]['Message'];
            }
        }
    }

}
if (!function_exists('do_upload')) {


    function do_upload($file, $path, $formate) {
        $obj = & get_instance();
        $orignal_path = './manager_gallary/' . $path . "/";
        $config['upload_path'] = $orignal_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $obj->load->library('upload', $config);

        if (!$obj->upload->do_upload($file)) {
            $error = array('error' => $obj->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $obj->upload->data());
            return $data['upload_data'];
        }
    }

}
if (!function_exists('checkPrivileges')) {


    function checkPrivileges($controller, $action) {
        $obj = & get_instance();
        $check_point = 0;
        $privileges = $obj->session->userdata("UserRolePrevillages");
        foreach ($privileges as $list) {
            if ((strcasecmp($list['controllername'], $controller) == 0) && (strcasecmp($list['actioncodename'], $action) == 0)) {
                $check_point++;
            }
        }
        if ($check_point > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
if (!function_exists('sendEmail')) {


    function sendEmail($to, $subject, $message, $headers = '') {
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <noreply@provalley.net>' . "\r\n";
        //$headers .= 'Cc: myboss@example.com' . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

}


if (!function_exists('dataCompare')) {


    function dataCompare($set, $value) {
        $array = explode(",", $set);

        if (in_array($value, $array)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

if (!function_exists('genSubCode')) {

    function genSubCode($str) {
        $numbers = preg_replace('/[^0-9]/', '', $str);
        $letters = preg_replace('/[^a-zA-Z]/', '', $str);
        $new_code = strtoupper($letters) . sprintf('%05d', (intval($numbers) + 1));
        return $new_code;
    }

}
