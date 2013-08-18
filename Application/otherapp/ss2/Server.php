<?php

include dirname(__FILE__).'/config.php';

echo "Starting XML Socket Server\n";

// Set time limit to indefinite execution 
set_time_limit (0); 

// Set the ip and port we will listen on 
$address = '192.168.0.171'; 
$port = 81; 
$max_clients = 10; 

// Array that will hold client information 
$client = array(); 

// Create a TCP Stream socket 
$sock = socket_create(AF_INET, SOCK_STREAM, 0); 
// Bind the socket to an address/port 
socket_bind($sock, $address, $port) or die('Could not bind to address'); 
// Start listening for connections 
socket_listen($sock); 

$outval = "";

// Loop continuously 
while (true) { 
    // Setup clients listen socket for reading 
    $read[0] = $sock; 
    for ($i = 0; $i < $max_clients; $i++) 
    { 
        if (isset($client[$i]) && $client[$i]['sock'] != NULL) {
            $read[$i + 1] = $client[$i]['sock'] ; 
  }
    } 
    // Set up a blocking call to socket_select()
 $temp = array();
    $ready = socket_select($read,$temp,$temp,NULL); 
    /* if a new connection is being made add it to the client array */ 
    if (in_array($sock, $read)) { 
        for ($i = 0; $i < $max_clients; $i++) { 
   if (!isset($client[$i])) { 
                $client[$i]['sock'] = socket_accept($sock); 
                break; 
            } 
            elseif ($i == $max_clients - 1) {
                print ("too many clients") ;
   }
        }
        if (--$ready <= 0) {
            continue; 
  }
    } // end if in_array 
     
    // If a client is trying to write - handle it now 
    for ($i = 0; $i < $max_clients; $i++) { // for each client
  if (isset($client[$i])) {
         if (in_array($client[$i]['sock'] , $read)) { 
             $input = socket_read($client[$i]['sock'] , 1024); 
             if ($input == NULL) { 
                 // Zero length string meaning disconnected 
                 unset($client[$i]); 
             } 
             $n = trim($input); 
             if ($input == 'exit') { 
                 // requested disconnect 
                 socket_close($client[$i]['sock']); 
             } elseif ($input) { 
			 
                 // strip white spaces and write back to user 
                 $output = preg_replace("[ \t\n\r]","",$input).chr(0); 
                 socket_write($client[$i]['sock'],$output); 		 
				 
                 $outval .= substr($output, 0, -1);   				 

                    if(preg_match("/<\/frm>/",$output))
                    {
						if (!preg_match("/Socket o/i", $outval))
						{
							storeData($outval);
						}						
	                    //storeData($outval);
                        $outval = "";
                    }
				 
             } 
         } else { 
             // Close the socket 
             socket_close($client[$i]['sock']); 
             unset($client[$i]); 
         }
  }
    } 
} // end while 
// Close the master sockets 
socket_close($sock); 

function printval($output)
{
	$file = 'log.txt';
	// Open the file to get existing content
	$current = file_get_contents($file);
	// Append a new person to the file
	$current .= utf8_decode((string)$output);
	// Write the contents back to the file
	file_put_contents($file, $current);
}


function storeData($requestXML)
{
	$xml = simplexml_load_string($requestXML);
	
	$query1 = "INSERT INTO power_device_powerlog (pcon,log_on,log_user,device_id,mac,created_on,created_by) VALUES ";
	$query2 = "INSERT INTO power_subdevice_powerlog (device_id,pcon,temp,control_status,log_on,log_user,created_on,created_by) VALUES ";
	$query3 = "UPDATE power_subdevice_control SET control_status = CASE ";
	$query4 = "UPDATE power_subdevice_control SET pcon = CASE ";

	$parent1_count = 1;
	$main_pcon = 0; 
	$log_user = "s1"; // XML Request server ID

	$now = new DateTime();
	$created_on = $now->format('Y-m-d H:i:s');
	$created_by = 10; // SysAdmin id is 10
	$log_on; $main_device_id; $mac;

	foreach($xml->children() as $child)
	  {
		if($parent1_count == 1)
		{
			$mac = $child;
		}
		
		if($parent1_count == 2)
		{
			$main_device_id = $child;
		}
		
		if($parent1_count == 3)
		{
			$log_on = $child;
		}
		
		
		$parent2_count=1;
		$val = 0;
		
		
		
		foreach($child->children() as $child1)
		{
			
		
			if($parent2_count==1)
			{
				if(strcmp($child1,"--")) // Check for activated sub_devices
				{
					$val = 1;	
					$query2 .= "(";
				}
			}
			
			if($val) //is a activated sub_device - rebuild query
			{
				
				echo $child1->getName() . "<<".$parent2_count.">>:- " . $child1 . "<br />";
				if($parent2_count == 1)
				{
					$query2 .= "'" . $child1 . "',";
					$query3 .= "WHEN device_id = '" . $child1 . "' THEN '";
					$query4 .= "WHEN device_id = '" . $child1 . "' THEN '";
				}
				
				if($parent2_count == 2)
				{
					if(strcmp($child1,"---"))
					{
                        if(preg_match('/kw/', $child1))
                        {
                            $tempDeviceVal1 = (double)(preg_replace('/kw/','', $child1)) * 1000;

                            $query2 .= "'" . $tempDeviceVal1 . "',";
							$query4 .=  $tempDeviceVal2 . "' ";
						    $main_pcon += $tempDeviceVal1;
                        }
                        else 
                        {
                            $tempDeviceVal2 = (double)(preg_replace('/w/','', $child1));

                            $query2 .= "'" . $tempDeviceVal2 . "',";
							$query4 .=  $tempDeviceVal2 . "' ";
						    $main_pcon += $tempDeviceVal2;
                        }
						
					}
					else
					{
						$query2 .= "'0',";
						$query4 .=  "0' ";
					}
				}
				
				if($parent2_count == 3)
				{
					if(strcmp($child1,"---"))
					{
						$query2 .= "'" . preg_replace('/c/','', $child1) . "',";
					}
					else
					{
						$query2 .= "'0',";
					}
				}
				
				if($parent2_count == 4)
				{
					
					if(strcmp($child1,"fixed"))
					{
					
						if(strcmp($child1,"on"))
						{
							$query2 .= "'0','" . $log_on . "','" .  $log_user . "','" . $created_on . "','" . $created_by  . "'),";
							$query3 .=  "0' ";
						}
						else
						{
							$query2 .= "'1','" . $log_on . "','" .  $log_user . "','" . $created_on . "','" . $created_by  . "'),";
							$query3 .=  "1' ";
						}
					}
					else
					{
						$query2 .= "'3','" . $log_on . "','" .  $log_user . "','" . $created_on . "','" . $created_by  . "'),";
                        $query3 .=  "3' ";
					}
				}
			}
			
			$parent2_count++;
		}

		$parent1_count++;
	  }
	  
	  $query1 .= "('". $main_pcon . "','" . $log_on . "','" .  $log_user . "','" . $main_device_id . "','" . $mac . "','" . $created_on . "','" . $created_by  . "')";
	  $query3 .= "ELSE control_status END";
	  $query4 .= "ELSE pcon END";
	  $query2 = rtrim($query2,',');
	
	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}

	mysql_select_db(DBNAME);
	$retval = mysql_query( $query1, $conn );
	$retval = mysql_query( $query2, $conn );
	
	//if (!preg_match("/Socket o/i", $query3)) 
	//{
		$retval = mysql_query( $query3, $conn );
	//}
	
	//if (!preg_match("/Socket o/i", $query4)) 
	//{
		$retval = mysql_query( $query4, $conn );
	//}
	
	//echo $query3;
	//echo '<br/>';
	//echo $query4;
	if(! $retval )
	{
	  die('Could not enter data: ' . mysql_error());
	}

	mysql_close($conn);

}

?>
