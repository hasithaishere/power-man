<?php

class change_password extends CI_Controller
{
	
	function index($token,$user_id)
	{
		$data['token'] = $token;
		$data['user_id'] = $user_id;
		
		$this->load->view('change_password',$data);
	}
	
	function change($token,$user_id)
	{
		date_default_timezone_set("Asia/Colombo"); 
		$current_logtime = date('Y-m-d');
		
		$tmp_userid = $this->encrypt_data->decode($user_id);
		
		if(strcmp($this->encrypt_data->encode($current_logtime.$tmp_userid), $token))
		{
			$this->load->view('passchange_fail');
		}
		else 
		{
			$this->load->model('change_password_model');
			if($query = $this->change_password_model->change($tmp_userid))
			{
				$this->load->view('passchange_success');
			}
			
		}
	}
	
}