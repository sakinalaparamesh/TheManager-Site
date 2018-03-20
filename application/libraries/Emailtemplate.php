<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emailtemplate {

    var $template_id;
    var $subject;
    var $message;
    var $to_emails;
    var $from_email;
    var $from_name;
    var $cc_emails;
    var $bcc_emails;
    var $CI;
    
    function __construct() {
        $this->from_email = 'info@provalley.net';
        $this->from_name  = 'Provalley Solutions';
        $this->CI =& get_instance();
    }
    function sendEmail($template_id = '', $recipients = array(), $replace_items = array()){
        
        //Template ID
        $this->template_id = $template_id;
        //set recipients
        $this->setRecipients($recipients);
        
        //generate template
        $this->generateTemplate($replace_items);
        
//        echo "<pre>"; print_r($this->to_emails);
//        echo "<pre>"; print_r($this->cc_emails);
//        echo "<pre>"; print_r($this->bcc_emails);
//        echo "<pre>"; print_r($this->from_email);
//        echo "<pre>"; print_r($this->from_name);
        
        //$final_output = "Subject: <br>".$this->subject."<br><br>Message: <br>".$this->message;;
        //echo $final_output; exit;
        
        $this->setEmailConfiguration();
        //send email from server
        $this->setEmailParams();
        
        //return $this->CI->email->send();
        echo $this->CI->email->send(); exit;
        $this->CI->email->print_debugger(); exit;
        
    }
    function setRecipients($recipients){
        
        if(isset($recipients['to'])){
            $this->to_emails = $recipients['to'];
        }
        if(isset($recipients['cc'])){
            $this->cc_emails = $recipients['cc'];
        }
        if(isset($recipients['bcc'])){
            $this->bcc_emails = $recipients['bcc'];
        }
        if(isset($recipients['from_email'])){
            $this->from_email = $recipients['from_email'];
        }
        if(isset($recipients['from_name'])){
            $this->from_name = $recipients['from_name'];
        }
    }
    function generateTemplate($replace_items){

        $this->CI->db->select('subject,message');
        $this->CI->db->where(array('template_id'=>$this->template_id, 'isactive'=>'Y'));
        $query = $this->CI->db->get('tbl_email_templates');
        $result = $query->row();
                
        $this->subject = $result->subject;
        $this->message = $result->message;;       
        
        //replace itmes
        foreach($replace_items as $key=>$val){
            $this->subject = str_ireplace("##".$key."##", $val, $this->subject);
            $this->message = str_ireplace("##".$key."##", $val, $this->message);
        }
    }   
    function setEmailConfiguration(){
        
//        $config['protocol'] = 'sendmail';
//        $config['mailpath'] = '/usr/sbin/sendmail';
//        $config['charset'] = 'iso-8859-1';
//        $config['wordwrap'] = TRUE;
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.provalley.net',
            'smtp_port' => 25,
            'smtp_user' => 'sri@provalley.net',
            'smtp_pass' => 'Srikumar@74',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );

        $this->CI->email->initialize($config);
    }
    function setEmailParams(){
        
        $this->CI->load->library('email');

        $this->CI->email->from($this->from_email, $this->from_name);
        $this->CI->email->to($this->to_emails);
        $this->CI->email->cc($this->cc_emails);
        $this->CI->email->bcc($this->bcc_emails);
        $this->CI->email->subject($this->subject);
        $this->CI->email->message($this->message);
    }

}
