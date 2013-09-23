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
						<a href="#new_subdevice_details" role="button" class="btn btn-success" data-toggle="modal"><i class="icon-plus-sign icon-white"></i><span class="break"></span> ADD New Device</a>
					
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Sub Device</th>
								  <th>Serial Number</th>
								  <th>Device Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>Television</td>
								<td class="center">SD001</td>
								<td class="center">LCD panel wide screen TV</td>
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
								<td class="center">SD002</td>
								<td class="center">14w LED Bulb</td>
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
  				 <label for="icon"> Device Image </label> 
   				<img width="60px" height="60px" id="sensor_icon_24" src="<?php echo base_url(); ?>img/small_washing_machin.jpg" class="btn-success">
               
   
</div>

<div>
    
    <select class="defaultDevice" required="required" devid="24" id="defaultDevice">
         <option value="-"> - select -</option>
              <option value="device1">Washing Machine</option>
  
              <option value="device2">Microwave</option>
  
          </select>
           <span id="Defaultsubdevice_name" class="intro">Select the default name of the sub device</span>
</div>
        
        <div>
             	<label for="subdevice_serialno">Serial Number of the device</label>
				 <input id="modal_subdevice_serialno" name="modal_subdevice_serialno" type="text" />
                <span id="subdevice_serialno" class="intro">Enter your Sub Device Serial Number</span>
        </div>
        
                
        <div>
             	<label for="subdevice_description">Device Description</label>
				 <textarea id="modal_subdevice_description" name="modal_subdevice_description" type="text"  cols="45" rows="5" tabindex="1" ></textarea>
                <span id="subdevice_description" class="intro">Description about the new Sub Device</span>
        </div>
        
        
        
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-success">Add Sub Device</button>
</div>
</div>
	
</body>
</html>
