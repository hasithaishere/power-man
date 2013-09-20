<?php
// Pull in the NuSOAP code
//require_once('nusoap.php');
include dirname(__FILE__).'/config.php';
include dirname(__FILE__).'/nusoap.php';
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('push_datawsdl', 'urn:push_datawsdl');
// Register the method to expose
$server->register('push_data',                																			// method name
    array('sd_data' => 'xsd:string','md_data' => 'xsd:string','code' => 'xsd:string'),    	// input parameters
    array('status' => 'xsd:string','error_string' => 'xsd:string'),      												// output parameters
    'urn:push_datawsdl',                      																			// namespace
    'urn:push_datawsdl#push_data',                																		// soapaction
    'rpc',                                																				// style
    'encoded',                            																				// use
    'Push main device and sub devices data to server'            														// documentation
);
// Define the method as a PHP function
function push_data($sd_data,$md_data,$code){
	
	$status = 0;
	$error_string = "";
	
		if(strcmp(trim($code),SCODE) == 0)
		{		
			
			$md_data_query = "";
			
			$return_ack = FALSE;
			
			if(!empty($sd_data))
			{
				$temp_sddata = json_decode($sd_data,TRUE);
			
				if(!array_search("", $temp_sddata) !== false)
				{
					$sd_data_query = "INSERT INTO power_subdevice_powerlog (log_on,device_id,maindevice_id,pcon) VALUES ";
					
					foreach ($temp_sddata as $key1 => $value1) {
					//echo "dsds";die();
						$sd_data_query .= "(";
					
						$tmp_sdq_p1 = "";
					
						foreach ($value1 as $key2 => $value2) {
						
							$tmp_sdq_p1 .= "'" . $value2 . "',";
						
						}
						$sd_data_query .= rtrim($tmp_sdq_p1,',');
						$sd_data_query .= "),";
						
					}
					
					$sd_data_query = rtrim($sd_data_query,',');		
					//echo $sd_data_query;
					//die();	
					$return_ack = db_insert($sd_data_query);
					
				}
			}
			
			if(!empty($md_data))
			{
				$temp_mddata = json_decode($md_data,TRUE);
			
				if(!array_search("", $temp_mddata) !== false)
				{
					$md_data_query = "INSERT INTO power_device_powerlog (log_on,pcon,device_id) VALUES ";
					
					foreach ($temp_mddata as $key1 => $value1) {
					
						$md_data_query .= "(";
					
						$tmp_mdq_p1 = "";
					
						foreach ($value1 as $key2 => $value2) {
						
							$tmp_mdq_p1 .= "'" . $value2 . "',";
						
						}
						$md_data_query .= rtrim($tmp_mdq_p1,',');
						$md_data_query .= "),";		
					}
					
					$md_data_query = rtrim($md_data_query,',');		
					
					$return_ack = db_insert($md_data_query);
					
				}
			}
			
			if($return_ack == TRUE)
			{
				$status = 1;
			}
			
			//print_r(json_decode($sd_data,TRUE));
			//die();
			/*
			$myFile = dirname(__FILE__)."/data_log.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = "Device ID : " . $device_id. "\n";
			fwrite($fh, $stringData);
			$stringData = "Sub Device log : " . $sd_data. "\n";
			fwrite($fh, $stringData);
			$stringData = "Main Device log : " . $md_data. "\n";
			fwrite($fh, $stringData);
			fclose($fh);
			$status = 1;*/
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

function db_insert($query)
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