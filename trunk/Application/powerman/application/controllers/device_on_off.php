<?php

class device_on_off extends CI_Controller
{
	function index()
	{
		//$CI =& get_instance();
		
		//$this->load->helper('randomgenerator');
		//sendemail(array('from'=>'ruslpowerman@gmail.com','to'=>'hasitha.hpmax@gmail.com','subject'=>'test mail 1','message'=>'hi hasitha'));
		
					$this->load->library('email_sender');
					
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
					}
			
		//die(randomPassword()."====".randomPhoneCode());
		//$this->load->view('device_on_off');

		
		
		
	}
	
	
}