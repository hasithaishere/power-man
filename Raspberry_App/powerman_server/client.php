<?php
	
	// Pull in the NuSOAP code
	include dirname(__FILE__).'/nusoap.php';
	// Create the client instance
	$client = new nusoap_client("http://hasithaonline.capnix.com/sms/send_sms.php");
	// Check for an error
	$err = $client->getError();

	if ($err) 
	{
 	   // Display the error
 	   echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
 	   // At this point, you know the call that follows will fail
	}

	// Call the SOAP method
	$result = $client->call('send_sms', array('phoneno'=>'94716305702','message'=>'This is test 123','code'=>'6f78079088bd1bbc06cc277af294951a'));

	// Check for a fault	
	if ($client->fault) 
	{
    		echo '<h2>Fault</h2><pre>';
    		print_r($result);
    		echo '</pre>';
	}
	 else
	 {
    
		// Check for errors
    		$err = $client->getError();
    		if ($err) 
		{
        		// Display the error
        		echo '<h2>Error</h2><pre>' . $err . '</pre>';
    		}
		 else 
		 {
        		// Display the result
        		echo '<h2>Result</h2><pre>';
        		print_r($result);
    			echo '</pre>';
    		}
	}
?>