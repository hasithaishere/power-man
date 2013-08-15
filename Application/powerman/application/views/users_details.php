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
								  <th>Register Status</th>
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
											
											if($rows['adminstatus'] == 1)
											{
												echo "<td class=\"center\"><span class=\"label label-success\">Active</span></td>";
											}
											else 	
											{
												echo "<td class=\"center\"><span class=\"label label-important\">Deactive</span></td>";
											}
											
											if($rows['registerstatus'] == 1)
											{
												echo "<td class=\"center\"><span class=\"label label-success\">Active</span></td>";
											}
											else 	
											{
												echo "<td class=\"center\"><span class=\"label label-important\">Deactive</span></td>";
											}
											
											echo "<td class=\"center\"><a class=\"btn btn-success\" href=\"#\"><i class=\"icon-zoom-in icon-white\"></i></a>";
											echo "<a class=\"btn btn-info\" href=\"#\"><i class=\"icon-edit icon-white\"></i></a>";
											echo "<a class=\"btn btn-danger\" href=\"#\"><i class=\"icon-trash icon-white\"></i></a></td></tr>";
																				
										
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

	
	
	
</body>
</html>
