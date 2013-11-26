<?php

class pdfreport_generator_model extends CI_Model
{
	function get_userlocations($user_id)
	{
		$this->db->where('status','1');
		$this->db->where('user_id',$user_id);
		$this->db->order_by("id", "asc"); 
		$result = $this->db->get('power_location')->result_array();
		
		return $result;
	}
	
	function get_usermaindevices($power_users_id,$power_location_id)
	{
		$this->db->where('status','1');
		$this->db->where('power_users_id',$power_users_id);
		$this->db->where('power_location_id',$power_location_id);
		$this->db->order_by("id", "asc"); 
		$result = $this->db->get('power_user_device')->result_array();
		return $result;
		
	}
	
	function get_alerts($user_id,$maindevice_id,$year,$month)
	{
		$result = $this->db->query("SELECT * FROM power_alert_main WHERE YEAR(created_on) = '". $year ."' AND MONTH(created_on) = '". $month ."' AND maindevice_id = '". $maindevice_id ."'")->result_array();
		return $result;
	}
	
	function get_suggestions($user_id,$maindevice_id,$year,$month)
	{
		$result = $this->db->query("SELECT * FROM power_alert_sugestions WHERE YEAR(created_on) = '". $year ."' AND MONTH(created_on) = '". $month ."' AND maindevice_id = '". $maindevice_id ."'")->result_array();
		return $result;
	}
	
}