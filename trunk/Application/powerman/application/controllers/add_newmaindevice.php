<?php

class add_newmaindevice extends CI_Controller
{
	function index()
	{
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->model('add_newMainDevice_model');
			$result = $this->add_newMainDevice_model->get_dropdown_list();	
			$data = array('content'=>$result);
			
			$this->load->view('add_newMainDevice',$data);
			
		}
		
	}	

	function add_new_maindevice()
	{
		
			
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('main_device_title','Device Title','trim|required');
		$this->form_validation->set_rules('main_device_id','Device ID','trim|required');
		$this->form_validation->set_rules('main_device_serialno','Serial No','trim|required');
		//$this->form_validation->set_rules('main_device_type2','Device Type','trim|required');
		$this->form_validation->set_rules('main_device_description','Device Description','trim|required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('add_newMainDevice');	
		}
		else 
		{
			$this->load->model('add_newMainDevice_model');
			if($query = $this->add_newMainDevice_model->add_new_maindevice())
			{
				
				redirect('main_devices');
			}
			//$data['results']=$this->add_newMainDevice_model->get_dropdown_list();
			//$this->load->view('add_newMainDevice',$data);
			
		}
		
	}

	
}