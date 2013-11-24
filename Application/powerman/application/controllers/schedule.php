<?php

class schedule extends CI_Controller
{
	function index($device_id,$maindevice_id)
	{
	
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
			//$this->load->view('add_newPackage');
		}
		else 
		{
			$this->load->model('schedule_model');
			$result = $this->schedule_model->get_schedules($device_id,$maindevice_id);
			$result2 = $this->schedule_model->get_breadcrumb($device_id,$maindevice_id);	
			
			date_default_timezone_set("Asia/Colombo"); 
			$current_logtime = date('Y-m-d H:i:s');
			
			$data = array('content'=>$result,'curent_time'=>$current_logtime,'device_id'=>$device_id,'maindevice_id'=>$maindevice_id,'content2'=>$result2,'user_roles_arr'=>$this->session->userdata('user_roles'));
			
			$data['success_schedule'] = 0;
			$data['success_schedule_msg'] = "";
			
			$this->load->view('schedule',$data); 
			//$this->load->view('access_denied');
		}
		
	}
	
	function scheduling($device_id,$maindevice_id)
	{
	
		$this->load->model('schedule_model');
			
		if($query = $this->schedule_model->scheduling($device_id,$maindevice_id))
		{
			$this->session->set_flashdata('update_token', time());
			redirect('schedule/success/'.$device_id."/".$maindevice_id);
		}		
		
	}
	
	function success($device_id,$maindevice_id)
	{
		if( ! $this->session->flashdata('update_token'))
        {
            redirect("device_on_off/index/".$this->encrypt_data->encode($maindevice_id));
        }

		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
			//$this->load->view('add_newPackage');
		}
		else 
		{
			$this->load->model('schedule_model');
			$result = $this->schedule_model->get_schedules($device_id,$maindevice_id);
			$result2 = $this->schedule_model->get_breadcrumb($device_id,$maindevice_id);	
			
			date_default_timezone_set("Asia/Colombo"); 
			$current_logtime = date('Y-m-d H:i:s');
			
			$data = array('content'=>$result,'curent_time'=>$current_logtime,'device_id'=>$device_id,'maindevice_id'=>$maindevice_id,'content2'=>$result2,'user_roles_arr'=>$this->session->userdata('user_roles'));
			
			$data['success_schedule'] = 1;
			$data['success_schedule_msg'] = "Schedulling successfully completed.";
			
			$this->load->view('schedule',$data); 
			//$this->load->view('access_denied');
		}

		
	}

	function cancel_schedule($id,$schedule_on,$control_status,$device_id,$maindevice_id)
	{
		$this->load->model('schedule_model');
		
		if($result = $this->schedule_model->cancel_schedule($id,$schedule_on,$control_status,$device_id,$maindevice_id))
		{
			redirect('schedule/index/'.$device_id."/".$maindevice_id);
		}
	}
	
	function delete_schedule($id,$device_id,$maindevice_id)
	{
		$this->load->model('schedule_model');
		
		if($result = $this->schedule_model->delete_schedule($id))
		{
			redirect('schedule/index/'.$device_id."/".$maindevice_id);
		}
	}
	
}
