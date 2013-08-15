<?php

class Main_devices extends CI_Controller
{
	function index($location_id)
	{
		$this->load->model('main_devices_model');
		$result = $this->main_devices_model->get_maindevices($location_id);	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		$this->load->view('main_devices',$data);
	}
	
}