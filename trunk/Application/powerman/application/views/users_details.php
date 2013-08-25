<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>			
</head>

<body>
		
	
	<!-- start: Header Menu -->
		<?php include 'includes/headerbar.php'; ?>
<!-- end: Header Menu -->
	
	
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
            <?php include 'includes/Main_menu.php'; ?>
			<!-- end: Main Menu -->
			
			
			<div id="content" class="span10">
			<!-- start: Content -->
			
			<div>
				<hr>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url(); ?>main_panel">Home</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url(); ?>users_details">All Users</a>
					</li>
                    
					
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
            <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" style="margin-bottom:5px;" data-original-title>
						<a href="<?php echo base_url(); ?>create_user" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i><span class="break"></span> ADD New User</a>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>User Name</th>
								  <th>Email</th>
								  <th>Phone No</th>
								  <th>Package</th>
								  <th>Admin Status</th>
								  <!--<th>Register Status</th>-->
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							
								<?php

									foreach($content as $rows)
									{
											echo "<tr><td>".$rows['fname']." ".$rows['lname']."</td>";
											echo "<td class=\"center\">". $rows['email']."</td>";
											echo "<td class=\"center\">". $rows['phoneno']."</td>";
											if($rows['package'] == 1)
											{
												echo "<td class=\"center\">Home Edition</td>";
											}
											else 
											{
												if($rows['package'] == 2)
												{
													echo "<td class=\"center\">Small Business Edition</td>";
												}	
												else 
												{
													echo "<td class=\"center\">Enterprise Edition</td>";
												}
											}
											
											$val_admin_s = "";
											
											if($rows['adminstatus'] == 1)
											{
												echo "<td class=\"center\"><span class=\"label label-success\">Active</span></td>";
												$val_admin_s = "Disable";
											}
											else 	
											{
												echo "<td class=\"center\"><span class=\"label label-important\">Deactive</span></td>";
												$val_admin_s = "Enable";
											}
											
											/*if($rows['registerstatus'] == 1)
											{
												echo "<td class=\"center\"><span class=\"label label-success\">Active</span></td>";
											}
											else 	
											{
												echo "<td class=\"center\"><span class=\"label label-important\">Deactive</span></td>";
											}*/
											
											echo "<td class=\"center\"><a class=\"btn btn-success check_pc\" href=\"#\" user_id=\"". $rows['id'] ."\" style=\"margin-right: 2px;\"><i class=\"icon-zoom-in icon-white\"></i></a>";
											
											echo "<div class=\"btn-group\">";
									        echo "<a class=\"btn btn-info\" href=\"#\"><i class=\"icon-edit icon-white\"></i></a>";
											echo "<a class=\"btn btn-info dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"caret\"></span></a>";
									        echo "<ul class=\"dropdown-menu\" style=\"min-width:88px;\">";
											
									        echo "<li><a href=\"". base_url() ."edit_user/index/" . $this->encrypt_data->encode($rows['id']) . "\" user_id=\"". $rows['id'] ."\"><i class=\"icon-pencil\"></i> Profile</a></li>";
									        echo "<li><a href=\"#change_status_user\" user_id=\"". $rows['id'] ."\" admin_s=\"" .$rows['adminstatus'] . "\" class=\"changestatus_s\" data-toggle=\"modal\"><i class=\"icon-ban-circle\"></i> " . $val_admin_s . "</a></li>";
									        
									        echo "<li class=\"divider\"></li>";
									        
									        echo "<li><a href=\"#delete_user\" user_id=\"". $rows['id'] ."\" data-toggle=\"modal\" class=\"deluser_s\"><i class=\"icon-trash\"></i> Delete</a></li>";
									        
									        echo "</ul></div>";
											
											//echo "<a class=\"btn btn-info user_sett\"  data-toggle=\"modal\" href=\"#settings_panel\" user_id=\"". $rows['id'] ."\" admin_s=\"" . $rows['adminstatus'] . "\" reg_s=\"" . $rows['registerstatus'] . "\"><i class=\"icon-edit icon-white\"></i></a>";
											//echo "<a class=\"btn btn-danger\" href=\"#\" user_id=\"". $rows['id'] ."\"><i class=\"icon-trash icon-white\"></i></a></td></tr>";
																				
										
									}
									//echo "<td>Admin</td>";
									
								?>
								
								<!--<td>Admin</td>
								<td class="center">Admin@gmail.com</td>
								<td class="center">Administrator</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i>
                                        
									</a>
								</td>
							</tr>-->
							<!--<tr>
								<td>Domore Technologies</td>
								<td class="center">Domore@gmail.com</td>
								<td class="center">Customer</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
									</a>
								</td>
							</tr>-->
                            </tbody>
                        </table>
                           
                        
					</div>
				</div><!--/span-->
			
			</div>
			<hr>
			
		
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
		</div>		
	</div><!--/.fluid-container-->

	<!-- Modals Start -->
		<div id="delete_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Confirm Delete User</h3>
		</div>
		<div class="modal-body">
		<p>Do you want to delete this user?</p>
		</div>
		<div class="modal-footer">
			<a href="#" role="button" class="btn btn-danger" id="model_btn_deluser"><i class="icon-trash icon-white"></i> Delete</a>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		
		</div>
		</div>
	<!-- Modals End -->
	
	<!-- Modals Start -->
		<div id="change_status_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel" class="cs_user_header"></h3>
		</div>
		<div class="modal-body cs_user_body">
			<p></p>
		</div>
		<div class="modal-footer">
			<a href="#" role="button" class="btn btn-danger" id="model_btn_csuser"></a>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		
		</div>
		</div>
	<!-- Modals End -->



		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				
				$(".deluser_s").click(function(){
					
					$("#model_btn_deluser").attr('href',"<?php echo base_url();?>users_details/delete_user/" + $(this).attr('user_id'));
				
				});
				
				$(".changestatus_s").click(function(){
					
					var enable_temp_val = "1";
					
					if($(this).attr('admin_s') == 1)
					{
						$('#model_btn_csuser').removeClass("btn btn-success").addClass("btn btn-danger");
						$(".cs_user_header").text("Disable User");
						$(".cs_user_body p").text("Do you want to disable this user?");
						$("#model_btn_csuser").html("<i class=\"icon-user icon-white\"></i> Disable");
						enable_temp_val = "0";
					}
					else
					{
						if($(this).attr('admin_s') == 0)
						{
							$('#model_btn_csuser').removeClass("btn btn-danger").addClass("btn btn-success");
							$(".cs_user_header").text("Enable User");
							$(".cs_user_body p").text("Do you want to enable this user?");
							$("#model_btn_csuser").html("<i class=\"icon-user icon-white\"></i> Enable");
						}
					}

					$("#model_btn_csuser").attr('href',"<?php echo base_url();?>users_details/change_state_user/" + $(this).attr('user_id') + "/" + enable_temp_val);
				
				});

				
			});
			
		</script>

	
	
	
</body>
</html>
