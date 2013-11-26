<!-- start: Header Menu -->
<div id="overlay">
		<ul>
		  <li class="li1"></li>
		  <li class="li2"></li>
		  <li class="li3"></li>
		  <li class="li4"></li>
		  <li class="li5"></li>
		  <li class="li6"></li>
		</ul>
	</div>	
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo base_url(); ?>main_panel"> <img alt="Dashboard" src="<?php echo base_url(); ?>img/new.png" /> <span class="hidden-phone">Power Man</span></a>
                                <?php             
        $user_id = $this->session->userdata('user_id');
		$result = $this->db->query("SELECT COUNT(*) as countall FROM power_user_device,power_alert_main WHERE power_user_device.device_id = power_alert_main.maindevice_id AND power_alert_main.status = '1' AND power_alert_main.notified = '0' AND power_user_device.power_users_id = '".$user_id."'")->result_array();
				$countval = "0";
				foreach($result as $rows)
				{
					$countval = $rows['countall'];
				}
		
				?>								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-warning-sign icon-white"></i> <span class="label label-important hidden-phone"><?php echo $countval;?></span> 
							</a>
							<ul class="dropdown-menu notifications">
								
                                
 
                                <li>
									<span class="dropdown-menu-title">You have <?php echo $countval;?> notifications</span>
								</li>	
                 
				   <?php             
        //$user_id = $this->session->userdata('user_id');
		$result = $this->db->query("SELECT power_alert_main.alert_discri,power_alert_main.created_on FROM power_user_device,power_alert_main WHERE power_user_device.device_id = power_alert_main.maindevice_id AND power_alert_main.status = '1' AND power_alert_main.notified = '0' AND power_user_device.power_users_id = '".$user_id."'")->result_array();
		
		
				?>
                
                <?php 
				//$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
								$i = 0;
								foreach($result as $rows)
								{
									if($i<10)
									{
										echo "<li><a href=\"#\">";
										echo " <i class=\"icon-user\"></i> <span class=\"message\">".$rows['alert_discri']."</span>";
										echo "<span class=\"time\">".$rows['created_on']."</span>";
										echo "</a></li>";
										$i++;
									}
									
									
									//if ($rows['notified'] == "0") {echo "checked = checked";} 
							
									
									//echo "<td>".$rows['alert_discri']."</td>";
									
							
									
									
									
								}
								?>
                                
                                
                                
                                
                                
                               <!-- 
                            	<li>
                                
                                    <a href="#">
                                    
										+ <i class="icon-user"></i> <span class="message">New user registration</span> <span class="time">1 min</span> 
                                    </a>
                                </li>-->
								
                                <li>
                            		<a class="dropdown-menu-sub-footer" href="<?php echo base_url(); ?>notifications">View all notifications</a>
								</li>	
							</ul>
						</li>
                        
						<!-- start: Notifications Dropdown -->
                        <?php             
        $user_id = $this->session->userdata('user_id');
		$result = $this->db->query("SELECT COUNT(*) as countall FROM power_user_device,power_alert_sugestions WHERE power_user_device.device_id = power_alert_sugestions.maindevice_id AND power_alert_sugestions.status = '1' AND power_alert_sugestions.notified = '0' AND power_user_device.power_users_id = '".$user_id."'")->result_array();
				$countval = "0";
				foreach($result as $rows)
				{
					$countval2 = $rows['countall'];
				}
		
				?>			
                
                
                	
                        
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-tasks icon-white"></i> <span class="label label-success hidden-phone"><?php echo $countval2;?></span>
							</a>
							<ul class="dropdown-menu notifications">
								<li>
									<span class="dropdown-menu-title">You have <?php echo $countval2;?> Suggestions</span>
                            	</li>
                                
                                  <?php             
        //$user_id = $this->session->userdata('user_id');
		$result2 = $this->db->query("SELECT power_alert_sugestions.sug_discri,power_alert_sugestions.created_on FROM power_user_device,power_alert_sugestions WHERE power_user_device.device_id = power_alert_sugestions.maindevice_id AND power_alert_sugestions.status = '1' AND power_alert_sugestions.notified = '0' AND power_user_device.power_users_id = '".$user_id."'")->result_array();
		
		
				?>
                                
                                
                                
                                 <?php 
				//$data = array('content'=>$result,'user_roles_arr'=>$this->session->userdata('user_roles'));
								$i = 0;
								foreach($result2 as $rows)
								{
									if($i<10)
									{
										echo "<li><a href=\"#\">";
										echo " <i class=\"icon-refresh\"></i> <span class=\"message\">".$rows['sug_discri']."</span>";
										echo "<span class=\"time\">".$rows['created_on']."</span>";
										echo "</a></li>";
										$i++;
									}
									
									
									//if ($rows['notified'] == "0") {echo "checked = checked";} 
							
									
									//echo "<td>".$rows['alert_discri']."</td>";
									
							
									
									
									
								}
								?>
 
							
                                <li>
                            		<a class="dropdown-menu-sub-footer" href="<?php echo base_url(); ?>suggestion_notifications">View all notifications</a>
								</li>
							</ul>
						</li>
                        
						<!-- end: Notifications Dropdown -->
						
						<li>
							<a class="btn" href="#">
								<i class="icon-wrench icon-white"></i>
							</a>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-user icon-white"></i>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>edit_user/index/<?php echo $this->encrypt_data->encode($this->session->userdata('user_id'))?>"><i class="icon-user"></i> Profile</a></li>
								<li><a href="<?php echo base_url(); ?>signout"><i class="icon-off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>