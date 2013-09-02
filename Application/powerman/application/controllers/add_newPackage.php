<?php

class add_newPackage extends CI_Controller
{
	function index()
	{
	
		$this->load->model('add_newPackage_model');

		$new_packages = $this->add_newPackage_model->add_package();
		$data['packages'] = $new_packages;
		if(!($this->session->userdata('is_logged_in')))
		{
			//$this->load->view('access_denied');
			$this->load->view('add_newPackage');
		}
		else 
		{
			$this->load->view('add_newPackage',$data);
		}
	}
	
	
}
