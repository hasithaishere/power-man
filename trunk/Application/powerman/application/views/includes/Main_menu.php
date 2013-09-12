<!-- start: Main Menu-->
<div class="span2 main-menu-span"><!--/span-->
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo base_url(); ?>main_panel"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="<?php echo base_url(); ?>power_monitoring"><i class="icon-eye-open icon-white"></i><span class="hidden-tablet"> Monitor</span></a></li>
						<li><a class="dropmenu" href="#"><i class="icon-edit icon-white"></i><span class="hidden-tablet"> Control</span></a>
                        
                        <ul>
                        <li><a class="submenu" href="<?php echo base_url(); ?>locations"><i class="fa-icon-file-alt"></i><span class="hidden-tablet">Locations</span></a></li>
								<li><a class="submenu" href="<?php echo base_url(); ?>Upgrade_Package"><i class="fa-icon-file-alt"></i><span class="hidden-tablet">Upgrade Package</span></a></li>
								<li><a class="submenu" href="<?php echo base_url(); ?>device_on_off"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Device On/Off</span></a></li>
								
							</ul>	
                   
                        </li>
                        
						<li>
							<a class="dropmenu" href="#"><i class="icon-list-alt icon-white"></i><span class="hidden-tablet"> Add</span></a>
							<ul>
								
								<li><a class="submenu" href="#"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Add Location</span></a></li>
                                <?php // if(in_array(1,$user_roles_arr))
						//{?>
                                <li><a class="submenu" href="<?php echo base_url(); ?>add_newPackage"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Add New Package</span></a></li>
                        <?php // } ?>
                                
								<li><a class="submenu" href="<?php echo base_url(); ?>main_devices"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Add Main Device</span></a></li>
							</ul>	
						</li>
                        <?php // if(in_array(5,$user_roles_arr))
						//{?>
						<li>
							<a class="dropmenu" href="#"><i class="icon-star icon-white"></i><span class="hidden-tablet"> Settings</span></a>
							<ul>
								<li><a class="submenu" href="#"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> My Profile</span></a></li>
								<li><a class="submenu" href="#"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Sensor Settings</span></a></li>
								<li><a class="submenu" href="<?php echo base_url(); ?>users"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> User Settings</span></a></li>
                                <li><a class="submenu" href="#"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Device Settings</span></a></li>
							</ul>	
						</li>
                        <?php //} ?>
                        
                        <?php //if(in_array(9,$user_roles_arr) || in_array(11,$user_roles_arr))
						// {?>
						<li><a href="#"><i class="icon-font icon-white"></i><span class="hidden-tablet"> Reports</span></a></li>
						<?php // } ?>
                        <!--<li><a href="#"><i class="icon-picture icon-white"></i><span class="hidden-tablet"> Accessories</span></a></li>
						<li><a href="#"><i class="icon-align-justify icon-white"></i><span class="hidden-tablet"> Online User</span></a></li>-->						<?php // if(in_array(13,$user_roles_arr))
						// {?>
						<li><a href="#"><i class="icon-calendar icon-white"></i><span class="hidden-tablet"> Suggestions</span></a></li>
				  <?php // }?>
                        <!--<li><a href="#"><i class="icon-th icon-white"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a href="#"><i class="icon-folder-open icon-white"></i><span class="hidden-tablet"> File Manager</span></a></li>-->
						<?php // if(in_array(1,$user_roles_arr))
						//{?>
						<li><a href="<?php echo base_url(); ?>create_user"><i class="icon-lock icon-white"></i><span class="hidden-tablet">Create a User</span></a></li>
						<?php // } ?>
					</ul>
				</div>
			</div><!--/span-->
<!-- end: footer-->			