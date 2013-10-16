<?php

class suggestions extends CI_Controller
{
	function index()
	{
		$this->load->model('suggestions_model');
		$result = $this->suggestions_model->give_user_suggestions();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('suggestions',$data);
		}
	}	
}