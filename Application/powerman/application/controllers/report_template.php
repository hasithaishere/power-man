<?php

class report_template extends CI_Controller
{
	function index()
	{/*
		$data = array(
		'email' =>  'hasitha@gmail.com',
		'password' => 'fds54DSgrw',
		'email_code' => 'sfgst45fsw54y65'
		);
			*/
		$this->load->view('report_template'/*,$data*/);
		
	}
	
	function create_it()
	{
		$output = shell_exec("wkhtmltopdf http://powerman.hp/report_template /home/hasitha/projects/test123.pdf");
		$output = shell_exec("chmod -R 777 /home/hasitha/projects/test123.pdf");
		echo $output;

	}
	
	
}