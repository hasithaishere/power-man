<?php

class suggestion_notifications_model extends CI_Model
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
		$result = $this->db->query("SELECT power_alert_sugestions.id,power_alert_sugestions.sug_discri,power_alert_sugestions.created_on,power_alert_sugestions.notified FROM power_user_device,power_alert_sugestions WHERE power_user_device.device_id = power_alert_sugestions.maindevice_id AND power_alert_sugestions.status = '1' AND power_alert_sugestions.notified = '0' AND power_user_device.power_users_id = '". $user_id ."'")->result_array();
		
		return $result;
	}
	
}