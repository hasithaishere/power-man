<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendemail'))
{
    function sendemail($data)
    {		
    	//$this->load->library('email',$config);
		//$this->email->set_newline("\r\n");
		
		$this->email->from($data['from']);
		$this->email->to($data['to']);
		$this->email->subject($data['subject']);
		$this->email->message($data['message']);
		
		if($this->email->send())
		{
			return TRUE;
		}
		else 
		{
			show_error($this->email->print_debugger());	
		}
		
	    
    } 
}