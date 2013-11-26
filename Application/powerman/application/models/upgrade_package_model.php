<?php

class upgrade_package_model extends CI_Model
{
	function get_oldpackage()
	{
		$query1 = "SELECT id,package_id,expired_on FROM power_user_packges WHERE user_id = '". $this->session->userdata('user_id') ."' ORDER BY expired_on desc LIMIT 1";
		
		$result = $this->db->query($query1)->result_array();
		
		return $result;
	}
	
	function upgrade_package()
	{
		$user_id = $this->session->userdata('user_id');
		$oldpackage_id = $this->input->post('old_package_id');
		$newpackage_id = $this->input->post('newpackage');
		$expired_on = $this->input->post('expired_on');
		
		$query1 = "INSERT INTO power_user_packges (user_id,package_id,expired_on,created_by,created_on) VALUES ('". $user_id ."','". $newpackage_id ."',(SELECT DATE_ADD('". $expired_on ."', INTERVAL (SELECT duration FROM power_packges WHERE id = '". $newpackage_id ."') DAY)),'". $user_id ."',NOW())";
		
		$return_val = $this->db->query($query1);
		
		$query2 = "UPDATE power_user_packges SET status = '0' WHERE id = '" . $oldpackage_id . "'";
		
		$return_val = $this->db->query($query2);
		
        return $return_val;

      }
      
}
