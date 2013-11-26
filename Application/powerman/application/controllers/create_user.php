<?php

class create_user extends CI_Controller
{
	function index()
	{
		$this->load->model('create_user_model');
		$result_packages = $this->create_user_model->get_packages();
		$data['packages'] = $result_packages;
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('create_user',$data);
		}
	}
	
	function add_new_user()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('fname','First Name','trim|required');
		$this->form_validation->set_rules('lname','LastName','trim|required');
		$this->form_validation->set_rules('address1','Address Field 1','trim|required');
		$this->form_validation->set_rules('address2','Address Field 2','trim|required');
		$this->form_validation->set_rules('city','City','trim|required');
		$this->form_validation->set_rules('province','Province','trim|required');
		$this->form_validation->set_rules('zipcode','Zip Code','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('pass1','Password 1','trim|required|min_length[8]|max_length[32]');
		$this->form_validation->set_rules('pass2','Password 2','trim|required|min_length[8]|max_length[32]|matches[pass1]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('create_user');	
		}
		else 
		{
			$this->load->model('create_user_model');
			if($query = $this->create_user_model->add_user())
			{
				$this->load->view('create_user');
				
			}
			
		}
		
	}

	function is_unique_email()
	{
		$this->load->model('create_user_model');
		
		//$data = array('email' => $this->input->post('email'));
		
		$result = $this->create_user_model->is_unique_email();
		
	}
	
	
}