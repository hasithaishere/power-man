<?php

class forget_password extends CI_Controller
{
	
	function index()
	{	
		$data['error_status'] = 0;
		$data['error_msg'] = "";
		
		$data['success_status'] = 0;
		$data['success_msg'] = "";
		
		$this->load->view('forget_password',$data);
		
	}
	
	function send_email()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');		
		
		if($this->form_validation->run() == FALSE)
		{
			$data['error_status'] = 0;
			$data['error_msg'] = "";
			
			$data['success_status'] = 0;
			$data['success_msg'] = "";
			
			$this->load->view('forget_password',$data);
		}
		else 
		{
			$this->load->model('forget_password_model');
			if($query = $this->forget_password_model->send_email())
			{
				$this->session->set_flashdata('update_token', time());
				redirect('forget_password/success');
			}
			else 
			{
				$this->session->set_flashdata('update_token', time());
				redirect('forget_password/error');
			}
			
		}
	}
	
	function success()
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect();
        }
			
		$data['error_status'] = 0;
		$data['error_msg'] = "";
		
		$data['success_status'] = 1;
		$data['success_msg'] = "Email successfully send. Ckeck your inbox.";
		
		$this->load->view('forget_password',$data);
		
	}
	
	function error()
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect();
        }
			
		$data['error_status'] = 1;
		$data['error_msg'] = "This email is not valid, check and try again.";
		
		$data['success_status'] = 0;
		$data['success_msg'] = "";
		
		$this->load->view('forget_password',$data);
		
	}
	
	function reset($tmp_userid,$tmp_password,$tmp_current_date)
	{
		date_default_timezone_set("Asia/Colombo"); 
		$current_logtime = date('Y-m-d');
		
		if(strcmp($this->encrypt_data->decode($tmp_current_date), $current_logtime))
		{
			$data['error_status'] = 1;
			$data['error_msg'] = "Password recovery link expired.";
			
			$data['success_status'] = 0;
			$data['success_msg'] = "";
			
			$this->load->view('forget_password',$data);
		}
		else 
		{
			$this->load->model('forget_password_model');
			if($query = $this->forget_password_model->check_authentication($this->encrypt_data->decode($tmp_userid),$this->encrypt_data->decode($tmp_password)))
			{
				redirect('change_password/index/'.$this->encrypt_data->encode($current_logtime.$this->encrypt_data->decode($tmp_userid))."/".$tmp_userid);
			}
			else 
			{
				$data['error_status'] = 1;
				$data['error_msg'] = "This email is not valid, check and try again.";
				
				$data['success_status'] = 0;
				$data['success_msg'] = "";
				
				$this->load->view('forget_password',$data);	
			}
		}
	}
	
}