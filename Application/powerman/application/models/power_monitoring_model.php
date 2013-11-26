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

	function loc_m_data($user_id,$year)
	{
		//$query_year = "SELECT YEAR(log_on) AS yearlist FROM power_spl_hour GROUP BY YEAR(log_on) ORDER BY log_on ASC";			
		//$result_year = $this->db->query($query_year)->result_array();	
		$tmp_monthlist = array('1','2','3','4','5','6','7','8','9','10','11','12');
		$tmp_monthlist_name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$tmp_mainreturnarr = array();
		
		//$i=0;
		
		//foreach($result_year as $rows_year)
		//{
		//	$tmp_yearlist[$i] = $rows_year['yearlist'];
		//	$i++;
		//}
		
		$tmp_powercon = array();
		
		$this->db->where('user_id',$user_id);
		$result1 = $this->db->get('power_location')->result_array();

		foreach($result1 as $rows1)
		{
			$this->db->where('power_location_id',$rows1['id']);
			$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_monthlist2 = $tmp_monthlist;
			$tmp_resultarr = array();
			
			for($p=0;$p<12;$p++) // Create a templory result array default values are zero
			{
				$tmp_resultarr[$p] = 0;
			}
			
			if(!empty($result2))
			{
				/*foreach($result2 as $rows2)
				{
					$query1_p1 .= " maindevice_id = " . "'" . $rows2['device_id'] . "' OR";
				}
				
				$query1_p1 = rtrim($query1_p1,'OR');
				$query1 = "SELECT SUM(pcon) AS totalpcon,MONTH(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " GROUP BY YEAR(log_on),MONTH(log_on) ORDER BY log_on ASC";
				//echo $query1;die();
				$result3 = $this->db->query($query1)->result_array();
				
				foreach($result3 as $result3_row)
				{
					$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_monthlist2)] = floatval($result3_row['totalpcon'])/1000;
				}
				//$tmp_powercon = array();
				*/
				$tmp_tot_pcon = 0;
				$tmp_new_logon = "";
				
				foreach($result2 as $rows2)
				{
					$query1_p1 = " maindevice_id = " . "'" . $rows2['device_id'] . "'";
				
				
					//$query1_p1 = rtrim($query1_p1,'OR');
					$query1 = "SELECT SUM(pcon) AS totalpcon,MONTH(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " AND YEAR(log_on) = '". $year ."' GROUP BY YEAR(log_on),MONTH(log_on) ORDER BY log_on ASC";
					//echo $query1."<br><hr>";//die();
					$result3 = $this->db->query($query1)->result_array();
				
					foreach($result3 as $result3_row)
					{
						$tmp_tot_pcon += floatval($result3_row['totalpcon']);
						$tmp_new_logon = $result3_row['new_logon'];
					}
				
				}//die();
				$tmp_resultarr[array_search($tmp_new_logon, $tmp_monthlist2)] = $tmp_tot_pcon/1000;
				
				
			}
			$tmp_powercon[] = array($rows1['name']=>$tmp_resultarr);
			unset($tmp_resultarr);
			//print_r($tmp_resultarr);echo "<br>";
		}
	
		$tmp_mainreturnarr = array('headtext'=>'Monthly Average Power Consumption','xtitle'=>$tmp_monthlist_name,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}
	
	function loc_d_data($user_id,$year,$month)
	{
		//$query_year = "SELECT YEAR(log_on) AS yearlist FROM power_spl_hour GROUP BY YEAR(log_on) ORDER BY log_on ASC";			
		//$result_year = $this->db->query($query_year)->result_array();	
		$tmp_daylist = array();
		
		for($p=0;$p<31;$p++) 
		{
			$tmp_daylist[$p] = $p+1;
		}
		//$tmp_monthlist_name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$tmp_mainreturnarr = array();
		
		//$i=0;
		
		//foreach($result_year as $rows_year)
		//{
		//	$tmp_yearlist[$i] = $rows_year['yearlist'];
		//	$i++;
		//}
		
		$tmp_powercon = array();
		
		$this->db->where('user_id',$user_id);
		$result1 = $this->db->get('power_location')->result_array();

		foreach($result1 as $rows1)
		{
			$this->db->where('power_location_id',$rows1['id']);
			$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_daylist2 = $tmp_daylist;
			$tmp_resultarr = array();
			
			for($p=0;$p<31;$p++) // Create a templory result array default values are zero
			{
				$tmp_resultarr[$p] = 0;
			}
			
			if(!empty($result2))
			{
				
				
				$tmp_tot_pcon = 0;
				$tmp_new_logon = "";
				
				foreach($result2 as $rows2)
				{
					$query1_p1 = " maindevice_id = " . "'" . $rows2['device_id'] . "'";
				
				
					//$query1_p1 = rtrim($query1_p1,'OR');
					$query1 = "SELECT SUM(pcon) AS totalpcon,DAYOFMONTH(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " AND YEAR(log_on) = '". $year ."' AND MONTH(log_on) = '". $month ."' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on) ORDER BY log_on ASC";
					//echo $query1;//die();
					$result3 = $this->db->query($query1)->result_array();
				
					foreach($result3 as $result3_row)
					{
						//$tmp_tot_pcon += floatval($result3_row['totalpcon']);
						//$tmp_new_logon = $result3_row['new_logon'];
						$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_daylist2)] = floatval($result3_row['totalpcon'])/1000;
					}
				
				}
				
				
				
				//die();
				
				
				
				
				
				
			}
			$tmp_powercon[] = array($rows1['name']=>$tmp_resultarr);
			unset($tmp_resultarr);
			//$tmp_powercon[] = array($rows1['name']=>$tmp_resultarr);
			//print_r($tmp_resultarr);echo "<br>";
		}
	
		$tmp_mainreturnarr = array('headtext'=>'Daily Average Power Consumption','xtitle'=>$tmp_daylist,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}

	//-----------------------------------------------------------------------------------------------------------
	
	function md_y_data($user_id,$location_id)
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
		
		//$this->db->where('user_id',$user_id);
		//$result1 = $this->db->get('power_location')->result_array();

		//foreach($result1 as $rows1)
		//{
			$this->db->where('power_location_id',$location_id);
			$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_yearlist2 = $tmp_yearlist;
			$tmp_resultarr = array();
			
			
			
			//if(!empty($result2))
			//{
				foreach($result2 as $rows2)
				{
					for($p=0;$p<$i;$p++) // Create a templory result array default values are zero
					{
						$tmp_resultarr[$p] = 0;
					}
					
					$query1_p1 = " maindevice_id = " . "'" . $rows2['device_id'] . "'";
				
					$query1 = "SELECT SUM(pcon) AS totalpcon,YEAR(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " GROUP BY YEAR(log_on) ORDER BY log_on ASC";
					//echo $query1."<br>";
					$result3 = $this->db->query($query1)->result_array();
					
					foreach($result3 as $result3_row)
					{
						$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_yearlist2)] = floatval($result3_row['totalpcon'])/1000;
						
					}
	
					$tmp_powercon[] = array($rows2['device_title']=>$tmp_resultarr);
					unset($tmp_resultarr);
				}
				//$tmp_powercon = array();
				
			//}
			
			//print_r($tmp_resultarr);echo "<br>";
		//}
	
		$tmp_mainreturnarr = array('headtext'=>'Yearly Average Power Consumption','xtitle'=>$tmp_yearlist,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}

	function md_m_data($user_id,$location_id,$year)
	{
		//$query_year = "SELECT YEAR(log_on) AS yearlist FROM power_spl_hour GROUP BY YEAR(log_on) ORDER BY log_on ASC";			
		//$result_year = $this->db->query($query_year)->result_array();	
		$tmp_monthlist = array('1','2','3','4','5','6','7','8','9','10','11','12');
		$tmp_monthlist_name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		
		//$tmp_yearlist = array();
		$tmp_mainreturnarr = array();
		
		//$i=0;
		
		//foreach($result_year as $rows_year)
		//{
		//	$tmp_yearlist[$i] = $rows_year['yearlist'];
		//	$i++;
		//}
		
		$tmp_powercon = array();
		
		//$this->db->where('user_id',$user_id);
		//$result1 = $this->db->get('power_location')->result_array();

		//foreach($result1 as $rows1)
		//{
			$this->db->where('power_location_id',$location_id);
			$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_monthlist2 = $tmp_monthlist;
			$tmp_resultarr = array();
			
			
			
			//if(!empty($result2))
			//{
				foreach($result2 as $rows2)
				{
					for($p=0;$p<12;$p++) // Create a templory result array default values are zero
					{
						$tmp_resultarr[$p] = 0;
					}
					
					$query1_p1 = " maindevice_id = " . "'" . $rows2['device_id'] . "'";
				
					$query1 = "SELECT SUM(pcon) AS totalpcon,MONTH(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " AND YEAR(log_on) = '". $year ."' GROUP BY YEAR(log_on),MONTH(log_on) ORDER BY log_on ASC";
					//echo $query1."<br>";
					$result3 = $this->db->query($query1)->result_array();
					
					foreach($result3 as $result3_row)
					{
						$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_monthlist2)] = floatval($result3_row['totalpcon'])/1000;
						
					}
	
					$tmp_powercon[] = array($rows2['device_title']=>$tmp_resultarr);
					unset($tmp_resultarr);
				}
				//$tmp_powercon = array();
				
			//}
			
			//print_r($tmp_resultarr);echo "<br>";
		//}
	
		$tmp_mainreturnarr = array('headtext'=>'Monthly Average Power Consumption','xtitle'=>$tmp_monthlist_name,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}

	function md_d_data($user_id,$location_id,$year,$month)
	{
		//$query_year = "SELECT YEAR(log_on) AS yearlist FROM power_spl_hour GROUP BY YEAR(log_on) ORDER BY log_on ASC";			
		//$result_year = $this->db->query($query_year)->result_array();	
		$tmp_daylist = array();
		
		for($p=0;$p<31;$p++) // Create a templory result array default values are zero
		{
			$tmp_daylist[$p] = $p+1;
		}
		//$tmp_monthlist_name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		
		//$tmp_yearlist = array();
		$tmp_mainreturnarr = array();
		
		//$i=0;
		
		//foreach($result_year as $rows_year)
		//{
		//	$tmp_yearlist[$i] = $rows_year['yearlist'];
		//	$i++;
		//}
		
		$tmp_powercon = array();
		
		//$this->db->where('user_id',$user_id);
		//$result1 = $this->db->get('power_location')->result_array();

		//foreach($result1 as $rows1)
		//{
			$this->db->where('power_location_id',$location_id);
			$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_daylist2 = $tmp_daylist;
			$tmp_resultarr = array();
			
			
			
			//if(!empty($result2))
			//{
				foreach($result2 as $rows2)
				{
					for($i=0;$i<31;$i++) // Create a templory result array default values are zero
					{
						$tmp_resultarr[$i] = 0;
					}
					
					$query1_p1 = " maindevice_id = " . "'" . $rows2['device_id'] . "'";
				
					$query1 = "SELECT SUM(pcon) AS totalpcon,DAYOFMONTH(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " AND YEAR(log_on) = '". $year ."' AND MONTH(log_on) = '". $month ."' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on) ORDER BY log_on ASC";
					//echo $query1."<br>";
					$result3 = $this->db->query($query1)->result_array();
					
					foreach($result3 as $result3_row)
					{
						$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_daylist2)] = floatval($result3_row['totalpcon'])/1000;
						
					}
	
					$tmp_powercon[] = array($rows2['device_title']=>$tmp_resultarr);
					unset($tmp_resultarr);
				}//die();
				//$tmp_powercon = array();
				
			//}
			
			//print_r($tmp_resultarr);echo "<br>";
		//}
	
		$tmp_mainreturnarr = array('headtext'=>'Daily Average Power Consumption','xtitle'=>$tmp_daylist,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}

	//---------------------------------------------------------------------------------------------------------------
	
	function sd_y_data($user_id,$maindevice_id)
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
		
		$this->db->where('maindevice_id',$maindevice_id);
		$result1 = $this->db->get('power_user_subdevices')->result_array();

		foreach($result1 as $rows1)
		{
			//$this->db->where('power_location_id',$location_id);
			//$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_yearlist2 = $tmp_yearlist;
			$tmp_resultarr = array();
			
			
			
			//if(!empty($result2))
			//{
				//foreach($result2 as $rows2)
				//{
					for($p=0;$p<$i;$p++) // Create a templory result array default values are zero
					{
						$tmp_resultarr[$p] = 0;
					}
					
					$query1_p1 = " device_id = " . "'" . $rows1['device_id'] . "'";
				
					$query1 = "SELECT device_id,SUM(pcon) AS totalpcon,YEAR(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " GROUP BY YEAR(log_on) ORDER BY log_on ASC";
					
					$result3 = $this->db->query($query1)->result_array();
					
					foreach($result3 as $result3_row)
					{
						$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_yearlist2)] = floatval($result3_row['totalpcon'])/1000;
						
					}
					$tmp_powercon[] = array($rows1['device_title']=>$tmp_resultarr);
					unset($tmp_resultarr);
					
				//}
				//$tmp_powercon = array();
				
			//}
			
			//print_r($tmp_resultarr);echo "<br>";
		}

		$tmp_mainreturnarr = array('headtext'=>'Yearly Average Power Consumption','xtitle'=>$tmp_yearlist,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}

	function sd_m_data($user_id,$maindevice_id,$year)
	{
		//$query_year = "SELECT YEAR(log_on) AS yearlist FROM power_spl_hour GROUP BY YEAR(log_on) ORDER BY log_on ASC";			
		//$result_year = $this->db->query($query_year)->result_array();	
		//$tmp_yearlist = array();
		$tmp_monthlist = array('1','2','3','4','5','6','7','8','9','10','11','12');
		$tmp_monthlist_name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$tmp_mainreturnarr = array();
		
		//$i=0;
		
		//foreach($result_year as $rows_year)
		//{
		//	$tmp_yearlist[$i] = $rows_year['yearlist'];
		//	$i++;
		//}
		
		$tmp_powercon = array();
		
		$this->db->where('maindevice_id',$maindevice_id);
		$result1 = $this->db->get('power_user_subdevices')->result_array();

		foreach($result1 as $rows1)
		{
			//$this->db->where('power_location_id',$location_id);
			//$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_monthlist2 = $tmp_monthlist;
			$tmp_resultarr = array();
			
			
			
			//if(!empty($result2))
			//{
				//foreach($result2 as $rows2)
				//{
					for($p=0;$p<12;$p++) // Create a templory result array default values are zero
					{
						$tmp_resultarr[$p] = 0;
					}
					
					$query1_p1 = " device_id = " . "'" . $rows1['device_id'] . "'";
				
					$query1 = "SELECT device_id,SUM(pcon) AS totalpcon,MONTH(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " AND YEAR(log_on) = '". $year ."' GROUP BY YEAR(log_on),MONTH(log_on) ORDER BY log_on ASC";
					
					$result3 = $this->db->query($query1)->result_array();
					
					foreach($result3 as $result3_row)
					{
						$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_monthlist2)] = floatval($result3_row['totalpcon'])/1000;
						
					}
					$tmp_powercon[] = array($rows1['device_title']=>$tmp_resultarr);
					unset($tmp_resultarr);
					
				//}
				//$tmp_powercon = array();
				
			//}
			
			//print_r($tmp_resultarr);echo "<br>";
		}

		$tmp_mainreturnarr = array('headtext'=>'Monthly Average Power Consumption','xtitle'=>$tmp_monthlist_name,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}
	
	function sd_d_data($user_id,$maindevice_id,$year,$month)
	{
		//$query_year = "SELECT YEAR(log_on) AS yearlist FROM power_spl_hour GROUP BY YEAR(log_on) ORDER BY log_on ASC";			
		//$result_year = $this->db->query($query_year)->result_array();	
		//$tmp_yearlist = array();
		$tmp_daylist = array();//('1','2','3','4','5','6','7','8','9','10','11','12');
		//$tmp_monthlist_name = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		
		for($p=0;$p<31;$p++) // Create a templory result array default values are zero
		{
			$tmp_daylist[$p] = $p+1;
		}
		
		$tmp_mainreturnarr = array();
		
		//$i=0;
		
		//foreach($result_year as $rows_year)
		//{
		//	$tmp_yearlist[$i] = $rows_year['yearlist'];
		//	$i++;
		//}
		
		$tmp_powercon = array();
		
		$this->db->where('maindevice_id',$maindevice_id);

		$result1 = $this->db->get('power_user_subdevices')->result_array();

		foreach($result1 as $rows1)
		{
			//$this->db->where('power_location_id',$location_id);
			//$result2 = $this->db->get('power_user_device')->result_array();
			
			$query1_p1 = "";	
			$tmp_daylist2 = $tmp_daylist;
			$tmp_resultarr = array();
			
			
			
			//if(!empty($result2))
			//{
				//foreach($result2 as $rows2)
				//{
					for($p=0;$p<31;$p++) // Create a templory result array default values are zero
					{
						$tmp_resultarr[$p] = 0;
					}
					
					$query1_p1 = " device_id = " . "'" . $rows1['device_id'] . "'";
				
					$query1 = "SELECT device_id,SUM(pcon) AS totalpcon,DAYOFMONTH(log_on) AS new_logon FROM power_spl_hour WHERE " . $query1_p1 . " AND YEAR(log_on) = '". $year ."' AND MONTH(log_on) = '". $month ."' GROUP BY YEAR(log_on),MONTH(log_on),DAYOFMONTH(log_on) ORDER BY log_on ASC";
					
					$result3 = $this->db->query($query1)->result_array();
					
					foreach($result3 as $result3_row)
					{
						$tmp_resultarr[array_search($result3_row['new_logon'], $tmp_daylist2)] = floatval($result3_row['totalpcon'])/1000;
						
					}
					$tmp_powercon[] = array($rows1['device_title']=>$tmp_resultarr);
					unset($tmp_resultarr);
					
				//}
				//$tmp_powercon = array();
				
			//}
			
			//print_r($tmp_resultarr);echo "<br>";
		}

		$tmp_mainreturnarr = array('headtext'=>'Daily Average Power Consumption','xtitle'=>$tmp_daylist,'mapdata'=>$tmp_powercon);
		
		return $tmp_mainreturnarr;
		//print_r($tmp_mainreturnarr);echo "<br>";die();
	}
	
}