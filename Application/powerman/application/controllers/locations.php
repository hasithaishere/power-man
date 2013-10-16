<?php

class Locations extends CI_Controller
{
	function index()
	{
		$this->load->model('locations_model');
		$result = $this->locations_model->get_user_locations();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('locations',$data);
		}
	}
	
	function filterReport()
	{
		$tmp_group = $this->input->post('groupby_rb');
		$tmp_year = $this->input->post('year_select');
		$tmp_month = $this->input->post('month_select');
		$user_id = $this->session->userdata('user_id');
		
		if($tmp_group == 1)
		{
			redirect(base_url()."index.php/power_monitoring/loc_y/".$user_id);
		}
		else 
		{
			if($tmp_group == 2)
			{
				redirect(base_url()."index.php/power_monitoring/loc_m/".$user_id."/".$tmp_year);
			}
			else 
			{
				if($tmp_group == 3)
				{
					redirect(base_url()."index.php/power_monitoring/loc_d/".$user_id."/".$tmp_year."/".$tmp_month);
				}
				else 
				{
					redirect('locations');
				}
			}
		}
		
	}
	
}