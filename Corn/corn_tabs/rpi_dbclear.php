<?php

include dirname(__FILE__).'/rpi_config.php';

	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(DBNAME);
	
	date_default_timezone_set("Asia/Colombo");
	$dateNew = mktime(date('H'),'00','00',date('m'),date('d'),date('Y'));
	
	$query1 = "DELETE FROM power_subdevice_powerlog WHERE log_on < (NOW() - INTERVAL 5 MINUTE)";
    $query2 = "DELETE FROM power_device_powerlog WHERE log_on < (NOW() - INTERVAL 5 MINUTE)";
    $query3 = "DELETE FROM power_send_out WHERE log_on < (NOW() - INTERVAL 5 MINUTE) AND send_status = '1'";
	
	$returnval = mysql_query( $query1, $conn );
	$returnval = mysql_query( $query2, $conn );
	$returnval = mysql_query( $query3, $conn );
	
	if(! $returnval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	mysql_close($conn);
	
?>