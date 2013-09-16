<?php
// Pull in the NuSOAP code
//require_once('nusoap.php');
include dirname(__FILE__).'/config.php';
include dirname(__FILE__).'/nusoap.php';
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('get_signalwsdl', 'urn:get_signalwsdl');
// Register the method to expose
$server->register('get_signal',                														// method name
    array('device_id' => 'xsd:string','code' => 'xsd:string'),    									// input parameters
    array('status' => 'xsd:string','error_string' => 'xsd:string'),      							// output parameters
    'urn:get_signalwsdl',                      														// namespace
    'urn:get_signalwsdl#get_signal',                												// soapaction
    'rpc',                                															// style
    'encoded',                            															// use
    'Get control,pair,schedule signals from server'            										// documentation
);
// Define the method as a PHP function
function get_signal($device_id,$code){
	
	$status = 0;
	$error_string = "";
	
	
		if(strcmp($code,"6f78079088bd1bbc06cc277af294951a") == 0)
		{
			$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
			if(! $conn )
			{
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db(DBNAME);
			
		}
		else
		{
			$status = 5;
		}

    return (array("active_req" => ,"c_status" => ,"c_signal" => ,"p_status" => ,"p_signal" => ,"sc_status" => ,"sc_signal" => ,"status" => $status,"error_string" => $error_string));

}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>