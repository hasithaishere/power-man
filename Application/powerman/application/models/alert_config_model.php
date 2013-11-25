<?php

class alert_config_model extends CI_Model
{
	function alert_config($data)
	{
		$user_id = $this->db->where('user_id',$this->session->userdata('user_id'));
		//$data = $this->upload->data();
		//$uploadFileName = $upload_data['file_name'];
		
		$alert_config_data = array(
			'malf_sms' => $this->input->post('optionsRadios'),
			'malf_sug_sms' => $this->input->post('optionsRadios2'),
			'time_warn_sms' => $this->input->post('optionsRadios3'),
			'time_warn' => $this->input->post('optionsRadios4'),
			'normal_sug_sms' => $this->input->post('optionsRadios5'),
			'malf_sug' => $this->input->post('optionsRadios6'),
			

			//'image_url' => 'user.jpg',
			//'image_url' => $data['image_name'] ,
			//'user_id' => $this->session->userdata('user_id')
			// 'user_id' =>$this->session->userdata('id')
		);
		$this->db->where($user_id);
		$return_val = $this->db->update('power_alert_config',$alert_config_data);
		return $return_val;
		
		
		
	}
}