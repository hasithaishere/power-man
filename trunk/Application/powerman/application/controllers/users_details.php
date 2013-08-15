<?php

class Users_details extends CI_Controller
{
	function index()
	{
		$this->load->model('users_details_model');
		$result = $this->users_details_model->get_allusers();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		$this->load->view('users_details',$data);
	}	
}