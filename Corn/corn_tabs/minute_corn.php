<?php

include dirname(__FILE__).'/config.php';

	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(DBNAME);
	
	date_default_timezone_set("Asia/Colombo"); 
	
	$dateNew = mktime(date('H'),date('i')-1,'00',date('m'),date('d'),date('Y'));
	//echo date('Y-m-d H:i:s',$dateNew);
	//die();
	
	//$sql = "SELECT DATE_SUB(NOW(), INTERVAL 2 minute) AS main_time";
	//$retval = mysql_query( $sql, $conn );

	//if(! $retval )
	//{
	//	die('Could not get data: ' . mysql_error());
	//}
	
	$main_time = date('Y-m-d H:i:s',$dateNew);
	date_default_timezone_set("Asia/Colombo"); 
	$current_logtime = date('Y-m-d H:i:s');
		
	//while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	//{
	//	$main_time = $row['main_time'];
	//}	
	
	$sql1 = "SELECT device_id FROM power_user_device";
	$retval1 = mysql_query( $sql1, $conn );

	if(! $retval1 )
	{
		die('Could not get data: ' . mysql_error());
	}
				
	while($row1 = mysql_fetch_array($retval1, MYSQL_ASSOC))
	{
		$sql2 = "SELECT device_id, FROM power_user_subdevices WHERE maindevice_id = '" . $row1['device_id'] . "'";

		$retval2 = mysql_query( $sql2, $conn );
		
		if(! $retval2 )
		{
			die('Could not get data: ' . mysql_error());
		}
		
		while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC))
		{

			$sql3 = "SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '" . $row2['device_id'] . "' AND maindevice_id = '" . $row1['device_id'] . "' AND log_on < '" . $main_time . "' AND check_status = '0' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC";

			$retval3 = mysql_query( $sql3, $conn );
			
			if(! $retval3 )
			{
				die('Could not get data: ' . mysql_error());
			}
			
			$query_splm = "INSERT INTO power_spl_minute (pcon,log_on,device_id,maindevice_id,created_on) VALUES ";
			//echo $sql3. "<br><hr><br>";
			
			$has_pconrows = FALSE;
			
			while($row3 = mysql_fetch_array($retval3, MYSQL_ASSOC))
			{
				$query_splm .= "('" . $row3['totalpcon'] . "','" . $row3['new_logon'] . "','" . $row2['device_id'] . "','" . $row1['device_id'] . "','" . $current_logtime ."'),";
				$has_pconrows = TRUE;
				
				/*-----Function's Start Call - Malfucntion, -----*/
				
				malfunction_alert_generator($row3['totalpcon'],$row2['device_id'],$row1['device_id'],$current_logtime,$conn);
				
				/*-----Function's Stop Call - Malfucntion, -----*/
			}
			
			$query_splm = rtrim($query_splm,',');
			//echo $query_splm . "<br><hr><br>";
			if($has_pconrows)
			{
				$retval4 = mysql_query( $query_splm, $conn );

				if(! $retval4 )
				{
				  die('Could not enter data: ' . mysql_error());
				}
				
				if($retval4)
				{
					$query_splm_ack = "UPDATE power_subdevice_powerlog SET check_status = '1' WHERE device_id = '" . $row2['device_id'] . "' AND maindevice_id = '" . $row1['device_id'] . "' AND log_on < '" . $main_time . "'";
					
					$retval5 = mysql_query( $query_splm_ack, $conn );
	
					if(! $retval5 )
					{
					  die('Could not enter data: ' . mysql_error());
					}
					
				}
			}
			
			//echo $query_splm . "<br><hr><br>";
			
		}
	}
	
	mysql_close($conn);
	
	/*-------------------Other Function-START--------------------*/
	
	//-----Malfuction Detect Method--------START
	
	function malfunction_alert_generator($pcon,$device_id,$maindevice_id,$alert_on,$conn)
	{
		$sql10 = "SELECT * FROM power_define_device WHERE id = (SELECT device_type FROM power_user_subdevices WHERE device_id = '". $device_id ."' AND maindevice_id = '". $maindevice_id ."')";

		$retval10 = mysql_query( $sql10, $conn );
		
		if(! $retval10 )
		{
			die('Could not get data: ' . mysql_error());
		}
		
		while($row10 = mysql_fetch_array($retval10, MYSQL_ASSOC))
		{
			$tmp_alert_precent = floatval($row10['alert_level_precent']);
			$tmp_max_pcon = floatval($row10['max_pcon']) * 60; //For one minute
			
			if($tmp_alert_precent <= ((($pcon - $tmp_max_pcon)/$tmp_max_pcon)*100))
			{
				$sql11 = "INSERT INTO power_alert_temp (device_id,maindevice_id,alert_type_id,alert_count) VALUES ('". $device_id ."','". $maindevice_id ."','1','0') ON DUPLICATE KEY UPDATE alert_count=alert_count+1";
				
				$retval11 = mysql_query( $sql11, $conn );
	
				if(! $retval11 )
				{
					die('Could not enter data: ' . mysql_error());
				}
				else 
				{
					$sql12 = "SELECT id FROM power_alert_temp WHERE alert_count >= '". $row10['alert_level_count'] ."' AND device_id = '". $device_id ."' AND maindevice_id = '". $maindevice_id ."' AND alert_type_id = '1')";

					$retval12 = mysql_query( $sql12, $conn );
					
					if(! $retval12 )
					{
						die('Could not get data: ' . mysql_error());
					}
					
					while($row12 = mysql_fetch_array($retval12, MYSQL_ASSOC))
					{
						//-----Alert Required Data ------- START
						
						$tmp_alert_temprow = $row12['id'];
						
						$tmp_alert_location1 = "";
						$tmp_alert_location2 = "";
						$tmp_alert_device_title  =  "";
						$tmp_alert_subdevice_title = "";
						
						$tmp_alert_location_id = "";
						//-----Alert Required Data ------- END
						
						//-----Get Main Device Data--------START
						$sql13 = "SELECT * FROM power_user_device WHERE device_id = '". $maindevice_id ."')";

						$retval13 = mysql_query( $sql13, $conn );
						
						if(! $retval13 )
						{
							die('Could not get data: ' . mysql_error());
						}
						
						while($row13 = mysql_fetch_array($retval13, MYSQL_ASSOC))
						{
							$tmp_alert_device_title = $row13['device_title'];
							$tmp_alert_location_id = $row13['power_location_id'];
						}
						//-----Get Main Device Data--------END
						
						//-----Get Main Device Location Data--------START
						$sql14 = "SELECT * FROM power_location WHERE id = '". $tmp_alert_location_id ."')";

						$retval14 = mysql_query( $sql13, $conn );
						
						if(! $retval14 )
						{
							die('Could not get data: ' . mysql_error());
						}
						
						while($row14 = mysql_fetch_array($retval14, MYSQL_ASSOC))
						{
							$tmp_alert_location1 = $row14['name'];
							$tmp_alert_location2 = $row14['sub_name'];
						}
						//-----Get Main Device Location Data--------END
						
						//-----Get SubDevice Data--------START
						$sql15 = "SELECT * FROM power_user_subdevices WHERE device_id = '". $device_id ."')";

						$retval15 = mysql_query( $sql15, $conn );
						
						if(! $retval15 )
						{
							die('Could not get data: ' . mysql_error());
						}
						
						while($row15 = mysql_fetch_array($retval15, MYSQL_ASSOC))
						{
							$tmp_alert_subdevice_title = $row15['device_title'];
						}
						//-----Get SubDevice Data--------END
						
						//-----Insert Alert String--------START
						
						$exceed_precent = (($pcon - $tmp_max_pcon)/$tmp_max_pcon)*100;
						
						$tmp_alert_string = "This device work in malfunctioning state, please check that, it takes extra " . $exceed_precent . "W than normal device state. Location : " . $tmp_alert_location1 . "-" . $tmp_alert_location2 . " , Main Device : " . $tmp_alert_device_title . " , Sub Device : " . $tmp_alert_subdevice_title . "."; 					
						$tmp_alert_string  = mysql_real_escape_string($tmp_alert_string);
						
						$sql16 = "INSERT INTO power_alert_main(device_id,maindevice_id,alert_discri,alert_priority,alert_type_id,created_by,created_on) VALUES ('". $device_id ."','". $maindevice_id ."','". $tmp_alert_string . "','High','1','1000','". $alert_on ."')";
						
						$retval16 = mysql_query( $sql16, $conn );
	
						if(! $retval16 )
						{
						  die('Could not enter data: ' . mysql_error());
						}
						else
						{
							/*---Delete temp row---Start--*/
							$sql17 = "DELETE FROM power_alert_temp WHERE id = '". $tmp_alert_temprow ."'";
						
							$retval17 = mysql_query( $sql17, $conn );
		
							if(! $retval17 )
							{
							  die('Could not enter data: ' . mysql_error());
							}
							/*---Delete temp row---Start--*/
						}
						
						//-----Insert Alert String--------END
						
					}
				}
			}
		}
	}
	//-----Malfuction Detect Method--------END
	
	//-----Malfuction Sugestions Method--------START
	
	
	
	//-----Malfuction Sugestions Method--------END
	
	/*-------------------Other Function-STOP--------------------*/	
	
//Queries
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '53717869' AND maindevice_id = 'SES001' AND log_on < DATE_SUB(NOW(), INTERVAL 2 minute)GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '53717869' AND maindevice_id = 'SES001' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
//SELECT SUM(pcon) AS totalpcon,log_on FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
?>