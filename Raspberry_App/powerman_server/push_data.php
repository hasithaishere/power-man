<?php
// Pull in the NuSOAP code
//require_once('nusoap.php');
include dirname(__FILE__).'/nusoap.php';
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('push_datawsdl', 'urn:push_datawsdl');
// Register the method to expose
$server->register('push_data',                																			// method name
    array('device_id' => 'xsd:string','sd_data' => 'xsd:string','md_data' => 'xsd:string','code' => 'xsd:string'),    	// input parameters
    array('status' => 'xsd:string','error_string' => 'xsd:string'),      												// output parameters
    'urn:push_datawsdl',                      																			// namespace
    'urn:push_datawsdl#push_data',                																		// soapaction
    'rpc',                                																				// style
    'encoded',                            																				// use
    'Push main device and sub devices data to server'            														// documentation
);
// Define the method as a PHP function
function push_data($device_id,$sd_data,$md_data,$code){
	
	$status = 0;
	$error_string = "";
	
	
		if(strcmp($code,"6f78079088bd1bbc06cc277af294951a") == 0)
		{
			$myFile = dirname(__FILE__)."/data_log.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = "Device ID : " . $device_id. "\n";
			fwrite($fh, $stringData);
			$stringData = "Sub Device log : " . $sd_data. "\n";
			fwrite($fh, $stringData);
			$stringData = "Main Device log : " . $md_data. "\n";
			fwrite($fh, $stringData);
			fclose($fh);
			$status = 1;
		}
		else
		{
			$status = 5;
		}

    return (array("status" => $status,"error_string" => $error_string));

}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>