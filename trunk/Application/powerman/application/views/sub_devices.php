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
						<a href="<?php echo base_url(); ?>locations">Locations</a><span class="divider">/</span>
					</li>
                    
					<li>
						<a href="<?php echo base_url(); ?>main_devices">Main Devices</a><span class="divider">/</span>
					</li>
                    
                    <li>
						<a href="<?php echo base_url(); ?>sub_devices">Sub Devices</a>
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
						<a class="btn btn-primary"><i class="icon-plus-sign icon-white"></i><span class="break"></span> ADD Sub Devices</a>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Sub Device</th>
								  <th>Location</th>
								  <th>Main Device</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>Television</td>
								<td class="center">Domore Office Area</td>
								<td class="center">Main Device 01</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="<?php echo base_url(); ?>power_monitoring">
										<i class="icon-zoom-in icon-white"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i>
                                        
									</a>
								</td>
							</tr>
							<tr>
								<td>LED Bulb</td>
								<td class="center">Domore Office Area</td>
								<td class="center">Main Device 01</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="<?php echo base_url(); ?>power_monitoring">
										<i class="icon-zoom-in icon-white"></i>  
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
									</a>
								</td>
							</tr>
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
