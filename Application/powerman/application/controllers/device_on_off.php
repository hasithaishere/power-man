<?php

class device_on_off extends CI_Controller
{
	function index($maindevice_id)
	{
		
		$maindevice_id = $this->encrypt_data->decode($maindevice_id);
		//echo $maindevice_id; die();
		$this->load->model('deviceonoff_model');
		$result = $this->deviceonoff_model->get_subdevices($maindevice_id);	
		$result2 = $this->deviceonoff_model->get_subdevices_control($maindevice_id);	
		$result_bc = $this->deviceonoff_model->get_breadcrumb($maindevice_id);
		
		$data = array('content'=>$result,'content2'=>$result2,'content3'=>$result_bc,'user_roles_arr'=>$this->session->userdata('user_roles'));
		
		if(!($this->session->userdata('is_logged_in')))
		{
			$this->load->view('access_denied');
		}
		else 
		{
			$this->load->view('device_on_off',$data);
		}
		
		//$CI =& get_instance();
		
		//$this->load->helper('randomgenerator');
		//sendemail(array('from'=>'ruslpowerman@gmail.com','to'=>'hasitha.hpmax@gmail.com','subject'=>'test mail 1','message'=>'hi hasitha'));
		
					/*$this->load->library('email_sender');
					
					$data1 = array(
						'email' =>  'hasitha@gmail.com',
						'password' => 'fds54DSgrw',
						'email_code' => 'sfgst45fsw54y65'
					);
					
					$message=$this->load->view('email_template',$data1,TRUE);
					$data = array('from'=>'ruslpowerman@gmail.com','sender'=>'Power Man Admin','to'=>'hasitha.hpmax@gmail.com','receiver'=>'Hasitha Prabhath Gamage','subject'=>'test mail 1','message'=>$message);
					
					$result2 = $this->email_sender->send_email($data);
					
					if($result2)
					{
						echo "Ohh Yheee";
					}*/
			
		//die(randomPassword()."====".randomPhoneCode());
		//$this->load->view('device_on_off');
		
		///////////////////////////////////////////////////////////////////
		//$data = array('name'=>'hasitha','arr1'=>$this->session->userdata('user_roles'));
		//$this->load->view('error_user',$data);
		///////////////////////////////////////////////////////////////////
		
		
/*
		$this->load->model('login_model');
		$result = $this->login_model->validate1();
				
		
		if($result->num_rows == 1)
		{
			$id_array = array();
			$i = 0;		
					
			foreach($result->result() as $rows)
			{
				$id_array[$i] = (int)($rows->id);
				$i++;
				
			}
			print_r($id_array);
			
			$arr1 = array('1'=>'name','2'=>$id_array);
			
			if(in_array(2, $arr1['2']))
			{
				echo "OK";
			}
			else 
			{
				echo "NOT OK";	
			}
		}
		
*/		
	}

	function switch_device()
	{
		$this->load->model('deviceonoff_model');
		$this->deviceonoff_model->switch_device();
	}
	
	
}