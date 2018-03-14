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
            return true;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            redirect(base_url());
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
    

    function do_upload($file,$path,$formate) {
        $obj = & get_instance();
        $orignal_path='./manager_gallary/'.$path."/";
        $config['upload_path'] = $orignal_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name']=TRUE;

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
