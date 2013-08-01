<!DOCTYPE html>
<html lang="en">
<head>
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
						<a href="<?php echo base_url(); ?>main_panel">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                     <?php include 'includes/quick_buttons.php'; ?>
                        <hr>
			
                     
			<div class="row-fluid">

        <h1>Upgrade Package</h1></br>
<form id="form1" name="form1" method="post" action="">

  <div>
  	<label><h4>Current Package</h4></label>
  	<select name="select" id="select">
  	  <option>Home Edition</option>
  	  <option>Small Business Edition</option>
  	  <option>Enterprise Edition</option>
    </select>  	
  	<span id="CPackage_Details">What's your current package name?</span>  	
  </div></br>
    
   <div>
  	<label><h4>Serial No</h4></label>
  	<input type="text" name="ser_no" id="ser_no" />  	
  	<span id="CPackage_Details">What's your current packages' serial number?</span>  	
  </div></br>
  
  <div> 
    <label><h4>Description</h4></label>
    <textarea name="Description" id="Description2" cols="45" rows="5" tabindex="1"></textarea>
    <span id="Description">Reason for changing package</span>  	</label>
    
  </div></br>
  
  <div>
  	<label><h4>New Package</h4></label>
  	<select name="New_package" id="New_package" tabindex="1">
  	  <option>Home Edition</option>
  	  <option>Small Business Edition</option>
  	  <option>Enterprise Edition</option>
    </select>    
  	<span id="NPackage_Details">Request package name?</span>  
  </div></br>
    
  <div>
    <label><h4>Sub Devices</h4></label>
    <select name="Sub_dev" id="Sub_dev2" tabindex="1">
      <option>2</option>
      <option>1</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
    </select>    
    <span id="Sub_dev">How many sub devices you want to add?</span>  
  </div></br>
    
 	<div>
 	  <label>
 	  <input type="submit" name="Upgarde" id="Upgarde" value="Upgrade" tabindex="1" />
 	  </label>
  	</div>
    
</form>
<label></label>
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<?php include 'includes/footer.php'; ?>		
	</div><!--/.fluid-container-->

	
	
	
</body>
</html>
