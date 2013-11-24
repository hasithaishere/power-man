<?php

class change_password_model extends CI_Model
{
	function change($user_id)
	{
		date_default_timezone_set("Asia/Colombo"); 
		$current_logtime = date('Y-m-d H:i:s');
	
		$data = array(
               'password' => md5($this->input->post('new_password')),
			   'modified_on' => $current_logtime,
			   'modified_by' => '1000' 
            );

		$this->db->where('id', $user_id);
		$return_val = $this->db->update('power_users', $data);
		
		return $return_val;
	}
}