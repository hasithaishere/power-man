<?php
class forget_password_model extends CI_Model
{
	function send_email()
	{
			$this->db->where('registerstatus','1');
			$this->db->where('email',$this->input->post('email'));
			$result = $this->db->get('power_users')->result_array();
			
			$receiver = "";
			$user_id = "";
			$user_password = "";
			
			date_default_timezone_set("Asia/Colombo"); 
			$current_logtime = date('Y-m-d');
			
			foreach($result as $rows)
			{
				$receiver = $rows['fname'] . " " . $rows['fname'];
				$user_id = $rows['id'];
				$user_password = $rows['password'];
			}
		
			$this->load->library('email_sender');
					
			$data1 = array(
				'url' =>  base_url()."forget_password/reset/".$this->encrypt_data->encode($user_id)."/".$this->encrypt_data->encode($user_password)."/".$this->encrypt_data->encode($current_logtime)
			);
					
			$message=$this->load->view('fp_email_template',$data1,TRUE);
			$data = array('from'=>$this->config->item('admin_email'),'sender'=>$this->config->item('admin_email_name'),'to'=>$this->input->post('email'),'receiver'=>$receiver,'subject'=>'Recover Password - Domore Power Man','message'=>$message);
					
			$result2 = $this->email_sender->send_email($data);
			
			return $result2;
	}

	function check_authentication($user_id,$user_password)
	{
		$this->db->where('id', $user_id);
		$this->db->where('password', $user_password);
	    $query = $this->db->get('power_users');
	
	    if($query->num_rows > 0) {
	
	        return true;
	
	    } else {
	
	        return false;
	
	    }
	}
}