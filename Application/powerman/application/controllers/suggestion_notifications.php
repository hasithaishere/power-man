<?php 

class suggestion_notifications extends CI_Controller {

	function index()
	{
		$this->load->model('suggestion_notifications_model');
		$result = $this->suggestion_notifications_model->notifications();	
		
		$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('suggestion_notifications',$data);
		}
	}
	
}

