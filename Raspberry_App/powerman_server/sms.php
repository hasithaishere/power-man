<?php

		$timezone = "Asia/Calcutta";
        if (function_exists('date_default_timezone_set'))
            date_default_timezone_set($timezone);
		
		$server_url = "https://groupsms.etisalat.lk/sendsms.php";
		$smsUser = "Domore";
		$smsPass = "Domore@123";
		$phoneNo = "94716305702";

		$message = "This is a test message for curl";		
			
        $message_val = urlencode($message);

        $str = $server_url. "?USER=" . $smsUser . "&PWD=" . $smsPass . "&NUM=". $phoneNo ."&MSG=" . $message_val;
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
            //return false;
        }else
            //return true;
			echo "Send";

?>