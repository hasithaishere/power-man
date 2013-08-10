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
	
	function validate_phone($data)
	{
		$this->db->where('phone_code',$this->input->post('phone_code'));
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
	
	function checked_confirm_user()
	{
		$this->db->where('change_pass','1');
		$this->db->where('validate_email','1');
		$this->db->where('validate_phone','1');
		$this->db->where('id', $this->session->userdata('user_id'));
		$result = $this->db->get('power_users');
				
		if($result->num_rows == 1)
		{
			$data = array('registerstatus' => '1' );
			
			$this->db->where('id', $this->session->userdata('user_id'));
		
			$this->db->update('power_users', $data); 	
			
			echo json_encode(array('r1' => TRUE));
		}
		else
		{
			echo json_encode(array('r1' => FALSE));
		}
	}
	
	function get_userdata()
	{
		$this->db->where('id', $this->session->userdata('user_id'));
		$result = $this->db->get('power_users');
				
		$phoneno = $this->input->post('phoneno');
				
		if($result->num_rows == 1)
			{		
				foreach($result->result() as $rows)
				{
					$fname = $rows->fname;
					$lname = $rows->lname;
					$phone_code = $rows->phone_code;
					$validate_phone = $rows->validate_phone;
				}
				
					$msg = "Dear " . $fname. " " . $lname . ", Thank you for purchase domore power care solution. Your phone activation code :   ". $phone_code . "  Domore Powerman.";
					
					$this->load->library('sms_sender');
					$data = array('phone_no'=>$phoneno,'message'=>$msg);
					
					$result2 = $this->sms_sender->send_sms($data);
					
					if($result2)
					{
						echo json_encode(array('r1' => TRUE));			
					}
					else 
					{
						echo json_encode(array('r1' => FALSE));			
					}					
				
			}
	}
	
}