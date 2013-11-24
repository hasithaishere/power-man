<?php

class schedule_model extends CI_Model
{
	function get_schedules($device_id,$maindevice_id)
	{
		$this->db->where('device_id',$device_id);
		$this->db->where('maindevice_id',$maindevice_id);
		$this->db->where('control_type','3');
		$result = $this->db->get('power_control_sendout')->result_array();
		
		return $result;
	}
	
	function delete_user($user_id)
	{
		$data = array('status' => '0');
		
		$this->db->where('id', $user_id);
		
		$this->db->update('power_users', $data);
		
		redirect("users_details");
	}
	
	function change_state_user($user_id,$admin_state)
	{
		$data = array('adminstatus' => $admin_state);
		
		$this->db->where('id', $user_id);
		
		$this->db->update('power_users', $data);
		
		redirect("users_details");
	}
	
	
}