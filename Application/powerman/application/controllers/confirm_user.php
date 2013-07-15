<?php

class confirm_user extends CI_Controller
{
	function index()
	{
		$this->load->view('confirm_user');
	}
	
	function change_password()
	{
		$this->load->model('confirm_user_model');
		
		$data = array('password' => md5($this->input->post('password')));
		
		$this->confirm_user_model->update_password($data);
	}
}