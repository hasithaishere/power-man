<?php

class add_powerdevice_model extends CI_Model
{
	function add_powerdevice($data)
	{
		$user_id = $this->db->where('id', $this->session->userdata('user_id'));
		//$data = $this->upload->data();
		//$uploadFileName = $upload_data['file_name'];
		
		$powerdevice_data = array(
			
			'name' => $this->input->post('Device_name'),
			'ins_url' => $this->input->post('Device_url'),
			//'description' => $this->input->post('location_description'),

			//'image_url' => 'user.jpg',
			'image_path' => $data['image_name'] ,
			'device_type' => $this->input->post('device_type'),
			//'user_id' => $this->session->userdata('user_id')
			// 'user_id' =>$this->session->userdata('id')
			'status' => '1'
		);
		
		$return_val = $this->db->insert('power_device',$powerdevice_data);
		return $return_val;
		
		
		
	}
}