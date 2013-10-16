<?php

class add_newPackage extends CI_Controller
{
	function index()
	{
	
		
>>>>>>> .r83
		if(!($this->session->userdata('is_logged_in')))
		{

			$this->load->view('access_denied');
			//$this->load->view('add_newPackage');
>>>>>>> .r83
		}
		else 
		{

			$this->load->view('add_newPackage'); 
			//$this->load->view('access_denied');
>>>>>>> .r83
		}
		
				
	}
	
	function add_new_package()
	{
	$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nPackage','Package Name','trim|required');
		$this->form_validation->set_rules('details','Description','trim|required');
		$this->form_validation->set_rules('mDevices','Main Devices','trim|required|numeric|max_length[11]');
		$this->form_validation->set_rules('sDevices','Sub devices','trim|required|numeric|max_length[11]');
		$this->form_validation->set_rules('smsAmount','SMS Amount','trim|required|numeric|max_length[11]');
		$this->form_validation->set_rules('duration','Duration','trim|required|numeric|max_length[11]');
		$this->form_validation->set_rules('eDuration"','Expire duration','regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('add_newPackage');	
		}
		else
		{
		$this->load->model('add_newPackage_model');

			if($query = $this->add_newPackage_model->add_package())
			{
				$this->load->view('add_newPackage');
				
			}
			
		}
	
	}
}
