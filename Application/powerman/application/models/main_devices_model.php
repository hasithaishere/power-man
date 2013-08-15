<?php

class main_devices_model extends CI_Model
{
	function get_maindevices($location_id)
	{
		$this->db->where('status','1');
		$this->db->where('power_location_id',$location_id);
		$result = $this->db->get('power_user_device')->result_array();
		
		return $result;
	}
	
}