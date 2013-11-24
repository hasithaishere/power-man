<?php

class deviceonoff_model extends CI_Model
{
	function get_subdevices($maindevice_id)
	{
		$this->db->where('status','1');
		$this->db->where('maindevice_id',$maindevice_id);
		$result = $this->db->get('power_user_subdevices');
		
		if($result->num_rows > 0)
		{
			return $result->result_array();
		}
		else 
		{
			redirect("locations");	
		}	
		
	}
	
	function get_subdevices_control($maindevice_id)
	{
		$this->db->where('status','1');
		$this->db->where('maindevice_id',$maindevice_id);
		$result = $this->db->get('power_subdevice_control')->result_array();
		
		$returnArr = array();
		
		foreach($result as $rows)
		{
			$tmp_deviceid = $rows['device_id'];
			
			//SELECT power_define_device.normal_pcon FROM power_user_subdevices,power_define_device WHERE power_user_subdevices.device_type = power_define_device.id AND power_user_subdevices.device_id = '1D723F69'
			$result2 = $this->db->query("SELECT power_define_device.max_pcon FROM power_user_subdevices,power_define_device WHERE power_user_subdevices.device_type = power_define_device.id AND power_user_subdevices.device_id = '". $tmp_deviceid ."'")->result_array();
			$tmp_normalpcon = "1";
			foreach($result2 as $rows2)
			{
				$tmp_normalpcon = $rows2['max_pcon'];
			}
			$tmp_actualpcon = $rows['pcon'];
			$tmp_pconstatus = intval((floatval($tmp_actualpcon)/floatval($tmp_normalpcon))*100);
	
			$tmp_middleicon = "";
			$tmp_middleiconcolor = "";
			$tmp_roundcolor = "";
			$tmp_badgewarn = "";
			$tmp_badgewarnmsg = "";

			if($tmp_pconstatus >= 100)
			{
				$tmp_middleicon = "fa-icon-warning-sign";
				$tmp_middleiconcolor = "circleStatsItem orange";
				$tmp_roundcolor = "orangeCircle";
				$tmp_badgewarn = "badge badge-important";
				$tmp_badgewarnmsg = "Exceed normal power usage level.";
			}
			else 
			{
				if($tmp_pconstatus >= 75)
				{
					$tmp_middleicon = "fa-icon-thumbs-up";
					$tmp_middleiconcolor = "circleStatsItem yellow";
					$tmp_roundcolor = "yellowCircle";
					$tmp_badgewarn = "badge badge-warning";
					$tmp_badgewarnmsg = "Reach to 75% of normal usage level.";
				}
				else 
				{
					$tmp_middleicon = "fa-icon-thumbs-up";
					$tmp_middleiconcolor = "circleStatsItem green";
					$tmp_roundcolor = "greenCircle";
					$tmp_badgewarn = "badge badge-success";
					$tmp_badgewarnmsg = "This device work in normal condition.";
				}	
			}
			
			$returnArr[] = array('maindevice_id' => $maindevice_id,'device_id' => $tmp_deviceid,'control_status' => $rows['control_status'],'tmp_actualpcon' => $tmp_actualpcon,'tmp_pconstatus' => $tmp_pconstatus,'tmp_middleicon' => $tmp_middleicon,'tmp_middleiconcolor' => $tmp_middleiconcolor,'tmp_roundcolor' => $tmp_roundcolor,'tmp_badgewarn' => $tmp_badgewarn,'tmp_badgewarnmsg' => $tmp_badgewarnmsg);
			
		}		
		//print_r($returnArr);die();
		return $returnArr;
	}
	
	function get_breadcrumb($maindevice_id)
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
		
		$this->db->where('id',$tmp_location_id);
		$result2 = $this->db->get('power_location')->result_array();
		
		$tmp_location_name = "";
		$tmp_sublocation_name = "";
		
		foreach($result2 as $rows)
		{
			$tmp_location_name = $rows['name'];
			$tmp_sublocation_name = $rows['sub_name'];
		}
		
		$return_arr = array("loc_name" => $tmp_location_name,"loc_subname" => $tmp_sublocation_name,"main_devicetitle" => $tmp_maindevicetitle);
		
		return $return_arr;
				
	}
	
	function switch_device()
	{
	
		$tmp_device_id = $this->input->post('seq');
		$tmp_maindevice_id = $this->input->post('md');
		$tmp_control_status = $this->input->post('control');
		
		date_default_timezone_set("Asia/Colombo");
    	$tmp_logon = date('Y-m-d H:i:s');		
		
		$data = array(
		   'control_status' => $tmp_control_status ,
		   'control_on' => $tmp_logon ,
		   'control_type' => '1' ,
		   'device_id' => $tmp_device_id ,
		   'maindevice_id' => $tmp_maindevice_id
		);

		$reval1 = $this->db->insert('power_control_sendout', $data);
		
		$data2 = array(
           'control_status' => $tmp_control_status ,
		   'control_on' => $tmp_logon
      	);

		$this->db->where('device_id', $tmp_device_id);
		$this->db->where('maindevice_id', $tmp_maindevice_id);
		$reval2 = $this->db->update('power_subdevice_control', $data2); 
		
		if ($reval1 == TRUE && $reval2 == TRUE){
            echo json_encode(array('r1' => TRUE));
        }else
            echo json_encode(array('r1' => FALSE));
		
		
		/*
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
            echo json_encode(array('r1' => TRUE));*/
	}
	
}