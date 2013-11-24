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
		$this->db->where('check_status','0');
		$this->db->order_by("added_on ", "desc"); 
		$result = $this->db->get('power_undefine_devices')->result_array();
		return $result;
    }
	
	function get_dropdown_homedevicelist()
    {
		$this->db->where('status','1');
		$result = $this->db->get('power_define_device')->result_array();
		return $result;
    }
	
	//----------Add new sub device - START ------------
	
	function add_new_subdevice($maindevice_id)
	{		
		$mainDevice_data = array(
				'device_title' => $this->input->post('sub_device_title'),
				'device_id' => $this->input->post('device_id'),
				'device_serialno' => $this->input->post('sub_device_serialno'),
				'device_description' => $this->input->post('sub_device_description'),
				'device_type' => $this->input->post('device_housetype'),
				'users_id' => $this->session->userdata('user_id'),
				'maindevice_id' => $maindevice_id,
				'powerdevice_type' => $this->session->userdata('device_type'),
				'image_url' => $this->input->post('hidden_imagepath')
			
			);

		$return_val = $this->db->insert('power_user_subdevices',$mainDevice_data);
		$return_val2 = FALSE;
		if($return_val)
		{
			$data = array(
            	'check_status'=>'1'               
            );

			$this->db->where('device_id',$this->input->post('device_id'));
			$this->db->where('maindevice_id',$maindevice_id);
			$return_val2 = $this->db->update('power_undefine_devices', $data); 
		}
			
		return $return_val2;
	}
	
}
?>