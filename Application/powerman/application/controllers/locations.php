<?php

class Locations extends CI_Controller
{
	function index()
	{
		$this->load->model('locations_model');
		$result = $this->locations_model->get_user_locations();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		$this->load->view('locations',$data);
	}	
}