<?php

class signout extends CI_Controller
{
	function index()
	{
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('adminstatus');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('registerstatus');
		$this->session->unset_userdata('change_pass');
		$this->session->unset_userdata('validate_email');
		$this->session->unset_userdata('validate_phone');
		$this->session->unset_userdata('is_logged_in');
		$this->session->sess_destroy();
		
		redirect('login');
		
	}
}
