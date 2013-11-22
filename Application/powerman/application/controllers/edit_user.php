<?php

class edit_user extends CI_Controller
{
	function index($user_id)
	{
		$user_id = $this->encrypt_data->decode($user_id);
		
		$this->load->model('create_user_model');
		$result_packages = $this->create_user_model->get_packages();
		$data['packages'] = $result_packages;
		
		$this->load->model('edit_user_model');
		$result_userdata = $this->edit_user_model->get_user_data($user_id);
		$data['userdata'] = $result_userdata;
		
		$data['success_update'] = 0;
		$data['success_update_msg'] = "";
		
		$data['success_updatepass'] = 0;
		$data['success_updatepass_msg'] = "";

		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('edit_user',$data);
		}
	}
	
	function update_user_details($user_id)
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
		//$this->form_validation->set_rules('pass1','Password 1','trim|required|min_length[8]|max_length[32]');
		//$this->form_validation->set_rules('pass2','Password 2','trim|required|min_length[8]|max_length[32]|matches[pass1]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('create_user_model');
			$result_packages = $this->create_user_model->get_packages();
			$data['packages'] = $result_packages;
			
			$this->load->model('edit_user_model');
			$result_userdata = $this->edit_user_model->get_user_data($user_id);
			$data['userdata'] = $result_userdata;
			
			$data['success_update'] = 0;
			$data['success_update_msg'] = "";
			
			$data['success_updatepass'] = 0;
			$data['success_updatepass_msg'] = "";
			
			$this->load->view('edit_user',$data);	
		}
		else 
		{
			$this->load->model('edit_user_model');
			if($query = $this->edit_user_model->update_user_details($user_id))
			{
				$this->session->set_flashdata('update_token', time());
          		redirect('edit_user/success/'.$this->encrypt_data->encode($user_id));
			}
		}
		
	}

	function success($user_id)
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect("Users_details");
        }
		
		$user_id = $this->encrypt_data->decode($user_id);
		
		$this->load->model('create_user_model');
		$result_packages = $this->create_user_model->get_packages();
		$data['packages'] = $result_packages;
		
		$this->load->model('edit_user_model');
		$result_userdata = $this->edit_user_model->get_user_data($user_id);
		$data['userdata'] = $result_userdata;
		
		$data['success_update'] = 1;
		$data['success_update_msg'] = "User Successfully updated.";

		$data['success_updatepass'] = 0;
		$data['success_updatepass_msg'] = "";

		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('edit_user',$data);
		}
	}

	function update_user_password($user_id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pass1','Password 1','trim|required|min_length[8]|max_length[32]');
		$this->form_validation->set_rules('pass2','Password 2','trim|required|min_length[8]|max_length[32]|matches[pass1]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('create_user_model');
			$result_packages = $this->create_user_model->get_packages();
			$data['packages'] = $result_packages;
			
			$this->load->model('edit_user_model');
			$result_userdata = $this->edit_user_model->get_user_data($user_id);
			$data['userdata'] = $result_userdata;
			
			$data['success_update'] = 0;
			$data['success_update_msg'] = "";
			
			$data['success_updatepass'] = 0;
			$data['success_updatepass_msg'] = "";
			
			$this->load->view('edit_user',$data);	
		}
		else 
		{
			$this->load->model('edit_user_model');
			if($query = $this->edit_user_model->update_user_password($user_id))
			{
				$this->session->set_flashdata('update_token', time());
          		redirect('edit_user/success_password/'.$this->encrypt_data->encode($user_id));
			}
		}
		
	}

	function success_password($user_id)
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect("Users_details");
        }
		
		$user_id = $this->encrypt_data->decode($user_id);
		
		$this->load->model('create_user_model');
		$result_packages = $this->create_user_model->get_packages();
		$data['packages'] = $result_packages;
		
		$this->load->model('edit_user_model');
		$result_userdata = $this->edit_user_model->get_user_data($user_id);
		$data['userdata'] = $result_userdata;
		
		$data['success_update'] = 0;
		$data['success_update_msg'] = "";
		
		$data['success_updatepass'] = 1;
		$data['success_updatepass_msg'] = "Password Successfully Updated.";

		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('edit_user',$data);
		}
	}
	
}