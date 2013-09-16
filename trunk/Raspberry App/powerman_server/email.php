<?php
//$r = new HttpRequest('http://e-mailvalidator.com/index.php', HttpRequest::METH_POST);
//$r->setOptions(array('cookies' => array('lang' => 'de')));
//$r->addPostFields(array('EMAIL' => 'hasitha@domore.lk');
//try {
//    echo $r->send()->getBody();
//} catch (HttpException $ex) {
//    echo $ex;
//}

$Email   = 'hasitha@domore.lk';

 $Curl_Session = curl_init('http://e-mailvalidator.com/index.php');
 curl_setopt ($Curl_Session, CURLOPT_POST, 1);
 curl_setopt ($Curl_Session, CURLOPT_POSTFIELDS, "EMAIL=$Email");
 curl_setopt ($Curl_Session, CURLOPT_FOLLOWLOCATION, 1);
 echo curl_exec ($Curl_Session);
 curl_close ($Curl_Session);
 //header("Location:http://www.site.com/cgi-bin/thanks.php");

?>