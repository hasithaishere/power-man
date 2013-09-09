<?php

class add_newPackage_model extends CI_Model
{
	function add_package()
	{
		 
		$package_data = array(
		   		
			'name' => $this->input->post('nPackage'),
			'description' => $this->input->post('details'),
			'main_devices' => $this->input->post('mDevices'),
			'sub_devices' => $this->input->post('sDevices'),
			'sms_amount' => $this->input->post('smsAmount'),
			'duration' => $this->input->post('duration'),
            'expire_duration' => $this->input->post('eDuration'),
            );
            //$this->db->insert('power_packges',$package_data);
            
            $return_val = $this->db->insert('power_packges',$package_data);
            return $return_val;

      }
     
	
	function get_packages()
	{
		$this->db->where('status','1');
		$result = $this->db->get('power_packges')->result_array();

		return $result;
	}
			
}