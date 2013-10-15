<?php

class power_monitoring_model extends CI_Model
{
	function loc_y_data($user_id)
	{
		$query_year = "SELECT YEAR(log_on) AS yearlist FROM power_spl_hour GROUP BY YEAR(log_on) ORDER BY log_on ASC";			
		$result_year = $this->db->query($query_year)->result_array();	
		$tmp_yearlist = array();
		$tmp_mainreturnarr = array();
		
		$i=0;
		
		foreach($result_year as $rows_year)
		{
			$tmp_yearlist[$i] = $rows_year['yearlist'];
			$i++;
		}
		
		$tmp_powercon = array();
		
		$this->db->where('user_id',$user_id);
		$result1 = $this->db->get('power_location')->result_array();

		foreach($result1 as $rows1)
		{
			$this->db->where('power_location_id',$rows1['id']);
			$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_yearlist2 = $tmp_yearlist;
			$tmp_resultarr = array();
			
			for($p=0;$p<$i;$p++) // Create a templory result array default values are zero
			{
				$tmp_resultarr[$p] = 0;
			}
			
			if(!empty($result2))
			{
				foreach($result2 as $rows2)
				{
					$query1_p1 .= " maindevice_id = " . "'" . $rows2['device_id'] . "' OR";
				}
				
				$query1_p1 = rtrim($query1_p1,'OR');
				$query1 = "SELECT SUM(pcon) AS totalpcon,YEAR(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " GROUP BY YEAR(log_on) ORDER BY log_on ASC";
	
				$result3 = $this->db->query($query1)->result_array();
				
				foreach($result3 as $result3_row)
				{
					$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_yearlist2)] = floatval($result3_row['totalpcon'])/1000;
				}
				//$tmp_powercon = array();
				
			}
			$tmp_powercon[] = array($rows1['name']=>$tmp_resultarr);
			//print_r($tmp_resultarr);echo "<br>";
		}
	
		$tmp_mainreturnarr = array('headtext'=>'Yearly Average Power Consumption','xtitle'=>$tmp_yearlist,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}
}