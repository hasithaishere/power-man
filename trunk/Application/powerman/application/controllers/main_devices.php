<?php

class Main_devices extends CI_Controller
{
	function index($location_id)
	{
		$location_id = $this->encrypt_data->decode($location_id);
		
		$this->load->model('main_devices_model');
		$result = $this->main_devices_model->get_maindevices($location_id);	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('main_devices',$data);
		}
	}
	
}