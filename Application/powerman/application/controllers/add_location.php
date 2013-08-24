<?php

class add_location extends CI_Controller
{
	function index()
	{
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('add_location');
			
		}
		
	}	
/*	
	function do_upload()
	{
		$config['upload_path'] = './upload_path/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->add_location->do_upload())
		{
			$error = array('error' => $this->add_location->display_errors());

			$this->load->view('add_location', $error);
		}
		else
		{
			$data = array('upload_data' => $this->add_location->data());

			$this->load->view('upload_success', $data);
		}
	} */
	
	function add_new_location()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('location_name','First Name','trim|required');
		$this->form_validation->set_rules('sub_name','Sub Name','trim|required');
		$this->form_validation->set_rules('location_description','Description','trim|required');
		//$this->form_validation->set_rules('image', 'Image Upload', 'callback__image_upload');
		
		
				
		if($this->form_validation->run() == FALSE /*&& ! $this->add_location->do_upload()*/)
		{
			$this->load->view('add_location');
			
			
		}
		else 
		{
			
			$this->load->model('add_location_model');
			if($query = $this->add_location_model->add_location())
			{
				
				redirect('locations');
			}	
		}
		
	}
	
}