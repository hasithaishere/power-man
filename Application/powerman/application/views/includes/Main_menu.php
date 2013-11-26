<!-- start: Main Menu-->
<div class="span2 main-menu-span"><!--/span-->
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
                    
                    
						<li><a href="<?php echo base_url(); ?>main_panel"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                        
                        
                        
						
						<li><a class="dropmenu" href="#"><i class="icon-edit icon-white"></i><span class="hidden-tablet"> Control</span></a>
                        
                        <ul>
                        <li><a class="submenu" href="<?php echo base_url(); ?>locations"><i class="fa-icon-file-alt"></i><span class="hidden-tablet">Locations</span></a></li>
								<li><a class="submenu" href="<?php echo base_url(); ?>Upgrade_Package"><i class="fa-icon-file-alt"></i><span class="hidden-tablet">Upgrade Package</span></a></li>
								
								
						</ul>	
                        </li>
                        
                        
                        
						<li>
							<a class="dropmenu" href="#"><i class="icon-list-alt icon-white"></i><span class="hidden-tablet"> Add</span></a>
                            
							<ul>
								
                                <li><a class="submenu" href="<?php echo base_url(); ?>add_location"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Add Location</span></a></li>
                                <?php // if(in_array(1,$user_roles_arr))
						//{?>
                                <li><a class="submenu" href="<?php echo base_url(); ?>add_newPackage"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Add New Package</span></a></li>
                        <?php // } ?>
                                
								<li><a class="submenu" href="<?php echo base_url(); ?>power_device"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Add Power Device</span></a></li>
                                
                                <li><a class="submenu" href="<?php echo base_url(); ?>define_device"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Define the Devices</span></a></li>
                                
							</ul>	
						</li>
                        <?php // if(in_array(5,$user_roles_arr))
						//{?>
                        
                        
						<li>
							<a class="dropmenu" href="#"><i class="icon-star icon-white"></i><span class="hidden-tablet"> Settings</span></a>
							<ul>
								<li><a class="submenu" href="<?php echo base_url(); ?>edit_user/index/hhXAaMJXNvvfrV1R2N5t9kYsLgKmaQ8H2IKjsgEh4Lw"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> My Profile</span></a></li>
								<li><a class="submenu" href="<?php echo base_url(); ?>create_user"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Create User</span></a></li>
								<li><a class="submenu" href="<?php echo base_url(); ?>users_details"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> All Users</span></a></li>
                                <li><a class="submenu" href="<?php echo base_url(); ?>alert_config"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Alert Configuration</span></a></li>
							</ul>	
						</li>
                        <?php //} ?>
                        
                        <?php //if(in_array(9,$user_roles_arr) || in_array(11,$user_roles_arr))
						// {?>
                        
                        
                        
						<li><a href="<?php echo base_url(); ?>download_report"><i class="icon-font icon-white"></i><span class="hidden-tablet"> Reports</span></a></li>
						<?php // } ?>
                       					
						<li><a href="<?php echo base_url(); ?>suggestion_notifications"><i class="icon-cog icon-white"></i><span class="hidden-tablet"> Suggestions</span></a></li>
				  <?php // }?>
                        <!--<li><a href="#"><i class="icon-th icon-white"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a href="#"><i class="icon-folder-open icon-white"></i><span class="hidden-tablet"> File Manager</span></a></li>-->
						
					</ul>
				</div>
			</div><!--/span-->
<!-- end: footer-->			