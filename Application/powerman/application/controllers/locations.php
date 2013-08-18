<?php

class Locations extends CI_Controller
{
	function index()
	{
		$this->load->model('locations_model');
		$result = $this->locations_model->get_user_locations();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('locations',$data);
		}
	}	
}