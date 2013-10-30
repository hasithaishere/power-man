<?php

class schedule extends CI_Controller
{
	function index()
	{
	
		

		if(!($this->session->userdata('is_logged_in')))
		{

			$this->load->view('access_denied');
			//$this->load->view('add_newPackage');

		}
		else 
		{

			$this->load->view('schedule'); 
			//$this->load->view('access_denied');

		}
		
				
	}
	
	
}
