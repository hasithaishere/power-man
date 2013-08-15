<?php

class login_model extends CI_Model
{
	function validate()
	{
		$this->db->where('email',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));
		$result = $this->db->get('power_users');
		
		return $result;
	}
	
	function get_user_roles($user_id)
	{
		$this->db->where('power_users_id',$user_id);
		$result = $this->db->get('power_user_roles');
		
		$id_array = array();
		$i = 0;		
					
		foreach($result->result() as $rows)
		{
			$id_array[$i] = (int)($rows->power_roles_id);
			$i++;			
		}
		
		return $id_array;		
		
	}
	
}