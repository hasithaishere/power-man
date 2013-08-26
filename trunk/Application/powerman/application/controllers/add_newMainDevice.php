<?php

class add_newMainDevice extends CI_Controller
{
	function index()
	{
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('add_newMainDevice');
			
		}
		
	}	



	
}