<?php

class users_details_model extends CI_Model
{
	function get_allusers()
	{
		$this->db->where('status','1');
		$result = $this->db->get('power_users')->result_array();
		
		return $result;
	}
	
}