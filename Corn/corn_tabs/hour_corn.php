<?php

include dirname(__FILE__).'/config.php';

	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(DBNAME);
	
	//------------------------------------FILL power_spl_hour table temporily-------------------------------------

	date_default_timezone_set("Asia/Colombo");
	$dateNew = mktime(date('H'),'00','00',date('m'),date('d'),date('Y'));
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
		$sql2 = "SELECT device_id FROM power_user_subdevices WHERE maindevice_id = '" . $row1['device_id'] . "'";

		$retval2 = mysql_query( $sql2, $conn );
		
		if(! $retval2 )
		{
			die('Could not get data: ' . mysql_error());
		}
		
		while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC))
		{

			$sql3 = "SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL MINUTE(log_on) minute) AS new_logon,device_id,maindevice_id FROM power_spl_minute WHERE device_id = '" . $row2['device_id'] . "' AND maindevice_id = '" . $row1['device_id'] . "' AND log_on < '" . $main_time . "' AND check_status = '0' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on) ORDER BY log_on ASC";

			$retval3 = mysql_query( $sql3, $conn );
			
			if(! $retval3 )
			{
				die('Could not get data: ' . mysql_error());
			}
			
			$query_splm = "INSERT INTO power_spl_hour (pcon,log_on,device_id,maindevice_id,created_on) VALUES ";
			//echo $sql3. "<br><hr><br>";
			
			$has_pconrows = FALSE;
			
			while($row3 = mysql_fetch_array($retval3, MYSQL_ASSOC))
			{
				$query_splm .= "('" . $row3['totalpcon'] . "','" . $row3['new_logon'] . "','" . $row2['device_id'] . "','" . $row1['device_id'] . "','" . $current_logtime ."'),";
				$has_pconrows = TRUE;
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
					$query_splm_ack = "UPDATE power_spl_minute SET check_status = '1' WHERE device_id = '" . $row2['device_id'] . "' AND maindevice_id = '" . $row1['device_id'] . "' AND log_on < '" . $main_time . "'";
					
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
	
	//--------------------------------------------------------------------------------------------------------
	
	//----------------------------------- FILL power_splh_mainlog table --------------------------------------
	
	$sql5 = "SELECT log_on FROM power_spl_hour WHERE check_status = '0' GROUP BY log_on ORDER BY log_on ASC";
	$retval5 = mysql_query( $sql5, $conn );

	if(! $retval5 )
	{
		die('Could not get data: ' . mysql_error());
	}
				
	while($row5 = mysql_fetch_array($retval5, MYSQL_ASSOC))
	{
		$sql6 = "SELECT maindevice_id FROM power_spl_hour WHERE check_status = '0' AND log_on = '" . $row5['log_on'] . "' GROUP BY maindevice_id ORDER BY log_on ASC";
		
		$retval6 = mysql_query( $sql6, $conn );

		if(! $retval6 )
		{
			die('Could not get data: ' . mysql_error());
		}
					
		while($row6 = mysql_fetch_array($retval6, MYSQL_ASSOC))
		{
			$sql7 = "SELECT pcon,device_id FROM power_spl_hour WHERE maindevice_id = '" . $row6['maindevice_id'] . "' AND log_on = '" . $row5['log_on'] . "' ORDER BY log_on ASC";
			
			$retval7 = mysql_query( $sql7, $conn );
	
			if(! $retval7 )
			{
				die('Could not get data: ' . mysql_error());
			}
			
			$tmp_arr = null;
			$tmp_tpcon = 0.0;
			
			while($row7 = mysql_fetch_array($retval7, MYSQL_ASSOC))
			{
				$tmp_arr[] = $row7;
				$tmp_tpcon += floatval($row7['pcon']);
				//echo $row7['pcon']."<br>";
				//echo $row7['device_id']."<br>";
			}
			
			/*foreach($tmp_arr as $row_tmp)
			{
				foreach($row_tmp as $k=>$v)
				{
					echo $k . "----". $v. "<br>";
				}
			}*/
			
			$serialized = mysql_real_escape_string(serialize($tmp_arr));
			
			$query_mainlog = "INSERT INTO power_splh_mainlog(total_pcon,log_data,log_on,maindevice_id,created_on) VALUES ('". $tmp_tpcon ."','". $serialized ."','". $row5['log_on'] ."','". $row6['maindevice_id'] ."','". $current_logtime ."')";
			
			$retval8 = mysql_query( $query_mainlog, $conn );
	
			if(! $retval8 )
			{
				die('Could not enter data: ' . mysql_error());
			}
			else 
			{
				$query_mainlog_ack = "UPDATE power_spl_hour SET check_status = '1' WHERE log_on = '". $row5['log_on'] ."' AND maindevice_id = '". $row6['maindevice_id'] ."'";
			
				$retval9 = mysql_query( $query_mainlog_ack, $conn );
		
				if(! $retval9 )
				{
					die('Could not enter data: ' . mysql_error());
				}
			}
			
			unset($tmp_arr);
			
		}
	}
	
	
	
	//SELECT SUM(pcon) FROM `power_spl_hour` GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on) ORDER BY log_on ASC
	
	//--------------------------------------------------------------------------------------------------------
	
	mysql_close($conn);
	
//Queries
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '53717869' AND maindevice_id = 'SES001' AND log_on < DATE_SUB(NOW(), INTERVAL 2 minute)GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog WHERE device_id = '53717869' AND maindevice_id = 'SES001' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on) ORDER BY log_on ASC
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) AS new_logon,device_id,maindevice_id FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
//SELECT SUM(pcon) AS totalpcon,DATE_SUB(log_on, INTERVAL SECOND(log_on) second) FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
//SELECT SUM(pcon) AS totalpcon,log_on FROM power_subdevice_powerlog GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on),HOUR(log_on),MINUTE(log_on)
?>