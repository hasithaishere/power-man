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
						<a href="<?php echo base_url(); ?>main_devices">Main Devices</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
                     
			<div class="row-fluid">
<div class="row">


  <div class="box span3">
  <div class="thumbnail">
  <center><h3>Domore Office Location</h3>
  <span class="label label-success">Main Device 01</span>
  </center>
     <img src="<?php echo base_url(); ?>img/main_device.png" alt="">
      <div class="caption">
        <h3>Company Package</h3>
        <p>Domore Technology Office Area</p>
        <p><a href="<?php echo base_url(); ?>locations" class="btn btn-primary">Locations</a> <a href="<?php echo base_url(); ?>sub_devices" class="btn btn-primary">Sub Devices</a> 
      </div>
    </div>
  </div>
  
  
  </div>
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->

	
	
	
</body>
</html>
