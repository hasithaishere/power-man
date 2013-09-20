<?php
// Pull in the NuSOAP code
//require_once('nusoap.php');
include dirname(__FILE__).'/config.php';
include dirname(__FILE__).'/nusoap.php';
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('ack_signalwsdl', 'urn:ack_signalwsdl');
// Register the method to expose
$server->register('ack_signal',                																			// method name
    array('ack_ids' => 'xsd:string','code' => 'xsd:string'),    	// input parameters
    array('status' => 'xsd:string','error_string' => 'xsd:string'),      												// output parameters
    'urn:ack_signalwsdl',                      																			// namespace
    'urn:ack_signalwsdl#ack_signal',                																		// soapaction
    'rpc',                                																				// style
    'encoded',                            																				// use
    'Send acknowledgement push main device and sub devices data to server'            														// documentation
);
// Define the method as a PHP function
function ack_signal($ack_ids,$code){
	
	$status = 0;
	$error_string = "";
	
		if(strcmp(trim($code),SCODE) == 0)
		{		
			
			$return_ack = FALSE;
			
			if(!empty($ack_ids))
			{
				
				$ack_query = "UPDATE power_control_sendout SET send_status = '1' WHERE id IN ('". str_replace(",", "','", $ack_ids) . "')";
				
				$return_ack = db_update($ack_query);
				
				if($return_ack == TRUE)
				{
					$status = 1;
				}
				
			}
			
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

function db_update($query)
{
	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(DBNAME);
	
	$retval = mysql_query( $query, $conn );

	if(! $retval )
	{
	  die('Could not enter data: ' . mysql_error());
	}
	
	mysql_close($conn);
	
	return $retval;
	
}

?>