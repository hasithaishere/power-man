<?php

class confirm_user_model extends CI_Model
{
	function update_password($data)
	{
		//$this->db->update('power_users',$data,//$this->session->userdata('user_id'));
		$this->db->where('id', 1);
		
		$this->db->update('power_users', $data); 
	}
}