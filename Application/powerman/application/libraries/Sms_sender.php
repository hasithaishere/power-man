<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_sender {

    public function send_sms($data)
    {
		$str = "https://groupsms.etisalat.lk/sendsms.php?USER=Domore&PWD=Domore@123&NUM=0716305702&MSG=haitha";


		$ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HTTP/1.1 200 OK', 'Status: 200 Success'));
        curl_setopt($ch, CURLOPT_URL, $str);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
    }
}