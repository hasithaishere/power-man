<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sms_sender {

    public function send_sms($data)
    {
		// get CodeIgniter instance
        $CI = &get_instance();
 
        // get config file
        $CI->config->load('sms', TRUE);
		
		//$this->load->libraries('error_user');
		$client = new nusoap_client($CI->config->item('sms_server_url'));
		// Check for an error
		$err = $client->getError();
	
		if ($err) 
		{
	 	   // Display the error
	 	   //echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	 	   // At this point, you know the call that follows will fail
	 	   
	 	   return FALSE;
	 	   
		}
	
		// Call the SOAP method
		$result = $client->call('send_sms', array('phoneno'=>$data['phone_no'],'message'=>$data['message'],'code'=>$CI->config->item('sms_code')));
	
		// Check for a fault	
		if ($client->fault) 
		{
	    		//echo '<h2>Fault</h2><pre>';
	    		//print_r($result);
	    		//echo '</pre>';
				return FALSE;
		}
		 else
		 {
	    
			// Check for errors
	    		$err = $client->getError();
	    		if ($err) 
				{
	        		// Display the error
	        		//echo '<h2>Error</h2><pre>' . $err . '</pre>';
	        		return FALSE;
	    		}
				else 
				{
	        		// Display the result
	        		//echo '<h2>Result</h2><pre>';
	        		//print_r($result);
	    			//echo '</pre>';
					return TRUE;
				}
		}
		















/* TEMPORARY SHUT DOWN DUE TO CURL ERRORS Commented
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HTTP/1.1 200 OK', 'Status: 200 Success'));
        curl_setopt($ch, CURLOPT_URL, $server_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        if (FALSE == $output){
            echo curl_error($ch);
            return FALSE;
        }else
            return TRUE;

 */
 		//return TRUE;
    }

}