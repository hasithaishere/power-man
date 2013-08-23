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
	
	function add_new_location()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('location_name','First Name','trim|required');
		$this->form_validation->set_rules('sub_name','Sub Name','trim|required');
		$this->form_validation->set_rules('location_description','Description','trim|required');
		$this->form_validation->set_rules('image', 'Image Upload', 'callback__image_upload');
		
		 // Start Upload Picture
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = ''.$_SERVER['DOCUMENT_ROOT'].'/upload_path/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5000';
            $config['max_width']  = '2000';
            $config['max_height']  = '2000';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

           if ($this->upload->do_upload('image'))
                {
                    $data = array('upload_data' => $this->upload->data());
     
     return true;
                }
                else
                {
                    $imageerrors = $this->upload->display_errors();
    				$this->form_validation->set_message('_image_upload', $imageerrors);
     
     return false;
                }

        }

    
		
		
				
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('add_location');	
		}
		else 
		{
			$this->load->model('add_location_model');
			if($query = $this->add_location_model->add_location())
			{
				$this->load->view('locations');
			}
		}
		
	}
	
}