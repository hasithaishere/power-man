<?php

class Upgrade_Package extends CI_Controller
{
	function index()
	{
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->model('create_user_model');
			$result_packages = $this->create_user_model->get_packages();
			$data['packages'] = $result_packages;
			
			$this->load->model('upgrade_package_model');
			$result_old = $this->upgrade_package_model->get_oldpackage();
			$data['old_package'] = $result_old;
			//print_r($result_old);die();
			
			$data['success_upgrade'] = 0;
			$data['success_upgrade_msg'] = "";
			
			$this->load->view('Upgrade_Package',$data);
		}
	}
	
	
	function upgrade()
	{
		$this->load->model('upgrade_package_model');
		if($query = $this->upgrade_package_model->upgrade_package())
		{
			$this->session->set_flashdata('update_token', time());
			redirect('Upgrade_Package/success/');
		}
		
	}
	
	function success()
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect("Upgrade_Package");
        }
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->model('create_user_model');
			$result_packages = $this->create_user_model->get_packages();
			$data['packages'] = $result_packages;
			
			$this->load->model('upgrade_package_model');
			$result_old = $this->upgrade_package_model->get_oldpackage();
			$data['old_package'] = $result_old;
			//print_r($result_old);die();
			
			$data['success_upgrade'] = 1;
			$data['success_upgrade_msg'] = "Request successfully send.";
			
			$this->load->view('Upgrade_Package',$data);
			
		}
		
	}
	
	
}


