<?php
//Check Admin User loggedIN or not
//if (!function_exists('is_user_loggedin'))
//{
//    function is_user_loggedin()
//    {
//        try{
//            $CI =& get_instance();
//            if ($CI->session->userdata('IsAdminLoggedIn') == FALSE){
//                redirect(base_url().$CI->config->item('admin_url_path'));
//            }
//        } catch (Exception $e){
//            log_message('error', $e->getMessage());
//            redirect(base_url().$CI->config->item('admin_url_path'));
//        }
//    }	
//}

if (!function_exists('is_admin_loggedin'))
{
    function is_user_loggedin()
    {
        try{
            return true;
            
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            redirect(base_url().$CI->config->item('admin_url_path'));
        }
    }	
}
