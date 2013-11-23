<?php

class add_newsubdevice extends CI_Controller
{
	function index($maindevice_id)
	{
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->model('add_newsubdevice_model');
			$result = $this->add_newsubdevice_model->get_dropdown_devicetypelist();
			$result2 = $this->add_newsubdevice_model->get_dropdown_newdevicelist();
			$result3 = $this->add_newsubdevice_model->get_dropdown_homedevicelist();
			$data = array('content'=>$result,'newdevice'=>$result2,'content2'=>$result3,'maindevice_id'=>$maindevice_id);
			
			$data['success_addsubdevice'] = 0;
			$data['success_addsubdevice_msg'] = "";
			
			$this->load->view('add_newsubdevice',$data);
			
		}
		
	}	

	function add_subdevice($maindevice_id)
	{			
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('main_device_title','Device Title','trim|required');
		$this->form_validation->set_rules('main_device_id','Device ID','trim|required');
		$this->form_validation->set_rules('main_device_serialno','Serial No','trim|required');
		//$this->form_validation->set_rules('main_device_type2','Device Type','trim|required');
		$this->form_validation->set_rules('main_device_description','Device Description','trim|required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('add_newmaindevice_model');
			$result = $this->add_newmaindevice_model->get_dropdown_list();	
			$data = array('content'=>$result,'location_id'=>$location_id);
			
			$data['success_adddevice'] = 0;
			$data['success_adddevice_msg'] = "";
			
			$this->load->view('add_newmaindevice',$data);
		}
		else 
		{
			$this->load->model('add_newmaindevice_model');
			if($query = $this->add_newmaindevice_model->add_new_maindevice($location_id))
			{
				$this->session->set_flashdata('update_token', time());
				redirect('add_newmaindevice/success/'.$location_id);
			}
			
			//$data['results']=$this->add_newMainDevice_model->get_dropdown_list();
			//$this->load->view('add_newMainDevice',$data);
			
		}
		
	}

	function success($location_id)
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect("locations");
        }
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->model('add_newmaindevice_model');
			$result = $this->add_newmaindevice_model->get_dropdown_list();	
			$data = array('content'=>$result,'location_id'=>$location_id);
			
			$data['success_adddevice'] = 1;
			$data['success_adddevice_msg'] = "Main device successfully added.";
			
			$this->load->view('add_newmaindevice',$data);
			
		}
		
	}

	
}