<?php

include dirname(__FILE__).'/config.php';

	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(DBNAME);
	
	date_default_timezone_set("Asia/Colombo"); 
	$current_logtime = date('Y-m-d H:i:s');
	
	//malfunction_send_sms("ses001","Tdshkafabcscvbds fc csbu csb  csdb cvsda vsdbvas",$current_logtime,$conn);
	
	//malfunction_alert_generator(10,"1D723F69","ses001",$current_logtime,$conn);
	
	//malfunction_sug_generator("ses001", "1", "1", "hhhhaaaaa", $current_logtime,$conn);
	
	timeexceed_alert_generator(70, "ses001", "1D723F69", $current_logtime, "Thesjfdsbnljvblscjvb nvslvjn xljvbnvb", $conn);
	
	function malfunction_send_sms($maindevice_id,$message,$send_on,$conn)
	{
		$sql18 = "SELECT malf_sms,user_id FROM power_alert_config WHERE user_id = (SELECT power_users_id FROM power_user_device WHERE device_id = '". $maindevice_id ."')";

		$retval18 = mysql_query( $sql18, $conn );
					
		if(! $retval18 )
		{
			die('Could not get data: ' . mysql_error());
		}
					
		while($row18 = mysql_fetch_array($retval18, MYSQL_ASSOC))
		{
			if($row18['malf_sms'] == 1)
			{
				$sql19 = "SELECT phoneno FROM power_users WHERE id = '". $row18['user_id'] ."'";
						
				$retval19 = mysql_query( $sql19, $conn );
	
				if(! $retval19 )
				{
					die('Could not enter data: ' . mysql_error());
				}
				
				while($row19 = mysql_fetch_array($retval19, MYSQL_ASSOC))
				{
					$sql20 = "INSERT INTO power_sms_send (message,phone_no,created_by,created_on) VALUES ('". $message ."','". $row19['phoneno'] ."','1000','". $send_on ."')";
					
					$retval20 = mysql_query( $sql20, $conn );
		
					if(! $retval20 )
					{
						die('Could not enter data: ' . mysql_error());
					}
				}				
			}
		}
	}

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
					$sql12 = "SELECT id FROM power_alert_temp WHERE alert_count >= '". $row10['alert_level_count'] ."' AND device_id = '". $device_id ."' AND maindevice_id = '". $maindevice_id ."' AND alert_type_id = '1'";
					
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
						$sql13 = "SELECT * FROM power_user_device WHERE device_id = '". $maindevice_id ."'";

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
						$sql14 = "SELECT * FROM power_location WHERE id = '". $tmp_alert_location_id ."'";

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
						$sql15 = "SELECT * FROM power_user_subdevices WHERE device_id = '". $device_id ."'";

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

	function malfunction_sug_generator($maindevice_id,$device_type,$alert_type_id,$tmp_device_detail,$alert_on,$conn)
	{
		$sql21 = "SELECT malf_sug,user_id FROM power_alert_config WHERE user_id = (SELECT power_users_id FROM power_user_device WHERE device_id = '". $maindevice_id ."')";

		$retval21 = mysql_query( $sql21, $conn );
					
		if(! $retval21 )
		{
			die('Could not get data: ' . mysql_error());
		}
					
		while($row21 = mysql_fetch_array($retval21, MYSQL_ASSOC))
		{
			if($row21['malf_sug'] == 1)
			{
				$sql22 = "SELECT sug_discri FROM power_define_sugestions WHERE alert_type_id = '". $alert_type_id ."' AND device_type = '". $device_type ."'";
						
				$retval22 = mysql_query( $sql22, $conn );
	
				if(! $retval22 )
				{
					die('Could not enter data: ' . mysql_error());
				}
				
				while($row22 = mysql_fetch_array($retval22, MYSQL_ASSOC))
				{
					$tmp_discription = $row22['sug_discri'] . $tmp_device_detail;
					
					$sql23 = "INSERT INTO power_alert_sugestions (maindevice_id,sug_discri,alert_type_id,created_by,created_on) VALUES ('". $maindevice_id ."','". $tmp_discription ."','". $alert_type_id ."','1000','". $alert_on ."')";
					
					$retval23 = mysql_query( $sql23, $conn );
		
					if(! $retval23 )
					{
						die('Could not enter data: ' . mysql_error());
					}
				}				
			}
		}
	}


	function timeexceed_alert_generator($pcon,$maindevice_id,$device_id,$log_on,$device_info,$conn)
	{
		if($pcon > SDIGNORE)
		{		
			$sql24 = "SELECT TIMESTAMPDIFF(SECOND,(SELECT log_on FROM power_spl_minute WHERE log_on < '". $log_on ."' AND pcon < '". SDIGNORE ."' AND device_id = '". $device_id ."' AND maindevice_id  = '". $maindevice_id ."' ORDER BY log_on DESC LIMIT 1),'". $log_on ."') AS diff_time";
							
			$retval24 = mysql_query( $sql24, $conn );
		
			if(! $retval24 )
			{
				die('Could not enter data: ' . mysql_error());
			}
					
			while($row24 = mysql_fetch_array($retval24, MYSQL_ASSOC))
			{
				$tmp_time_diff = $row24['dif_time'];
				
				$tmp_alert_string = "This device exceed it normal execution time. Currently it worked ". gmdate("H:i:s", $tmp_time_diff) ."Hours. Device Info : ". $device_info;
				
				$sql25 = "INSERT INTO power_alert_main(device_id,maindevice_id,alert_discri,alert_priority,alert_type_id,created_by,created_on) VALUES ('". $device_id ."','". $maindevice_id ."','". $tmp_alert_string . "','High','3','1000','". $alert_on ."')";
						
				$retval25 = mysql_query( $sql25, $conn );
				
				if(! $retval25 )
				{
					die('Could not enter data: ' . mysql_error());
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
			die('Could not get data: ' . mysql_error());
		}
					
		while($row26 = mysql_fetch_array($retval26, MYSQL_ASSOC))
		{
			if($row26['time_warn_sms'] == 1)
			{
				$sql27 = "SELECT phoneno FROM power_users WHERE id = '". $row26['user_id'] ."'";
						
				$retval27 = mysql_query( $sql27, $conn );
	
				if(! $retval27 )
				{
					die('Could not enter data: ' . mysql_error());
				}
				
				while($row27 = mysql_fetch_array($retval27, MYSQL_ASSOC))
				{
					$sql28 = "INSERT INTO power_sms_send (message,phone_no,created_by,created_on) VALUES ('". $message ."','". $row27['phoneno'] ."','1000','". $send_on ."')";
					
					$retval28 = mysql_query( $sql28, $conn );
		
					if(! $retval28 )
					{
						die('Could not enter data: ' . mysql_error());
					}
				}				
			}
		}
	}

	
	//-----Maximum Time Period Exceed Alert SMS--------END


?>
