<?php

class send_sms_now extends CI_Controller
{
	function index()
	{
		/*$this->load->helper('url');
		$server_url = 'https://192.168.0.102/';

		$this->load->library('xmlrpc');

		$this->xmlrpc->server($server_url, 80);
		$this->xmlrpc->method('Greetings');

		$request = array(array('req'=>'$sen:@001'), 'struct');
		$this->xmlrpc->request($request);

		if ( ! $this->xmlrpc->send_request())
		{
			echo $this->xmlrpc->display_error();
		}
		else
		{
			echo '<pre>';
			print_r($this->xmlrpc->display_response());
			echo '</pre>';
		}*/
		
		//die(phpinfo());
		
		$timezone = "Asia/Calcutta";
        if (function_exists('date_default_timezone_set'))
            date_default_timezone_set($timezone);


        $message_val = urlencode("Test 123");

        $str = "https://groupsms.etisalat.lk/sendsms.php?USER=Domore&PWD=Domore@123&NUM=0719269267&MSG=gdfgdbvx";
        //$this->setRequest($str);

        //echo $this->requestURL;exit;
        //exit();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HTTP/1.1 200 OK', 'Status: 200 Success'));
        curl_setopt($ch, CURLOPT_URL, $str);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
		
        curl_close($ch);
		
        if (FALSE === $output){
            echo curl_error($ch);
            return false;
        }else
            return true;
		
		
	}
}