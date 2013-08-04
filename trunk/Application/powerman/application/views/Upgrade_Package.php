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


<div id="container">
	<h1>Request for Upgrade Package</h1>
    	<form action="" method="post" id="upgrade_form">
        	<div>
                <label for="cpackage">Current Package</label>
                <select name="pack">
                    <option value="empty" selected></option>
                <option value="home">Home Edition</option>
                <option value="business">Small Business Edition</option>
                <option value="company" >Company Edition</option>

                </select>
                <span id="CPackage_Details">What's your current package name?</span>
            </div>
             
             <div>
            	<label for="s_number">Serial No </label>
                <input id="s_number" name="s_number" type="text" />
                <span id="s_number_Details">What's your current packages' serial number?</span>  
                
             </div>
             
              <div>
            	<label for="description">Description </label>
                <textarea name="description" id="description" cols="45" rows="5" tabindex="1"></textarea>
                <span id="descriptionDetails">Reason for changing package</span>
             </div>
             
             <div>
                <label for="npackage">New Package Type</label>
                <select name="pack">
                    <option value="empty" selected></option>
                <option value="home">Home Edition</option>
                <option value="business">Small Business Edition</option>
                <option value="company" >Company Edition</option>

                </select>
                <span id="NPackage_Details">What's your New package name?</span>
            </div>
             
             <div>
             	<input id="upgrade" name="upgrade" type="submit" value="Upgrade" />
             </div>
             </form>

</div>
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<?php include 'includes/footer.php'; ?>		
	</div><!--/.fluid-container-->

	
	
	
</body>
</html>
