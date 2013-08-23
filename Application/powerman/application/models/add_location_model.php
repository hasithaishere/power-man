<?php

class add_location_model extends CI_Model
{
	function add_location()
	{
		
		
		$location_data = array(
			'name' => $this->input->post('location_name'),
			'sub_name' => $this->input->post('sub_name'),
			'description' => $this->input->post('location_description'),
			'image_url' => 'user.jpg',
			//'image_url' => $this->$data['file_name'],
			'user_id' => '2'
			 
		);
		
		$return_val = $this->db->insert('power_location',$location_data);
		
		
		
		
	}
}