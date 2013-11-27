<?php

class electricity_bill_calculator_model extends CI_Model
{
	function calculate()
	{
		$query1 = "SELECT SUM(pcon) AS total_pcon FROM power_spl_hour WHERE YEAR(log_on) = '". $this->input->post('year') ."' AND MONTH(log_on) = '". $this->input->post('month') ."'";
		
		$result = $this->db->query($query1)->result_array();
		
		$pcon = 0;
		
		foreach($result as $result_row)
		{
			$pcon = $result_row['total_pcon'];
		}
		
		$month_dates = cal_days_in_month(CAL_GREGORIAN,$this->input->post('month'),$this->input->post('year'));
		
		$units = $pcon/($month_dates*24*1000);
		$price = 0;
		
		if($units<30)
		{
			$price = $units * 5 + ($units * 5 * 0.25) + 30;
		}
		else
		{
			if($units<60)
			{
				$price = $units * 6 + ($units * 6 * 0.35) + 60;
			}
			else
			{
				if($units<90)
				{
					$price = $units * 8.5 + ($units * 8.5 * 0.4) + 90;
				}
				else
				{
					if($units<120)
					{
						$price = $units * 15 + ($units * 15 * 0.4) + 315;
					}
					else
					{
						if($units<180)
						{
							$price = $units * 20 + ($units * 20 * 0.4) + 315;
						}
						else
						{
							if($units<210)
							{
								$price = $units * 24 + ($units * 24 * 0.4) + 315;
							}
							else
							{
								if($units<300)
								{
									$price = $units * 26 + ($units * 26 * 0.4) + 315;
								}
								else
								{
									if($units<900)
									{
										$price = $units * 32 + ($units * 32 * 0.4) + 315;
									}
									else
									{
										$price = $units * 34 + ($units * 34 * 0.4) + 315;
									}
								}
							}
						}
					}
				}
			}
		}
		
		return (array('units' => round($units,2),'price' => round($price,2)));
		
	}
	
}