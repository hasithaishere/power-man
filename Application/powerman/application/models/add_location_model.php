<?php

class add_location_model extends CI_Model
{
	function add_location($data)
	{
		$user_id = $this->db->where('id', $this->session->userdata('user_id'));
		//$data = $this->upload->data();
		//$uploadFileName = $upload_data['file_name'];
		
		$location_data = array(
			'name' => $this->input->post('location_name'),
			'sub_name' => $this->input->post('sub_name'),
			'description' => $this->input->post('location_description'),

			//'image_url' => 'user.jpg',
			'image_url' => $data['image_name'] ,
			'user_id' => $this->session->userdata('user_id')
			// 'user_id' =>$this->session->userdata('id')
		);
		
		$return_val = $this->db->insert('power_location',$location_data);
		return $return_val;
		
		
		
	}
}