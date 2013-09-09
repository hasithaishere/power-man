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
	<h1>Add new package</h1>
        	<form method="post" id="add_newPackage_form" action="<?php echo base_url();?>index.php/add_newPackage/add_new_package">
            <div>
            	<label for="new_package">Package name </label>
                <input id="nPackage" name="nPackage" type="text" />
                <span id="packageDetails">What is the name of the package?</span>
             </div>
             <div>
            	<label for="description">Description </label>
                <textarea name="details" id="details" cols="45" rows="5" tabindex="1"></textarea>
                <span id="dDetails">Descrbe the features of the package</span>
             </div>
             <div>
            	<label for="main_devices">Number of main devices </label>
                <input id="mDevices" name="mDevices" type="text" />
                <span id="mDeviceDetails">how many main devices this package provides?</span>
             </div>
              <div>
            	<label for="sub_devices">Number of sub devices </label>
                <input id="sDevices" name="sDevices" type="text" />
                <span id="sDeviceDetails">how many sub devices this package provides?</span>
             </div>
             <div>
            	<label for="sms_amount">SMS amount </label>
                <input id="smsAmount" name="smsAmount" type="text" />
                <span id="sms_amountDetails">how many SMSs allowed for this package?</span>
             </div>
             <div>
            	<label for="duration">Duration </label>
                <input id="duration" name="duration" type="text" />
                <span id="durationDetails">what is the duration of this package(in days)?</span>
             </div>
              <div>
            	<label for="expire_duration">Expire Date </label>
                <input id="eDuration" name="eDuration" type="text" />
                <span id="expire_durationDetails">Expire date of this package in YYYY-MM-DD?</span>
             </div>
              <div>
             	<input id="add" name="add" type="submit" value="Add package" />
             </div>
             
              <div>
             	<?php echo validation_errors('<div class="alert alert-danger">');?>
             </div>
             </form>
             </div>
              
<hr>
			
			
		
		<div class="clearfix"></div>
        <!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div>

</body>
</html>
