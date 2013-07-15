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
}