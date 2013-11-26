<?php

class pdfreport_generator extends CI_Controller
{
	function index()
	{/*
		$data = array(
		'email' =>  'hasitha@gmail.com',
		'password' => 'fds54DSgrw',
		'email_code' => 'sfgst45fsw54y65'
		);
			*/
		$this->load->view('pdfreport_generator'/*,$data*/);
		
	}
	
	function create_it()
	{
		$output = shell_exec("wkhtmltopdf http://powerman.hp/pdfreport_generator/report_build/2/2013/10 /home/hasitha/projects/new.pdf");
		$output = shell_exec("chmod -R 777 /home/hasitha/projects/test123.pdf");
		echo $output;

	}
	
	function report_build($user_id = NULL,$year = NULL,$month = NULL)
	{
		$data['year'] = $year;
		$data['month'] = date("F", mktime(0, 0, 0, $month, 10));
		
		$data['js_bulk'] = "";
		$data['html_bulk'] = "";
		
		//$user_id = "2";
		//$year = "2013";
		//$month = "10";
		
		//Get location data -START
		$this->load->model('power_monitoring_model');
		$this->load->model('pdfreport_generator_model');
		//-----------Insert Location Chart - START
		//JS- Part-Start
		$result1 = $this->power_monitoring_model->loc_d_data($user_id,$year,$month);
		
		//$data['js_bulk'] .= "$('#" . "loc1" . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25 }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base', x: -20 }, xAxis: { categories: " . json_encode($result1['xtitle']) . " }, yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
		$data['js_bulk'] .= "$('#" . "main_location" . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25, animation: { duration: 0 } }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base',x: -20}, xAxis: { categories: " . json_encode($result1['xtitle']) . "},yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
		$data['js_bulk'] .= "series: [";
            
				$datastring = "";
				//print_r($mapdata);
				foreach($result1['mapdata'] as $level2)
				{
					foreach($level2 as $key => $val)
					{
						$datastring .= "{ name: '" . $key . "', data: " . json_encode($val) . "},";
					}
				}
				$datastring = rtrim($datastring,',');
				$datastring = str_replace("\"", "'", $datastring);
				$data['js_bulk'] .= $datastring;
            	$data['js_bulk'] .= "]";
            	
		$data['js_bulk'] .= "});";
		$data['js_bulk'] .= "\n";
		//JS- Part-Stop
		
		//HTML - Part-Start
			$data['html_bulk'] .= "<div class=\"row\" style=\"margin-top:15px;\"><div class=\"content-left-topic\" style=\"width:150px;height:300px;margin-top:40px;\">Total Consumption of all the locations.</div><div class=\"content-left-topic\" style=\"width:450px;height:300px;\"><div id=\"main_location\" style=\"min-width: 600px; height: 400px; margin: 0 auto\"></div></div></div><hr class=\"space20\" /><hr/>\n";
		//HTML - Part-Stop
		//-----------Insert Location Chart - END
		
		//Start - Getting main device details
		
		$location_result = $this->pdfreport_generator_model->get_userlocations($user_id);
		
		foreach($location_result as $location_result_row)
		{
			
			//-----------Insert Main Device Chart - START
			//JS- Part-Start
			$result1 = $this->power_monitoring_model->md_d_data($user_id,$location_result_row['id'],$year,$month);
			
			$rand_id1 = rand(0, 999);
			$html_write1 = 0;
			$data_tmp1 = "";
			//$data['js_bulk'] .= "$('#" . "loc1" . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25 }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base', x: -20 }, xAxis: { categories: " . json_encode($result1['xtitle']) . " }, yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
			$data_tmp1 .= "$('#" . "loc" . $rand_id1 . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25, animation: { duration: 0 } }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base',x: -20}, xAxis: { categories: " . json_encode($result1['xtitle']) . "},yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
			$data_tmp1 .= "series: [";
	            
					$datastring = "";
					//print_r($mapdata);
					foreach($result1['mapdata'] as $level2)
					{
						foreach($level2 as $key => $val)
						{
							$datastring .= "{ name: '" . $key . "', data: " . json_encode($val) . "},";
							$html_write1 = 1;
						}
					}
					$datastring = rtrim($datastring,',');
					$datastring = str_replace("\"", "'", $datastring);
					$data_tmp1 .= $datastring;
	            	$data_tmp1 .= "]";
	            	
			$data_tmp1 .= "});";
			$data_tmp1 .= "\n";
			//JS- Part-Stop
			
			//HTML - Part-Start
				if($html_write1 == 1)
				{
					$data['html_bulk'] .= "<div class=\"row\" style=\"margin-top:15px;\"><div class=\"content-left-topic\" style=\"width:150px;height:300px;margin-top:40px;\">Total Consumption of ". $location_result_row['name'] . " - " . $location_result_row['sub_name'] ." .</div><div class=\"content-left-topic\" style=\"width:450px;height:300px;\"><div id=\"". "loc" . $rand_id1 ."\" style=\"min-width: 600px; height: 400px; margin: 0 auto\"></div></div></div><hr class=\"space20\" /><hr/>\n";
					$data['js_bulk'] .= $data_tmp1;
				}
			//HTML - Part-Stop
			//-----------Insert Main Device Chart - END
			
			//Start - Getting main device details
		
			$md_result = $this->pdfreport_generator_model->get_usermaindevices($user_id,$location_result_row['id']);
			
			foreach($md_result as $md_result_row)
			{
				
				//-----------Insert Sub - Device Chart - START
				//JS- Part-Start
				$result2 = $this->power_monitoring_model->sd_d_data($user_id,$md_result_row['device_id'],$year,$month);
		
				$rand_id2 = rand(1000, 9999);
				$html_write2 = 0;
				$data_tmp2 = "";
				//$data['js_bulk'] .= "$('#" . "loc1" . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25 }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base', x: -20 }, xAxis: { categories: " . json_encode($result1['xtitle']) . " }, yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
				$data_tmp2 .= "$('#" . "md" . $rand_id2 . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25, animation: { duration: 0 } }, title: { text: '" . $result2['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base',x: -20}, xAxis: { categories: " . json_encode($result2['xtitle']) . "},yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
				$data_tmp2 .= "series: [";
		            
						$datastring = "";
						//print_r($mapdata);
						foreach($result2['mapdata'] as $level2)
						{
							foreach($level2 as $key => $val)
							{
								$datastring .= "{ name: '" . $key . "', data: " . json_encode($val) . "},";
								$html_write2 = 1;
							}
						}
						$datastring = rtrim($datastring,',');
						$datastring = str_replace("\"", "'", $datastring);
						$data_tmp2 .= $datastring;
		            	$data_tmp2 .= "]";
		            	
				$data_tmp2 .= "});";
				$data_tmp2 .= "\n";
				//JS- Part-Stop
				
				//Start - Alert and Sugestions Writter
				$alertsug_holder = "";
				
				$alert_result = $this->pdfreport_generator_model->get_alerts($user_id,$md_result_row['device_id'],$year,$month);
				$suggestions_result = $this->pdfreport_generator_model->get_suggestions($user_id,$md_result_row['device_id'],$year,$month);
				
				$alertsug_holder .= "<div id=\"descriotion\" style=\"margin-top: 10px; padding: 10px 0px 5px;\"><ul>";
				$alert_status = 0;
				
				foreach ($alert_result as $alert_result_row) 
				{
					if($alert_status == 0)
					{
						$alertsug_holder .= "<span style=\"color: rgb(255, 0, 0); font-size: 19px; font-weight: 700;\"> Alerts (Malfunction and Over Usage)</span>";
						$alert_status = 1;
					}
					
					$alertsug_holder .= "<li>". $alert_result_row['alert_discri'] ."</li>";
				}
				
				$alertsug_holder .= "</ul></div>";
				$alertsug_holder .= "<div id=\"descriotion\" style=\"margin-top: 10px; padding: 10px 0px 5px;\"><ul>";
				$sug_status = 0;

				foreach ($suggestions_result as $suggestions_result_row) 
				{
					if($sug_status == 0)
					{
						$alertsug_holder .= "<span style=\"color:#3C3; font-size: 19px; font-weight: 700;\" id=\"normal\"> Sugestions</span>";
						$sug_status = 1;
					}
					
					$alertsug_holder .= "<li>". $suggestions_result_row['sug_discri'] ."</li>";
				}
				
				$alertsug_holder .= "</ul></div>";
				
				//Stop - Alert and Sugestions Writter
				
				//HTML - Part-Start
					if($html_write2 == 1)
					{
						$data['html_bulk'] .= "<div class=\"row\" style=\"margin-top:15px;\"><div class=\"content-left-topic\" style=\"width:150px;height:300px;margin-top:40px;\">Total Consumption of ". $md_result_row['device_title'] . " - " . $md_result_row['device_description'] ." .</div><div class=\"content-left-topic\" style=\"width:450px;height:300px;\"><div id=\"". "md" . $rand_id2 ."\" style=\"min-width: 600px; height: 400px; margin: 0 auto\"></div></div></div><hr class=\"space20\" />". $alertsug_holder ."<hr/>\n";
						$data['js_bulk'] .= $data_tmp2;
					}
				//HTML - Part-Stop
				//-----------Insert Sub - Device Chart - END
					
			}
			
		}
		
		//Stop - Getting main device details
		

		
		
		
		/*
		$result1 = $this->power_monitoring_model->loc_d_data($user_id,$year,$month);

		//$data['js_bulk'] .= "$('#" . "loc1" . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25 }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base', x: -20 }, xAxis: { categories: " . json_encode($result1['xtitle']) . " }, yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
		$data['js_bulk'] .= "$('#" . "loc1" . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25, animation: { duration: 0 } }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base',x: -20}, xAxis: { categories: " . json_encode($result1['xtitle']) . "},yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
		$data['js_bulk'] .= "series: [";
            
				$datastring = "";
				//print_r($mapdata);
				foreach($result1['mapdata'] as $level2)
				{
					foreach($level2 as $key => $val)
					{
						$datastring .= "{ name: '" . $key . "', data: " . json_encode($val) . "},";
					}
				}
				$datastring = rtrim($datastring,',');
				$datastring = str_replace("\"", "'", $datastring);
				$data['js_bulk'] .= $datastring;
            	$data['js_bulk'] .= "]";
            	
		$data['js_bulk'] .= "});";
		
		//2nd
		$data['js_bulk2'] = "";
		
		$data['js_bulk2'] .= "$('#" . "loc2" . "').highcharts({ chart: { type: 'line', marginRight: 130, marginBottom: 25, animation: { duration: 0 } }, title: { text: '" . $result1['headtext'] . "', x: -20 }, subtitle: { text: 'Location Base',x: -20}, xAxis: { categories: " . json_encode($result1['xtitle']) . "},yAxis: { title: { text: 'Wattage (KW)' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] }, tooltip: { valueSuffix: 'KW' }, legend: { layout: 'vertical', align: 'right', verticalAlign: 'top', x: -10, y: 100, borderWidth: 0 }, plotOptions: { series: { enableMouseTracking: false, shadow: false, animation: false } },";
		$data['js_bulk2'] .= "series: [";
            
				$datastring = "";
				//print_r($mapdata);
				foreach($result1['mapdata'] as $level2)
				{
					foreach($level2 as $key => $val)
					{
						$datastring .= "{ name: '" . $key . "', data: " . json_encode($val) . "},";
					}
				}
				$datastring = rtrim($datastring,',');
				$datastring = str_replace("\"", "'", $datastring);
				$data['js_bulk2'] .= $datastring;
            	$data['js_bulk2'] .= "]";
            	
		$data['js_bulk2'] .= "});";*/
		//echo $data['js_bulk'];
		//echo "<br>";
		//echo $data['html_bulk'];
		
		
		
		
		

		$this->load->view('pdfreport_generator',$data);
		
		
		
		//Get location data -STOP
	}
	
	
}