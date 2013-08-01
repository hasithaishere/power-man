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
						<a href="<?php echo base_url(); ?>main_panel">Dashboard</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
                     
			<div class="row-fluid">

                              <div class="span6" id="main-page-box1">
                            <div id="box1-logo"></div>
                            <h3><a href="#">MONITOR OR CONTROL</a>
                             </h3>
                            <p> Monitor or Control the status of the devices, area, location, sensors and allows to control them at any time. </p>
                              </div>
                            <div class="span6" id="main-page-box2">
                                <div id="box2-logo"></div>
                            <h3><a href="#">ADD FEATURES</a> </h3>
                            <p> Allows to add your location, area, sensors and devices. </p>
                            </div>
                        </div>
                        <div class="row-fluid">
                        <div class="span6" id="main-page-box3">
                            <div id="box3-logo"></div>
                            <h3><a href="">CHANGE THE SETTINGS</a></h3>
                            <p>Change the settings of your location, area, sensors and devices </p>
                            </div>
                            <div class="span6" id="main-page-box4">
                               <div id="box4-logo"></div>
                               <h3><a href="">GENERATE REPORTS</a></h3>
                            <p>Generate the status of installed location, area, sensors and devices. </p>
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
