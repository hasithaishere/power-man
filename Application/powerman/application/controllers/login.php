<?php

class login extends CI_Controller
{
	function index()
	{
		$this->load->view('login_form');
	}
	
	function validate_user()
	{
		$this->load->model('login_model');
		$result = $this->login_model->validate();
		
		if($result->num_rows == 1)
		{		
			foreach($result->result() as $rows)
			{
				$role = $rows->role;
				$adminstatus = $rows->adminstatus;
				$status = $rows->status;
				$registerstatus = $rows->registerstatus;
			}
			
			if($role == 1)
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
			}
		}
		else
		{
			$this->index();
		}
	}
}