<?php
class add_newMainDevice_model extends CI_Model
{

function get_dropdown_list()
    {
		$result = $this->db->get('power_device')->result_array();
		return $result;
		/* 
        $results = $this->db->get('power_device');
		return $results;
           if ($query->num_rows >= 1)
            {
                foreach($query->result_array() as $row)
                {
                    $data[$row['deviceId']]=$row['device_type'];
                }
                return $data;
            }*/
    }
function add_new_maindevice(){
	$user_id = $this->db->where('id', $this->session->userdata('user_id'));
	
	$mainDevice_data = array(
			'device_title' => $this->input->post('main_device_title'),
			'device_id' => $this->input->post('main_device_id'),
			'device_serialno' => $this->input->post('main_device_serialno'),
			'device_description' => $this->input->post('main_device_description'),
			
			'power_users_id' => $this->session->userdata('user_id')
		
		);
		$return_val = $this->db->insert('power_user_device',$mainDevice_data);
		return $return_val;
}
	
}
?>