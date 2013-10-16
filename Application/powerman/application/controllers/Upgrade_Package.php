<?php

class Upgrade_Package extends CI_Controller
{
	function index()
	{
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('Upgrade_Package',array('error' => ' ' ));
		}
	}
	
	
	function upgrade()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pack1','current package','trim|required');
		$this->form_validation->set_rules('s_number','Serial No','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
		$this->form_validation->set_rules('pack2','New Package','trim|required');
		$this->form_validation->set_rules('devices','No of Devicess','trim|required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('Upgrade_Package');	
		}
		else 
		{
			$this->load->model('upgrade_package_model');
			if($query = $this->upgrade_package_model->upgrade_packageM())
			{
				redirect('Upgrade_Package');
			}
			
		}
		
	}
	
	
}


