    <div class="sortable row-fluid">
    
    		 <?php             
        //$user_id = $this->session->userdata('user_id');
		$result = $this->db->query("SELECT COUNT(*) as countall FROM power_users WHERE  power_users.status = '1'")->result_array();
				$countval = "0";
				foreach($result as $rows)
				{
					$countval3 = $rows['countall'];
				}
		
				?>		
    
    
    
    
    
    <?php if(in_array(2,$this->session->userdata('user_roles')))echo "

				<a href=\"".base_url()."users_details\" class=\"quick-button span2\">
					<i class=\"fa-icon-group\"></i>
					<p>Users</p>
					<span class=\"notification\">". $countval3."</span>
				</a>";?>
				<a href="<?php echo base_url(); ?>edit_user/index/hhXAaMJXNvvfrV1R2N5t9kYsLgKmaQ8H2IKjsgEh4Lw" class="quick-button span2">
					<i class="fa-icon-user"></i>
					<p>User Profile</p>
					
				</a>
				<a href="<?php echo base_url(); ?>download_report" class="quick-button span2">
					<i class="fa-icon-bar-chart"></i>
					<p>Reports</p>
				</a>
                
                 <?php             
        $user_id = $this->session->userdata('user_id');
		$result = $this->db->query("SELECT COUNT(*) as countall FROM power_user_device,power_alert_sugestions WHERE power_user_device.device_id = power_alert_sugestions.maindevice_id AND power_alert_sugestions.status = '1' AND power_alert_sugestions.notified = '0' AND power_user_device.power_users_id = '".$user_id."'")->result_array();
				$countval = "0";
				foreach($result as $rows)
				{
					$countval2 = $rows['countall'];
				}
		
				?>			
                
                
                
                
				<a href="<?php echo base_url(); ?>suggestion_notifications" class="quick-button span2">
					<i class="fa-icon-cogs"></i>
					<p>Suggestions</p>
                    <span class="notification green"><?php echo $countval2;?></span>
				</a>
                
                
                 <?php             
        $user_id = $this->session->userdata('user_id');
		$result = $this->db->query("SELECT COUNT(*) as countall FROM power_user_device,power_alert_main WHERE power_user_device.device_id = power_alert_main.maindevice_id AND power_alert_main.status = '1' AND power_alert_main.notified = '0' AND power_user_device.power_users_id = '".$user_id."'")->result_array();
				$countval = "0";
				foreach($result as $rows)
				{
					$countval = $rows['countall'];
				}
		
				?>							
                
                
                
                
				<a href="<?php echo base_url(); ?>notifications" class="quick-button span2">
					<i class="fa-icon-bullhorn"></i>
					<p>Alerts</p>
                    <span class="notification red"><?php echo $countval;?></span>
				</a>
				<a href="<?php echo base_url(); ?>locations" class="quick-button span2">
					<i class="fa-icon-map-marker"></i>
					<p>Locations</p>
					
				</a>

			</div>