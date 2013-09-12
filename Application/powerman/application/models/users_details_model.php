<?php

class users_details_model extends CI_Model
{
	function get_allusers()
	{
		$this->db->where('status','1');
		$result = $this->db->get('power_users')->result_array();
		
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