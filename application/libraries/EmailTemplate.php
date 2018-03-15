<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailTemplate {

    var $subject;
    var $message;
    
    function __construct() {
        
    }
    function sendEmail($template_title = '', $recipients, $replace_items){
        
        echo "Hello I am in sendEmail method"; exit;
        
    }
    function generateTemplate(){
        
        //$this->subject = $subject;
        
        echo "Hello I am in generate Templ"; exit;
        
    }
    function template1111() {
        
        $subject_replace_items = array();
        $message_replace_items = array();
        
        $subject = 'Subject goes here for product, ##productname##';
        
        $body = '<html>
        <head>
               <title> ##blog_title##</title>
        </head>
            <body>
                <p style="color:#FF0000;"><b>Name: </b>##name##</p>
                <p style="color:#093;"><b>Email: </b>##email##</p>
                <p style="color:#093;"><b>Mobile: </b>##mobile##</p>
            </body>
        </html>';
        
        
        //echo str_ireplace("world","Peter","Hello World!");
        $subject_replace_items = array('productname'=>'REMS');
        $message_replace_items = array('name' =>'Narender Reddy', 'email'=>'narender@gmail.com', 'mobile'=>'9948580090');
        
        foreach($subject_replace_items as $key=>$val){
            $subject = str_ireplace("##".$key."##", $val, $subject);
        }
        echo "<h4>---------Subject----------</h4>". $subject;
        
        foreach($message_replace_items as $key=>$val){
            $body = str_ireplace("##".$key."##", $val, $body);
        }
        echo "<h4>----------Message----------</h4>". $body;
           
    }


}
