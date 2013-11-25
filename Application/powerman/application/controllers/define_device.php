<?php

class define_device extends CI_Controller
{
	
	function index()
	{
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$data['success_add_definedevice'] = 0;
			$data['success_add_definedevice_msg'] = "";
			$data['error'] = 0;
			$data['error_msg'] = "";
			//$this->load->view('add_location');
			$this->load->view('define_device', $data);
		}
		
	}	
	function do_upload()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('device_name','Device Name','trim|required');
		$this->form_validation->set_rules('device_description','Device Description','trim|required');
		$this->form_validation->set_rules('device_max_volt','Device Maximum Voltage','trim|required');
		$this->form_validation->set_rules('device_max_time','Device Maximum Usage Time','trim|required');
		$this->form_validation->set_rules('alert_level_count','Maximum Alert level','trim|required');
		$this->form_validation->set_rules('alert_level_precentage','Maximum Alert level Precentage','trim|required');
		
		$this->form_validation->set_rules('image', 'Image Upload', 'callback__image_upload');
		
		$config['upload_path'] = './img/define_device/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		
		if (  !$this->form_validation->run() || !$this->upload->do_upload() )
		{
			$data['success_add_definedevice'] = 0;
			$data['success_add_definedevice_msg'] = "";
			//$data['error'] = 0;
			//if(!$this->upload->do_upload())
			//{
				$data['error'] = 1;
				$data['error_msg'] = $this->upload->display_errors();
			//}
						
			$this->load->view('define_device', $data);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$image_data = $this->upload->data();
			$data['image_name'] = $image_data['file_name'];

			$this->load->model('add_definedevice_model');
			if($query = $this->add_definedevice_model->add_definedevice($data))
			{
				$this->session->set_flashdata('update_token', time());
				redirect('define_device/success');
			}
			//$data = array('upload_data' => $this->add_location->data());

			//$this->load->view('upload_success', $data);
		}
	}


	function success()
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect("define_device");
        }
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$data['success_add_definedevice'] = 1;
			$data['success_add_definedevice_msg'] = "Device successfully added.";
			$data['error'] = 0;
			$data['error_msg'] = 0;
			$this->load->view('define_device',$data);
			
		}
		
	}
	
}