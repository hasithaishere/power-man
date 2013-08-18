<?php

class deviceonoff_model extends CI_Model
{
	function get_subdevices($maindevice_id)
	{
		$this->db->where('status','1');
		$this->db->where('maindevice_id',$maindevice_id);
		$result = $this->db->get('power_user_subdevices')->result_array();
		
		return $result;
	}
	
	function get_subdevices_control($maindevice_id)
	{
		$this->db->where('status','1');
		$this->db->where('maindevice_id',$maindevice_id);
		$result = $this->db->get('power_subdevice_control')->result_array();
		
		return $result;
	}
	
	function switch_device()
	{
		$this->db->where('id',$this->input->post('md'));
		$result = $this->db->get('power_user_device');
		
		if($result->num_rows == 1)
		{
			foreach($result->result() as $rows)
			{
				$device_ip = $rows->ip;				
			}
		}
		
		if($this->input->post('control') == 1)
		{
			$control_val = "on";
		}
		else 
		{
			$control_val = "off";
		}
		
		$device_url = "http://" . $device_ip . "/setsocket.xml?num=" . $this->input->post('seq') . "&set=" . $control_val . "&ran=" . rand(1111,9999);	
		echo $device_url;
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HTTP/1.1 200 OK', 'Status: 200 Success'));
        curl_setopt($ch, CURLOPT_URL, $device_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        if (FALSE == $output){
            echo curl_error($ch);
            echo json_encode(array('r1' => FALSE));
        }else
            echo json_encode(array('r1' => TRUE));
	}
	
}