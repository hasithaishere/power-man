<?php 

class notifications extends CI_Controller {

	function index()
	{
		$this->load->model('notifications_model');
		$result = $this->notifications_model->notifications();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('notifications',$data);
		}
	}
	
}

