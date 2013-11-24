<?php

class schedule extends CI_Controller
{
	function index($device_id,$maindevice_id)
	{
	
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
			//$this->load->view('add_newPackage');
		}
		else 
		{
			$this->load->model('schedule_model');
			$result = $this->schedule_model->get_schedules($device_id,$maindevice_id);	
			
			$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
			
			$this->load->view('schedule',$data); 
			//$this->load->view('access_denied');
		}
		
		
		
		
				
	}
	
	
}
