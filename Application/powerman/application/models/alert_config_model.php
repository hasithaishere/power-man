<?php

class alert_config_model extends CI_Model
{
	function get_config()
	{
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$result = $this->db->get('power_alert_config')->result_array();
		
		return $result;
	}
	
	function alert_config($data)
	{
		$user_id = $this->db->where('user_id',$this->session->userdata('user_id'));
		//$data = $this->upload->data();
		//$uploadFileName = $upload_data['file_name'];
		
		$alert_config_data = array(
			'malf_sms' => $this->input->post('sms_malf_alert'),
			'malf_sug_sms' => $this->input->post('sms_malfsug_alert'),
			'time_warn_sms' => $this->input->post('sms_exceed_alert'),
			'time_warn' => $this->input->post('web_exceed_alert'),
			'normal_sug_sms' => $this->input->post('sms_normal_sug'),
			'malf_sug' => $this->input->post('web_malf_alert')
		);
		
		$this->db->where($user_id);
		$return_val = $this->db->update('power_alert_config',$alert_config_data);
		return $return_val;
		
	}
}