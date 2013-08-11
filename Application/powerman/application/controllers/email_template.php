<?php

class email_template extends CI_Controller
{
	function index()
	{
		$data = array(
		'email' =>  'hasitha@gmail.com',
		'password' => 'fds54DSgrw',
		'email_code' => 'sfgst45fsw54y65'
		);
			
		$this->load->view('email_template',$data);
		
	}
	
	
}