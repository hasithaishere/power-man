<?php

class power_monitoring extends CI_Controller
{
	function index()
	{
		$this->load->view('power_monitoring');
	}
	
	function loc_y($user_id)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->loc_y_data($user_id);
		
		$this->load->view('power_monitoring',$data);
		
	}
	
}