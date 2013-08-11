<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sms_sender {

    public function send_sms($data)
    {
		// get CodeIgniter instance
        $CI = &get_instance();
 
        // get config file
        $CI->config->load('sms', TRUE);
		
		$server_url = $CI->config->item('sms_server_url')."?USER=".$CI->config->item('sms_username')."&PWD=".$CI->config->item('sms_password')."&NUM=".$data['phone_no']."&MSG=".urlencode($data['message']);

/* TEMPORARY SHUT DOWN DUE TO CURL ERRORS
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
 		return TRUE;
    }
	
	public function send_mail($data)
	{
		//print_r($data);
		//$this->load->library('email',$config);
		$CI = &get_instance();
		$CI->email->set_newline("\r\n");
		//$data = array('from'=>'ruslpowerman@gmail.com','to'=>'hasitha.hpmax@gmail.com','subject'=>'test mail gfgfdhhgd','message'=>'hi hasitha fgfdgfgs');
		
		$CI->email->from($data['from']);
		$CI->email->to($data['to']);
		$CI->email->subject($data['subject']);
		$CI->email->message($data['message']);
		
		if($CI->email->send())
		{
			echo "send it";
		}
		else 
		{
			show_error($CI->email->print_debugger());	
		}
	}
}