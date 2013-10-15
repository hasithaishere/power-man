<?php

class power_monitoring_model extends CI_Model
{
	function loc_y_data($user_id)
	{
		$this->db->where('user_id',$user_id);
		$result1 = $this->db->get('power_location')->result_array();
		
		foreach($result1 as $rows1)
		{
			
		}
		
	}
}