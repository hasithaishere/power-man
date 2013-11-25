<?php

class add_definedevice_model extends CI_Model
{
	function add_definedevice($data)
	{
		$user_id = $this->db->where('id', $this->session->userdata('user_id'));
		//$data = $this->upload->data();
		//$uploadFileName = $upload_data['file_name'];
		
		$definedevice_data = array(
			
			'name' => $this->input->post('device_name'),
			//'ins_url' => $this->input->post('Device_url'),
			'description' => $this->input->post('device_description'),
			'max_pcon' => $this->input->post('device_max_volt'),
			'max_time' => $this->input->post('device_max_time'),
			'alert_level_count' => $this->input->post('alert_level_count'),
			'alert_level_precent' => $this->input->post('alert_level_precentage'),
			

			//'image_url' => 'user.jpg',
			'image_path' => $data['image_name'] ,
			//'device_type' => $this->input->post('device_type'),
			//'user_id' => $this->session->userdata('user_id')
			// 'user_id' =>$this->session->userdata('id')
			'status' => '1'
		);
		
		$return_val = $this->db->insert('power_define_device',$definedevice_data);
		return $return_val;
		
		
		
	}
}