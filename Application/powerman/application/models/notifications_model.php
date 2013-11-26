<?php

class notifications_model extends CI_Model
{
	function notifications()
	{
		/*
		//$this->db->where('status','1');
		$user_id = $this->db->where('user_id',$this->session->userdata('user_id'));
		//$this->db->where('user_id',$this->session->userdata('user_id'));
		//$this->db->select('c.*, u.firstname, u.lastname');
		$this->db->select('power_user_device');
		*/
		$user_id = $this->session->userdata('user_id');
		$result = $this->db->query("SELECT power_alert_main.id,power_alert_main.alert_discri,power_alert_main.alert_priority,power_alert_main.created_on,power_alert_main.notified FROM power_user_device,power_alert_main WHERE power_user_device.device_id = power_alert_main.maindevice_id AND power_alert_main.status = '1' AND power_alert_main.notified = '0' AND power_user_device.power_users_id = '". $user_id ."'")->result_array();
		
		return $result;
	}
	
}