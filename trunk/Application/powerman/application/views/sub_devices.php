<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>
 <script type="text/javascript">
 $('#new_subdevice_details').click(function(){
    $('#new_subdevice_details').modal(options);
 });
    </script>			
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
						<a href="#new_subdevice_details" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i><span class="break"></span> ADD Sub Devices</a>
					
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
			
 
<!-- Modal -->

		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
		</div>		
	</div><!--/.fluid-container-->

	
	<div id="new_subdevice_details" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">New Sub Device Details</h3>
</div>
<div class="modal-body">
		<div>
             	<label for="subdevice_name">Sub Device Name</label>
				 <input id="modal_subdevice_name" name="modal_subdevice_name" type="text" />
                <span id="modal_subdevice_nameDetails" class="intro">Enter the name of the sub device</span>
        </div>
        
        <div>
             	<label for="subdevice_serialno">Serial Number of the device</label>
				 <input id="modal_subdevice_serialno" name="modal_subdevice_serialno" type="text" />
                <span id="subdevice_serialno" class="intro">Enter your Sub Device Serial Number</span>
        </div>
        
        <div>
             	<label for="subdevice_location">Sub Device Location</label>
				 <input id="modal_subdevice_location" name="modal_subdevice_location" type="text" />
                <span id="subdevice_location" class="intro">Sub Device Location</span>
        </div>
        
        <div>
             	<label for="subdevice_maindevice">Main device</label>
				 <input id="modal_subdevice_maindevice" name="modal_subdevice_maindevice" type="text" />
                <span id="subdevice_maindevice" class="intro">Which Main device you're hoping to add this Sub Device</span>
        </div>
        
         <div>
             	<label for="voltage_limitaion">Voltage Limitaion</label>
				 <input id="modal_voltage_limitaion" name="modal_voltage_limitaion" type="text" />
                <span id="subdevice_voltage_limitaion" class="intro">Voltage limit for Sub Device</span>
        </div>
        
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Add Sub Device</button>
</div>
</div>
	
</body>
</html>
