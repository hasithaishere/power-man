<?php

class alert_config extends CI_Controller
{
	
	function index()
	{
	

		if(!($this->session->userdata('is_logged_in')))
		{		

			$this->load->view('access_denied');
			//$this->load->view('add_newPackage');

		}
		else 
		{
			$this->load->model('alert_config_model'); 
			$result = $this->alert_config_model->get_config();
			
			$data = null;
			
			foreach($result as $result_rows)
			{
				$data['web_exceed_alert'] = "";
				$data['web_malf_alert'] = "";
				$data['sms_normal_sug'] = "";
				$data['sms_malf_alert'] = "";
				$data['sms_malfsug_alert'] = "";
				$data['sms_exceed_alert'] = "";
				
				if($result_rows['time_warn'] == 1)
				{
					$data['web_exceed_alert'] = "checked";
				}
				
				if($result_rows['malf_sug'] == 1)
				{
					$data['web_malf_alert'] = "checked";
				}
				
				if($result_rows['normal_sug_sms'] == 1)
				{
					$data['sms_normal_sug'] = "checked";
				}
				
				if($result_rows['malf_sms'] == 1)
				{
					$data['sms_malf_alert'] = "checked";
				}
				
				if($result_rows['malf_sug_sms'] == 1)
				{
					$data['sms_malfsug_alert'] = "checked";
				}
				
				if($result_rows['time_warn_sms'] == 1)
				{
					$data['sms_exceed_alert'] = "checked";
				}
				
			}

			$data['is_success'] = 0;
			$data['success_msg'] = "";

			$this->load->view('alert_config',$data); 
			//$this->load->view('access_denied');

		}	
	}
	
	function set_alert_config()
	{
		$this->load->model('alert_config_model'); 
		
		if($query = $this->alert_config_model->alert_config())
		{
			$this->session->set_flashdata('update_token', time());
          	redirect('alert_config/success');
				
		}		

	}

	function success()
	{
		$this->load->model('alert_config_model'); 
		
		if( ! $this->session->flashdata('update_token'))
        {
            redirect("alert_config");
        }
			

		if(!($this->session->userdata('is_logged_in')))
		{

			$this->load->view('access_denied');
			//$this->load->view('add_newPackage');

		}
		else 
		{
			
			$result = $this->alert_config_model->get_config();
			
			$data = null;
			
			foreach($result as $result_rows)
			{
				$data['web_exceed_alert'] = "";
				$data['web_malf_alert'] = "";
				$data['sms_normal_sug'] = "";
				$data['sms_malf_alert'] = "";
				$data['sms_malfsug_alert'] = "";
				$data['sms_exceed_alert'] = "";
				
				if($result_rows['time_warn'] == 1)
				{
					$data['web_exceed_alert'] = "checked";
				}
				
				if($result_rows['malf_sug'] == 1)
				{
					$data['web_malf_alert'] = "checked";
				}
				
				if($result_rows['normal_sug_sms'] == 1)
				{
					$data['sms_normal_sug'] = "checked";
				}
				
				if($result_rows['malf_sms'] == 1)
				{
					$data['sms_malf_alert'] = "checked";
				}
				
				if($result_rows['malf_sug_sms'] == 1)
				{
					$data['sms_malfsug_alert'] = "checked";
				}
				
				if($result_rows['time_warn_sms'] == 1)
				{
					$data['sms_exceed_alert'] = "checked";
				}
				
			}

			$data['is_success'] = 1;
			$data['success_msg'] = "Alert Configuration is successfully added.";

			$this->load->view('alert_config',$data); 
			
		}		
				
	}
	
}