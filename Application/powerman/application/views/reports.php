<!DOCTYPE html>
<html lang="en"><head>

<?php include 'includes/head.php'; ?>
	
</head>

<body>
<!-- start: Header Menu -->
		<?php include 'includes/headerbar.php'; ?>
        
<!-- end: Header Menu -->

<!-- start: Header -->
	
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
						<a href="<?php echo base_url(); ?>main_panel">Home</a>
					</li>
					</ul>
                </div>
			  <hr>
                        <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
<div id="container">
<h1> Create Reports </h1>


</div>
              
<hr>

<div class="row-fluid">
<div class="row">

  <div class="box span3">
  <div class="thumbnail">
  <center><h2>Locations</h2>
  <!--<span class="label label-success">Active</span>-->
  </center>
     <img src="<?php echo base_url(); ?>img/building.png" alt="">
      <div class="caption">
        <!--<h3>Company Package</h3>
        <p>Domore Technology Office Area</p>-->
       <center> <p><a href="#" class="btn btn-primary">Create</a> </center>
      </div>
    </div>
  </div>
  
  <div class="box span3">
  <div class="thumbnail">
  <center><h2>Main Devices</h2>
  <!--<span class="label label-success">Active</span>-->
  </center>
     <img src="<?php echo base_url(); ?>img/main_device.png" alt="">
      <div class="caption">
        <!--<h3>Company Package</h3>
        <p>Domore Technology Office Area</p>-->
       <center> <p><a href="#" class="btn btn-primary">Create</a> </center>
      </div>
    </div>
  </div>
  
  <div class="box span3">
  <div class="thumbnail">
  <center><h2>Sub devices and Sensors</h2>
  <!--<span class="label label-success">Active</span>-->
  </center>
     <img src="<?php echo base_url(); ?>img/Sub.jpg" alt="">
      <div class="caption">
        <!--<h3>Company Package</h3>
        <p>Domore Technology Office Area</p>-->
       <center> <p><a href="#" class="btn btn-primary">Create</a> </center>
      </div>
    </div>
  </div>
  
  
</div>
</div>		
			
		
		<div class="clearfix"></div>
        <!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div>

</body>
</html>

