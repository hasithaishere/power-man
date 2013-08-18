<?php

class main_panel extends CI_Controller
{
	function index()
	{
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{	
			$this->load->view('main_panel');
		}	
	}
}