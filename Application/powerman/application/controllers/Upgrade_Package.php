<?php

class Upgrade_Package extends CI_Controller
{
	function index()
	{
		$this->load->model('upgrade_package_model');

		$new_packages = $this->upgrade_package_model->add_package();
		
		$data['packages'] = $new_packages;
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('Upgrade_Package');
		}
	}
	
	
	
}
