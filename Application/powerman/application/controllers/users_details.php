<?php

class Users_details extends CI_Controller
{
	function index()
	{
		$this->load->model('users_details_model');
		$result = $this->users_details_model->get_allusers();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('users_details',$data);
		}
	}	
}