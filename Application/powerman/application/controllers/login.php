<?php

class login extends CI_Controller
{

	function index()
	{
		//$this->load->library('sms_sender');
		//$data = array('phone_no'=>'0716305702','message'=>'hasitha hallo');
		//$this->sms_sender->send_sms($data);
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('login_form');
		}
		else 
		{			
			if($this->session->userdata('registerstatus') == 1)
			{
				redirect('main_panel');
			}
			else 
			{
				redirect('signout');				
			}
		}
		
		
		
		
	}
	
	function validate_user()
	{
		$this->load->model('login_model');
		$result = $this->login_model->validate();
		
		if($result->num_rows == 1)
		{		
			foreach($result->result() as $rows)
			{
				$user_id = $rows->id;
				$role = $rows->role;
				$adminstatus = $rows->adminstatus;
				$status = $rows->status;
				$registerstatus = $rows->registerstatus;
				$change_pass = $rows->change_pass;
				$validate_email = $rows->validate_email;
				$validate_phone = $rows->validate_phone;
			}
			
			$result1 = $this->login_model->get_user_roles($user_id);
			
			$data = array(
				"user_id" => $user_id,
				"role" => $role,
				"adminstatus" => $adminstatus,
				"status" => $status,
				"registerstatus" => $registerstatus,
				"change_pass" => $change_pass,
				"validate_email" => $validate_email,
				"validate_phone" => $validate_phone,
				"is_logged_in" => TRUE,
				"user_roles" => $result1
			);
			
			$this->session->set_userdata($data);
			
			if($status == 1)
			{
				if($registerstatus == 1)
				{
					redirect('main_panel');
				}
				else
				{
					redirect('confirm_user');
				}
			}
			else
			{
				redirect('signout');
			}
			
			/*if($role == 1)
			{
				redirect('main_panel');
			}
			else
			{
				if($status == 1 && $adminstatus == 1)
				{
					if($registerstatus == 1)
					{
						redirect('main_panel');
					}
					else
					{
						redirect('confirm_user');	
					}
				}
				else
				{
					redirect('error_user');	
				}
			}*/
			
			
			
		}
		else
		{
			redirect('login_form_error');
		}
	}
	
	
}