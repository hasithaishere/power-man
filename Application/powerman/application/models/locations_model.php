<?php

class locations_model extends CI_Model
{
	function get_user_locations()
	{
		$this->db->where('status','1');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$result = $this->db->get('power_location')->result_array();
		
		return $result;
	}
	
}