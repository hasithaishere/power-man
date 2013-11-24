<?php
class add_newsubdevice_model extends CI_Model
{
/////////START EDIT//////////
	function get_dropdown_devicetypelist()
    {
    	$this->db->where('device_type','2');
		$this->db->where('status','1');
		$result = $this->db->get('power_device')->result_array();
		return $result;
    }
	
	function get_dropdown_newdevicelist($maindevice_id)
    {
    	$this->db->where('maindevice_id',$maindevice_id);
		$this->db->where('status','1');
		$this->db->order_by("added_on ", "desc"); 
		$result = $this->db->get(' power_undefine_devices')->result_array();
		return $result;
    }
	
	function get_dropdown_homedevicelist()
    {
		$this->db->where('status','1');
		$result = $this->db->get('power_define_device')->result_array();
		return $result;
    }
	
	function add_new_maindevice($location_id)
	{
		$user_id = $this->db->where('id', $this->session->userdata('user_id'));
		
		$mainDevice_data = array(
				'device_title' => $this->input->post('main_device_title'),
				'device_id' => $this->input->post('main_device_id'),
				'device_serialno' => $this->input->post('main_device_serialno'),
				'device_description' => $this->input->post('main_device_description'),
				'devicetype_id' => $this->input->post('device_type'),
				'power_users_id' => $this->session->userdata('user_id'),
				'power_location_id' => $location_id,
				'power_images_url' => $this->input->post('hidden_imagepath')
			
			);
		$return_val = $this->db->insert('power_user_device',$mainDevice_data);
			
		return $return_val;
	}
	
}
?>