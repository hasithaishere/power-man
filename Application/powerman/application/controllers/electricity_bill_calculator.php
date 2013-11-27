<?php

class electricity_bill_calculator extends CI_Controller
{
	function index()
	{
		$data['units'] = 0;
		$data['price'] = 0;
		
		$this->load->view('electricity_bill_calculator',$data);
	}
	
	function calculate()
	{
		
			$this->load->model('electricity_bill_calculator_model');
			
			$query = $this->electricity_bill_calculator_model->calculate();
			
			$data['units'] = $query['units'];
			$data['price'] = $query['price'];
				
			$this->load->view('electricity_bill_calculator',$data);
			
	}
	
}