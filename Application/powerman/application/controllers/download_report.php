<?php

class download_report extends CI_Controller
{
	function index()
	{
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{			
			$data['success_download'] = 0;
			$data['success_msg'] = "";
			$data['user_id'] = $this->session->userdata('user_id');
			
			$this->load->view('download_report',$data);
			
		}
		
	}
	
	function download()
	{
		$user_id = $this->input->post("user_id");
		$year = $this->input->post("year");
		$month = $this->input->post("month");
		
		$server_path = $this->config->item('server_root')."/pdfreport/";
		$server_url = base_url()."pdfreport/";
		
		$filename = "Report_" . $user_id . "_" . $year . "_" . $month . ".pdf";
		
		$filepath = $server_path . $filename;
		$fileurl = $server_url . $filename;
		
		$report_generate_url = base_url() . "pdfreport_generator/report_build/" . $user_id . "/" . $year . "/" . $month;

		$output = shell_exec("wkhtmltopdf " . $report_generate_url . " " . $filepath);
		$output = shell_exec("chmod -R 777 " . $filepath);

		$data['success_download'] = 1;
		$data['success_msg'] = "Download the " . $year . " - " . date("F", mktime(0, 0, 0, $month, 10)) . " power report please <a target=\"_blank\" href=\"" . $fileurl . "\">Click Here</a>.  <img src=\"http://chart.apis.google.com/chart?chs=150x150&amp;cht=qr&amp;chl=". $fileurl ."&amp;choe=UTF-8\" title=\"QR code for mobile device !\">";
		$data['user_id'] = $this->session->userdata('user_id');
			
		$this->load->view('download_report',$data);

		
	}
	
}