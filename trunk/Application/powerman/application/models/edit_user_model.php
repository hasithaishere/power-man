<?php

class edit_user_model extends CI_Model
{
	function get_user_data($user_id)
	{
		$this->db->where('id',$user_id);
		$this->db->where('status','1');
		$result = $this->db->get('power_users')->result_array();
		
		return $result;
	}
	
	function update_user_details($user_id)
	{

		//if(strcmp($this->input->post('is_change_pass'), "1"))
		//{
			$user_data = array(
			
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'zip' => $this->input->post('zipcode'),
				'country' => $this->input->post('countries'),
				'email' => $this->input->post('email'),
				//'package' => $this->input->post('pack'),
				//'password' => md5($this->input->post('pass1'))
			
			);
		//}
		//else 
		//{
		/*	$user_data = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'zip' => $this->input->post('zipcode'),
				'country' => $this->input->post('countries'),
				'email' => $this->input->post('email'),
				'package' => $this->input->post('pack')
			);	
		}*/
						
		$this->db->where('id', $user_id);
		
		$return_val = $this->db->update('power_users', $user_data); 
		
		return $return_val;		
		
	}

	function update_user_password($user_id)
	{

		//if(strcmp($this->input->post('is_change_pass'), "1"))
		//{
			$user_data = array(
			
				/*'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'zip' => $this->input->post('zipcode'),
				'country' => $this->input->post('countries'),
				'email' => $this->input->post('email'),*/
				//'package' => $this->input->post('pack'),
				'password' => md5($this->input->post('pass1'))
			
			);
		//}
		//else 
		//{
		/*	$user_data = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'zip' => $this->input->post('zipcode'),
				'country' => $this->input->post('countries'),
				'email' => $this->input->post('email'),
				'package' => $this->input->post('pack')
			);	
		}*/
						
		$this->db->where('id', $user_id);
		
		$return_val = $this->db->update('power_users', $user_data); 
		
		return $return_val;		
		
	}
	
}