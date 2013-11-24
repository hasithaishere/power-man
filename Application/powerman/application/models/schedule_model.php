<?php

class schedule_model extends CI_Model
{
	function get_schedules($device_id,$maindevice_id)
	{
		$this->db->where('device_id',$device_id);
		$this->db->where('maindevice_id',$maindevice_id);
		$this->db->where('control_type','3');
		$this->db->where('status','1');
		$this->db->where('schedule_cancel != ','2');
		$result = $this->db->get('power_control_sendout')->result_array();
		
		return $result;
	}
	
	function get_breadcrumb($device_id,$maindevice_id)
	{
		$this->db->where('device_id',$maindevice_id);
		$result = $this->db->get('power_user_device')->result_array();
		$tmp_maindevicetitle = "";
		$tmp_location_id = "";
		
		foreach($result as $rows)
		{
			$tmp_maindevicetitle = $rows['device_title'];
			$tmp_location_id = $rows['power_location_id'];
		}
		
		$this->db->where('maindevice_id',$maindevice_id);
		$this->db->where('device_id',$device_id);
		$result3 = $this->db->get('power_user_subdevices')->result_array();
		$tmp_subdevicetitle = "";
		
		foreach($result3 as $rows3)
		{
			$tmp_subdevicetitle = $rows3['device_title'];
		}
		
		$this->db->where('id',$tmp_location_id);
		$result2 = $this->db->get('power_location')->result_array();
		
		$tmp_location_name = "";
		$tmp_sublocation_name = "";
		
		foreach($result2 as $rows)
		{
			$tmp_location_name = $rows['name'];
			$tmp_sublocation_name = $rows['sub_name'];
		}
		
		$return_arr = array("loc_name" => $tmp_location_name,"loc_subname" => $tmp_sublocation_name,"main_devicetitle" => $tmp_maindevicetitle,"sub_devicetitle"=>$tmp_subdevicetitle);
		
		return $return_arr;
				
	}
	
	function scheduling($device_id,$maindevice_id)
	{
		date_default_timezone_set("Asia/Colombo"); 
		$current_logtime = date('Y-m-d H:i:s');
		
		$schedule_data = array(
			'control_status' => $this->input->post('optionsRadios'),
			'control_on' => $current_logtime,
			'control_type' => '3',
			'schedule_on' => $this->input->post('schedule_on'),
			'device_id' => $device_id,
			'maindevice_id' => $maindevice_id
		);
		
		$return_val = $this->db->insert('power_control_sendout',$schedule_data);
		return $return_val;
	}
	
	function cancel_schedule($id,$schedule_on,$control_status,$device_id,$maindevice_id)
	{
		$data = array(
               'schedule_cancel' => '1'
            );

		$this->db->where('id', $id);
		$return_val = $this->db->update('power_control_sendout', $data);
		
		date_default_timezone_set("Asia/Colombo"); 
		$current_logtime = date('Y-m-d H:i:s');
		
		$schedule_data = array(
			'control_status' => $control_status,
			'control_on' => $current_logtime,
			'control_type' => '3',
			'schedule_on' => $this->encrypt_data->decode($schedule_on),
			'device_id' => $device_id,
			'maindevice_id' => $maindevice_id,
			'schedule_cancel' => '2'
		);
		
		$return_val = $this->db->insert('power_control_sendout',$schedule_data);
		return $return_val;
		
	}
	
	function delete_schedule($id)
	{
		$data = array(
               'status' => '0'
            );

		$this->db->where('id', $id);
		$return_val = $this->db->update('power_control_sendout', $data);
		return $return_val;
	}
	
	
}