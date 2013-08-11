<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class email_sender {

	public function send_email($data)
	{
		$CI = &get_instance();
		$CI->email->set_newline("\r\n");
		
		$mail_config = array (
                  'mailtype' => 'html',
                  'charset'  => 'utf-8',
                  'priority' => '1'
                   );
        $CI->email->initialize($mail_config);
		
		$CI->email->from($data['from'],$data['sender']);
		$CI->email->to($data['to'],$data['receiver']);
		$CI->email->subject($data['subject']);
		$CI->email->message($data['message']);
		
		if($CI->email->send())
		{
			return TRUE;
		}
		else 
		{
			show_error($CI->email->print_debugger());	
		}
	}
}