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

			$data = array(
				'is_success' =>  0,
				'success_msg' => ""
			);

			$this->load->view('alert_config',$data); 
			//$this->load->view('access_denied');

		}
		
				
	}
	function set_alert_config()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('optionsRadios','SMS Alert Setting','trim|required');
		$this->form_validation->set_rules('optionsRadios2','SMS Suggestion Alert Settings','trim|required');
		$this->form_validation->set_rules('optionsRadios3','Time warning','trim|required');
		$this->form_validation->set_rules('optionsRadios4','Time warning SMS','trim|required');
		$this->form_validation->set_rules('optionsRadios5','Normal Suggestion SMS','trim|required');
		$this->form_validation->set_rules('optionsRadios6','Mulfunction Suggestions','trim|required');
		
		//regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('alert_config');	
		}
		else
		{
			$this->load->model('alert_config_model');

			if($query = $this->alert_config_model->alert_config())
			{
				$this->session->set_flashdata('update_token', time());
          		redirect('alert_config/success');
				
			}
			
		}
	
	}

	function success()
	{
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
			$data = array(
				'is_success' =>  1,
				'success_msg' => "Alert Configuration is successfully added."
			);

			$this->load->view('alert_config',$data); 
			//$this->load->view('access_denied');

		}		
				
	}
	
}