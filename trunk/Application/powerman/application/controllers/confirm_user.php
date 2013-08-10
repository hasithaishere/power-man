<?php

class confirm_user extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function index()
	{//#Changepassword #Confirmemail #Confirmtelno #  
		$change_pass = $this->session->userdata('change_pass');
		$validate_email = $this->session->userdata('validate_email');
		$validate_phone = $this->session->userdata('validate_phone');
		
		$data['link1'] = '#';
		$data['link2'] = '#';
		$data['link3'] = '#';
		//die($change_pass."".$validate_email."".$validate_phone);
		if($change_pass == 0)
		{
			$data['link1'] = '#Changepassword';
			
			if($validate_email == 0)
			{
				$data['link2'] = '#Confirmemail';
				
				if($validate_phone == 0)
				{
					$data['link3'] = '#Confirmtelno';
				}
				else
				{
					$data['link3'] = '#';
				}
				
			}
			else
			{
				if($validate_phone == 0)
				{
					$data['link2'] = '#Confirmtelno';
				}
				else
				{
					$data['link2'] = '#';
				}
			}
		}
		else
		{
			if($validate_email == 0)
			{
				$data['link1'] = '#Confirmemail';
				
				if($validate_phone == 0)
				{
					$data['link2'] = '#Confirmtelno';
				}
				else
				{
					$data['link2'] = '#';
				}
			}
			else
			{
				if($validate_phone == 0)
				{
					$data['link1'] = '#Confirmtelno';
				}
				else
				{
					redirect('main_panel');
				}
			}
		}
	
		$this->load->view('confirm_user',$data);
	}
	
	function change_password()
	{
		$this->load->model('confirm_user_model');
		
		$data = array('password' => md5($this->input->post('password')),'change_pass'=> $this->input->post('change_pass'));
		
		$result = $this->confirm_user_model->update_password($data);
	}
	
	function validate_email()
	{
		$this->load->model('confirm_user_model');
		
		$data = array('email_code' => $this->input->post('email_code'),'validate_email'=> $this->input->post('validate_email'));
		
		$result = $this->confirm_user_model->validate_email($data);
		
	}
	
	function validate_phone()
	{
		$this->load->model('confirm_user_model');
		
		$data = array('phone_code' => $this->input->post('phone_code'),'validate_phone'=> $this->input->post('validate_phone'));
		
		$result = $this->confirm_user_model->validate_phone($data);
		
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		
		if(!isset($is_logged_in)||$is_logged_in != TRUE)
		{
			redirect('access_denied');
		}
		
	}
	
	function send_sms_code()
	{
		$this->load->model('confirm_user_model');
		$this->confirm_user_model->get_userdata();
	}
	
	function checked_confirm_user()
	{
		$this->load->model('confirm_user_model');
		$result = $this->confirm_user_model->checked_confirm_user();
		
	}
	
}