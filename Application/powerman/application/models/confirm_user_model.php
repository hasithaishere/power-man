<?php

class confirm_user_model extends CI_Model
{
	function update_password($data)
	{
		//$this->db->update('power_users',$data,//$this->session->userdata('user_id'));
		$this->db->where('id', $this->session->userdata('user_id'));
		
		$this->db->update('power_users', $data); 
		//echo print_r($data);
		echo json_encode(array('r1' => TRUE));

	}
	
	function validate_email($data)
	{
		$this->db->where('email_code',$this->input->post('email_code'));
		$this->db->where('id', $this->session->userdata('user_id'));
		$result = $this->db->get('power_users');
		
		if($result->num_rows == 1)
		{
			$this->db->where('id', $this->session->userdata('user_id'));
		
			$this->db->update('power_users', $data); 	
			
			echo json_encode(array('r1' => TRUE));
		}
		else
		{
			echo json_encode(array('r1' => FALSE));
		}
		
	}
}