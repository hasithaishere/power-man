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
	
	function delete_user($user_id)
	{
		$this->load->model('users_details_model');
		$this->users_details_model->delete_user($user_id);
	}
	
	function change_state_user($user_id,$admin_state)
	{
		$this->load->model('users_details_model');
		$this->users_details_model->change_state_user($user_id,$admin_state);
	}
	
}