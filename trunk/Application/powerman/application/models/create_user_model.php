<?php

class create_user_model extends CI_Model
{
	function add_user()
	{
		$this->load->helper('randomgenerator');
		
		$email_code_val = randomEmailCode();
		$phone_code_val = randomPhoneCode();
		
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
			'package' => $this->input->post('pack'),
			'password' => md5($this->input->post('pass1')),
			'email_code' => $email_code_val,
			'phone_code' => $phone_code_val
		);
		
		$return_val = $this->db->insert('power_users',$user_data);
		
		if($return_val)
		{
					$this->load->library('email_sender');
					
					$data1 = array(
						'email' =>  $this->input->post('email'),
						'password' => $this->input->post('pass1'),
						'email_code' => $email_code_val
					);
					
					$message=$this->load->view('email_template',$data1,TRUE);
					$data = array('from'=>$this->config->item('admin_email'),'sender'=>$this->config->item('admin_email_name'),'to'=>$this->input->post('email'),'receiver'=>$this->input->post('fname') . " " . $this->input->post('lname'),'subject'=>'Registration Details - Domore Power Man','message'=>$message);
					
					$result2 = $this->email_sender->send_email($data);
					
					if($result2)
					{
						$return_val = $result2;
					}
					
			return $return_val;
		}
		
		
	}

	function get_packages()
	{
		$this->db->where('status','1');
		$result = $this->db->get('power_packges')->result_array();

		return $result;
	}
	
	function is_unique_email()
	{
		$this->db->where('email',$this->input->post('email'));
		$result = $this->db->get('power_users');
		
		if($result->num_rows >= 1)
		{
			echo json_encode(array('r1' => TRUE));
		}
		else
		{
			echo json_encode(array('r1' => FALSE));
		}
		
	}

}