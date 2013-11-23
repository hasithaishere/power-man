<?php
//----------------ORIGINAL ONE------------------
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
    array('active_req' => 'xsd:string','c_status' => 'xsd:string','c_signal' => 'xsd:string','p_status' => 'xsd:string','p_signal' => 'xsd:string','sc_status' => 'xsd:string','sc_signal' => 'xsd:string','uid_list' => 'xsd:string','status' => 'xsd:string','error_string' => 'xsd:string'),      							// output parameters
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
	
	$control_arr;
	$pair_arr;
	$schedule_arr;
	
	$c_status = 0;
	$p_status = 0;
	$sc_status = 0;
	$tmp_uid_list = "";
	
		if(strcmp(trim($code),SCODE) == 0)
		{
			$deviceid_list = explode(",", $device_id);
			
			$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
			if(! $conn )
			{
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db(DBNAME);
						
			$i = 0;
			while ($i < count($deviceid_list)) 
			{
				$sql = "SELECT * FROM power_control_sendout WHERE maindevice_id = '$deviceid_list[$i]' AND send_status = '0' ORDER BY control_on ASC";
	            $retval = mysql_query( $sql, $conn );
	
	            if(! $retval )
	            {
	                die('Could not get data: ' . mysql_error());
	            }
				
	            while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	            {
	            	if(!strcmp($row['control_type'], "1"))
					{
						$control_arr[] = array("maindevice_id" => $row['maindevice_id'],"device_id" => $row['device_id'],"control_status" => $row['control_status']); 
						$c_status = 1;
						$tmp_uid_list .= ($row['id'] . ",");
					}
					else 
					{
						if(!strcmp($row['control_type'], "2"))
						{
							$pair_arr[] = array("maindevice_id" => $row['maindevice_id'],"device_id" => $row['device_id'],"control_status" => $row['control_status']);
							$p_status = 1;
							$tmp_uid_list .= ($row['id'] . ",");
						}
						else 
						{
							if(!strcmp($row['control_type'], "3"))
							{
								$schedule_arr[] = array("maindevice_id" => $row['maindevice_id'],"device_id" => $row['device_id'],"control_status" => $row['control_status'],"schedule_on" => $row['schedule_on']); 
								$sc_status = 1;
								$tmp_uid_list .= ($row['id'] . ",");
							}
					
						}
					}
	                $update_time_val = $row['update_time'];
	            }
				$i++;
			}			
			
		}
		else
		{
			$status = 5;
		}
		/*echo json_encode($control_arr);echo "<br/>";
		echo json_encode($pair_arr);echo "<br/>";
		echo json_encode($schedule_arr);echo "<br/>";
		print_r($control_arr);
		print_r($pair_arr);
		print_r($schedule_arr);
		die();*/
		
		$active_req = 0;
		
		if($c_status == 1 || $p_status == 1 || $sc_status == 1)
		{
			$active_req = 1;
		}
		
		$tmp_uid_list = rtrim($tmp_uid_list,',');
		
    return (array("active_req" => $active_req,"c_status" => $c_status,"c_signal" => json_encode($control_arr),"p_status" => $p_status,"p_signal" => json_encode($pair_arr),"sc_status" => $sc_status,"sc_signal" => json_encode($schedule_arr),"uid_list" => $tmp_uid_list ,"status" => $status,"error_string" => $error_string));

}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>