<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'head.php'; ?>			
</head>

<body>
		
	
	<!-- start: Header Menu -->
		<?php include 'headerbar.php'; ?>
<!-- end: Header Menu -->
	
	
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
            <?php include 'Main_menu.php'; ?>
			<!-- end: Main Menu -->
			
			
			<div id="content" class="span10">
			<!-- start: Content -->
			
			<div>
				<hr>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                        <div class="sortable row-fluid">

				<a class="quick-button span2">
					<i class="fa-icon-group"></i>
					<p>Users</p>
					<span class="notification">1.367</span>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-comments-alt"></i>
					<p>Comments</p>
					<span class="notification green">167</span>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-shopping-cart"></i>
					<p>Orders</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-barcode"></i>
					<p>Products</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-envelope"></i>
					<p>Messages</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-calendar"></i>
					<p>Calendar</p>
					<span class="notification red">68</span>
				</a>

			</div>
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
		<?php include 'footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->

	
	
	
</body>
</html>
