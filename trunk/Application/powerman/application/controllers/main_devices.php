<?php

class Main_devices extends CI_Controller
{
	function index($location_id)
	{
		$location_id = $this->encrypt_data->decode($location_id);
		
		$this->load->model('main_devices_model');
		$result = $this->main_devices_model->get_maindevices($location_id);	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'),'location_id'=>$location_id);
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('main_devices',$data);
		}
	}
	
	function filterReport($location_id)
	{
		$tmp_group = $this->input->post('groupby_rb');
		$tmp_year = $this->input->post('year_select');
		$tmp_month = $this->input->post('month_select');
		$user_id = $this->session->userdata('user_id');
		
		if($tmp_group == 1)
		{
			redirect(base_url()."index.php/power_monitoring/md_y/".$user_id."/".$location_id);
		}
		else 
		{
			if($tmp_group == 2)
			{
				redirect(base_url()."index.php/power_monitoring/md_m/".$user_id."/".$location_id."/".$tmp_year);
			}
			else 
			{
				if($tmp_group == 3)
				{
					redirect(base_url()."index.php/power_monitoring/md_d/".$user_id."/".$location_id."/".$tmp_year."/".$tmp_month);
				}
				else 
				{
					redirect('locations');
				}
			}
		}
		
	}
	
}