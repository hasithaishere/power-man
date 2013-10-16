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
	
	function loc_m($user_id,$year)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->loc_m_data($user_id,$year);
		
		$this->load->view('power_monitoring',$data);
		
	}
	
	function loc_d($user_id,$year,$month)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->loc_d_data($user_id,$year,$month);
		
		$this->load->view('power_monitoring',$data);
		
	}
	
	function md_y($user_id,$location_id)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->md_y_data($user_id,$location_id);
		
		$this->load->view('power_monitoring',$data);
		
	}
	
	function md_m($user_id,$location_id,$year)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->md_m_data($user_id,$location_id,$year);
		
		$this->load->view('power_monitoring',$data);
	}
	
	function md_d($user_id,$location_id,$year,$month)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->md_d_data($user_id,$location_id,$year,$month);
		
		$this->load->view('power_monitoring',$data);
	}
	
	function sd_y($user_id,$maindevice_id)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->sd_y_data($user_id,$maindevice_id);
		
		$this->load->view('power_monitoring',$data);
	}
	
	function sd_m($user_id,$maindevice_id,$year)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->sd_m_data($user_id,$maindevice_id,$year);
		
		$this->load->view('power_monitoring',$data);
	}
	
	function sd_d($user_id,$maindevice_id,$year,$month)
	{
		$this->load->model('power_monitoring_model');
		$data = $this->power_monitoring_model->sd_d_data($user_id,$maindevice_id,$year,$month);
		
		$this->load->view('power_monitoring',$data);
	}
	
}