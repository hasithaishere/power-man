<?php

include dirname(__FILE__).'/config.php';

	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	if(! $conn )
	{
		die('Could not connect14: ' . mysql_error());
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
		die('Could not get data15: ' . mysql_error());
	}
				
	while($row1 = mysql_fetch_array($retval1, MYSQL_ASSOC))
	{
		$sql2 = "SELECT device_id,device_type FROM power_user_subdevices WHERE maindevice_id = '" . $row1['device_id'] . "'";

		$retval2 = mysql_query( $sql2, $conn );
		
		if(! $retval2 )
		{
			die('Could not get data16: ' . mysql_error());
		}
		
		while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC))
		{

			$sql3 = "SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '" . $row2['device_id'] . "' AND maindevice_id = '" . $row1['device_id'] . "' AND log_on < '" . $main_time . "' AND check_status = '0' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC";

			$retval3 = mysql_query( $sql3, $conn );
			
			if(! $retval3 )
			{
				die('Could not get data17: ' . mysql_error());
			}
			
			$query_splm = "INSERT INTO power_spl_minute (pcon,log_on,device_id,maindevice_id,created_on) VALUES ";
			//echo $sql3. "<br><hr><br>";
			
			$has_pconrows = FALSE;
			
			while($row3 = mysql_fetch_array($retval3, MYSQL_ASSOC))
			{
				$query_splm .= "('" . $row3['totalpcon'] . "','" . $row3['new_logon'] . "','" . $row2['device_id'] . "','" . $row1['device_id'] . "','" . $current_logtime ."'),";
				$has_pconrows = TRUE;
				
				/*-----Function's Start Call - Malfucntion, -----*/
				
				malfunction_alert_generator($row3['totalpcon'],$row2['device_id'],$row1['device_id'],$row2['device_type'],$current_logtime,$row3['new_logon'],$conn);

				/*-----Function's Stop Call - Malfucntion, -----*/
				
			}

			$query_splm = rtrim($query_splm,',');
			//echo $query_splm . "<br><hr><br>";
			if($has_pconrows)
			{
				$retval4 = mysql_query( $query_splm, $conn );

				if(! $retval4 )
				{
				  die('Could not enter data18: ' . mysql_error());
				}
				else
				{
					$query_splm_ack = "UPDATE power_subdevice_powerlog SET check_status = '1' WHERE device_id = '" . $row2['device_id'] . "' AND maindevice_id = '" . $row1['device_id'] . "' AND log_on < '" . $main_time . "'";
					
					$retval5 = mysql_query( $query_splm_ack, $conn );
	
					if(! $retval5 )
					{
					  die('Could not enter data19: ' . mysql_error());
					}
					
				}
			}
			
			//echo $query_splm . "<br><hr><br>";
			
		}
	}
	
	mysql_close($conn);
	
	/*-------------------Other Function-START--------------------*/
	
	//-----Malfuction Detect Method--------START
	
	function malfunction_alert_generator($pcon,$device_id,$maindevice_id,$device_type,$alert_on,$mainlog_on,$conn)
	{
		$sql10 = "SELECT * FROM power_define_device WHERE id = (SELECT device_type FROM power_user_subdevices WHERE device_id = '". $device_id ."' AND maindevice_id = '". $maindevice_id ."')";
		
		$retval10 = mysql_query( $sql10, $conn );
		
		if(! $retval10 )
		{
			die('Could not get data20: ' . mysql_error());
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
					die('Could not enter data21: ' . mysql_error());
				}
				else 
				{
					$sql12 = "SELECT id FROM power_alert_temp WHERE alert_count >= '". $row10['alert_level_count'] ."' AND device_id = '". $device_id ."' AND maindevice_id = '". $maindevice_id ."' AND alert_type_id = '1'";
					
					$retval12 = mysql_query( $sql12, $conn );
					
					if(! $retval12 )
					{
						die('Could not get data22: ' . mysql_error());
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
						$sql13 = "SELECT * FROM power_user_device WHERE device_id = '". $maindevice_id ."'";

						$retval13 = mysql_query( $sql13, $conn );
						
						if(! $retval13 )
						{
							die('Could not get data23: ' . mysql_error());
						}
						
						while($row13 = mysql_fetch_array($retval13, MYSQL_ASSOC))
						{
							$tmp_alert_device_title = $row13['device_title'];
							$tmp_alert_location_id = $row13['power_location_id'];
						}
						//-----Get Main Device Data--------END
						
						//-----Get Main Device Location Data--------START
						$sql14 = "SELECT * FROM power_location WHERE id = '". $tmp_alert_location_id ."'";

						$retval14 = mysql_query( $sql14, $conn );
						
						if(! $retval14 )
						{
							die('Could not get data24: ' . mysql_error());
						}
						
						while($row14 = mysql_fetch_array($retval14, MYSQL_ASSOC))
						{
							$tmp_alert_location1 = $row14['name'];
							$tmp_alert_location2 = $row14['sub_name'];
						}
						//-----Get Main Device Location Data--------END
						
						//-----Get SubDevice Data--------START
						$sql15 = "SELECT * FROM power_user_subdevices WHERE device_id = '". $device_id ."'";

						$retval15 = mysql_query( $sql15, $conn );
						
						if(! $retval15 )
						{
							die('Could not get data25: ' . mysql_error());
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
						
							/*-------Malfunction Sugestion - START-------*/
							
							$tmp_device_detail = "Device : Location : " . $tmp_alert_location1 . "-" . $tmp_alert_location2 . " , Main Device : " . $tmp_alert_device_title . " , Sub Device : " . $tmp_alert_subdevice_title;
							$tmp_device_detail = mysql_real_escape_string($tmp_device_detail);
							malfunction_sug_generator($maindevice_id,$device_type,'1',$tmp_device_detail,$alert_on,$conn);
							
							/*--------Malfunction Sugestion - END--------*/
							
						
							/*-------Malfunction SMS Send - START-------*/
							
							malfunction_send_sms($maindevice_id, $tmp_alert_string, $alert_on, $conn);
							
							/*--------Malfunction SMS Send - END--------*/
							
							/*-------Time Exceed Alert - START-------*/
							
							timeexceed_alert_generator($pcon,$maindevice_id,$device_id,$mainlog_on,$tmp_device_detail,$conn);
							
							/*-------Time Exceed Alert - END-------*/
							
						
						if(! $retval16 )
						{
						  die('Could not enter data1: ' . mysql_error());
						}
						else
						{
							/*---Delete temp row---Start--*/
							$sql17 = "DELETE FROM power_alert_temp WHERE id = '". $tmp_alert_temprow ."'";
						
							$retval17 = mysql_query( $sql17, $conn );
		
							if(! $retval17 )
							{
							  die('Could not enter data2: ' . mysql_error());
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
	
	//-----Malfuction SMS Alert Method--------START
	
	function malfunction_send_sms($maindevice_id,$message,$send_on,$conn)
	{
		$sql18 = "SELECT malf_sms,user_id FROM power_alert_config WHERE user_id = (SELECT power_users_id FROM power_user_device WHERE device_id = '". $maindevice_id ."')";

		$retval18 = mysql_query( $sql18, $conn );
					
		if(! $retval18 )
		{
			die('Could not get data3: ' . mysql_error());
		}
					
		while($row18 = mysql_fetch_array($retval18, MYSQL_ASSOC))
		{
			if($row18['malf_sms'] == 1)
			{
				$sql19 = "SELECT phoneno FROM power_users WHERE id = '". $row18['user_id'] ."'";
						
				$retval19 = mysql_query( $sql19, $conn );
	
				if(! $retval19 )
				{
					die('Could not enter data4: ' . mysql_error());
				}
				
				while($row19 = mysql_fetch_array($retval19, MYSQL_ASSOC))
				{
					$sql20 = "INSERT INTO power_sms_send (message,phone_no,created_by,created_on) VALUES ('". $message ."','". $row19['phoneno'] ."','1000','". $send_on ."')";
					
					$retval20 = mysql_query( $sql20, $conn );
		
					if(! $retval20 )
					{
						die('Could not enter data5: ' . mysql_error());
					}
				}				
			}
		}
	}

	
	//-----Malfuction SMS Alert Method--------END
	
	
	//-----Malfuction Sugestions Method--------START
	
	function malfunction_sug_generator($maindevice_id,$device_type,$alert_type_id,$tmp_device_detail,$alert_on,$conn)
	{
		$sql21 = "SELECT malf_sug,user_id FROM power_alert_config WHERE user_id = (SELECT power_users_id FROM power_user_device WHERE device_id = '". $maindevice_id ."')";

		$retval21 = mysql_query( $sql21, $conn );
					
		if(! $retval21 )
		{
			die('Could not get data6: ' . mysql_error());
		}
					
		while($row21 = mysql_fetch_array($retval21, MYSQL_ASSOC))
		{
			if($row21['malf_sug'] == 1)
			{
				$sql22 = "SELECT sug_discri FROM power_define_sugestions WHERE alert_type_id = '". $alert_type_id ."' AND device_type = '". $device_type ."'";
						
				$retval22 = mysql_query( $sql22, $conn );
	
				if(! $retval22 )
				{
					die('Could not enter data7: ' . mysql_error());
				}
				
				while($row22 = mysql_fetch_array($retval22, MYSQL_ASSOC))
				{
					$tmp_discription = $row22['sug_discri'] . $tmp_device_detail;
					
					$sql23 = "INSERT INTO power_alert_sugestions (maindevice_id,sug_discri,alert_type_id,created_by,created_on) VALUES ('". $maindevice_id ."','". $tmp_discription ."','". $alert_type_id ."','1000','". $alert_on ."')";
					
					$retval23 = mysql_query( $sql23, $conn );
		
					if(! $retval23 )
					{
						die('Could not enter data8: ' . mysql_error());
					}
				}				
			}
		}
	}
	
	//-----Malfuction Sugestions Method--------END
	
	//-----Maximum Time Period Exceed Alert--------START
	
	function timeexceed_alert_generator($pcon,$maindevice_id,$device_id,$log_on,$device_info,$conn)
	{
		if($pcon > SDIGNORE)
		{		
			$sql24 = "SELECT TIMESTAMPDIFF(SECOND,(SELECT log_on FROM power_spl_minute WHERE log_on < '". $log_on ."' AND pcon < '". SDIGNORE ."' AND device_id = '". $device_id ."' AND maindevice_id  = '". $maindevice_id ."' ORDER BY log_on DESC LIMIT 1),'". $log_on ."') AS diff_time";
							
			$retval24 = mysql_query( $sql24, $conn );
		
			if(! $retval24 )
			{
				die('Could not enter data9: ' . mysql_error());
			}
					
			while($row24 = mysql_fetch_array($retval24, MYSQL_ASSOC))
			{
				$tmp_time_diff = $row24['diff_time'];
				
				$tmp_alert_string = "This device exceed it normal execution time. Currently it worked ". gmdate("H:i:s", $tmp_time_diff) ."Hours. Device Info : ". $device_info;
				
				$sql25 = "INSERT INTO power_alert_main(device_id,maindevice_id,alert_discri,alert_priority,alert_type_id,created_by,created_on) VALUES ('". $device_id ."','". $maindevice_id ."','". $tmp_alert_string . "','High','3','1000','". $log_on ."')";
						
				$retval25 = mysql_query( $sql25, $conn );
				
				if(! $retval25 )
				{
					die('Could not enter data10: ' . mysql_error());
				}
				else 
				{
					timeexceed_alert_sms($maindevice_id, $tmp_alert_string, $log_on, $conn);
				}
				
			}
		}
		
	}
	
	//-----Maximum Time Period Exceed Alert--------END
	
	//-----Maximum Time Period Exceed Alert SMS--------START
	
	function timeexceed_alert_sms($maindevice_id,$message,$send_on,$conn)
	{
		$sql26 = "SELECT time_warn_sms,user_id FROM power_alert_config WHERE user_id = (SELECT power_users_id FROM power_user_device WHERE device_id = '". $maindevice_id ."')";

		$retval26 = mysql_query( $sql26, $conn );
					
		if(! $retval26 )
		{
			die('Could not get data11: ' . mysql_error());
		}
					
		while($row26 = mysql_fetch_array($retval26, MYSQL_ASSOC))
		{
			if($row26['time_warn_sms'] == 1)
			{
				$sql27 = "SELECT phoneno FROM power_users WHERE id = '". $row26['user_id'] ."'";
						
				$retval27 = mysql_query( $sql27, $conn );
	
				if(! $retval27 )
				{
					die('Could not enter data12: ' . mysql_error());
				}
				
				while($row27 = mysql_fetch_array($retval27, MYSQL_ASSOC))
				{
					$sql28 = "INSERT INTO power_sms_send (message,phone_no,created_by,created_on) VALUES ('". $message ."','". $row27['phoneno'] ."','1000','". $send_on ."')";
					
					$retval28 = mysql_query( $sql28, $conn );
		
					if(! $retval28 )
					{
						die('Could not enter data13: ' . mysql_error());
					}
				}				
			}
		}
	}

	
	//-----Maximum Time Period Exceed Alert SMS--------END
	
	/*-------------------Other Function-STOP--------------------*/	
	
//Queries
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '53717869' AND maindevice_id = 'SES001' AND log_on < DATE_SUB(NOW(), INTERVAL 2 minute)GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '53717869' AND maindevice_id = 'SES001' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
//SELECT SUM(pcon) AS totalpcon,log_on FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
?>