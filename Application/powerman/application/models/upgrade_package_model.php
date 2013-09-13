<?php

class upgrade_package_model extends CI_Model
{
	function upgrade_packageM()
	{
		//$this->load->helper('randomgenerator');
		
		//$email_code_val = randomEmailCode();
		//$phone_code_val = randomPhoneCode();
		
		$package_data = array(
			'current_package' => $this->input->post('pack1'),
			'serial_number' => $this->input->post('s_number'),
			'description' => $this->input->post('description'),
			'new_package' => $this->input->post('pack2'),
			'no_of_devices' => $this->input->post('devices'),
			
		);
		
		$return_val = $this->db->insert('power_upgradepackage',$package_data);
            return $return_val;

      }
      
	 // function  get_CurrentPackage(){
	  
	  //$query = $this->db->query("SELECT current_package FROM power_upgradepackage");
	 // }    
}
/*function get_packages()
	{
		$this->db->where('status','1');
		$result = $this->db->get('power_upgradepackage')->result_array();

		return $result;
	}

}*/