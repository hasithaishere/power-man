<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>	
 		<script src="<?php echo base_url();?>js/define_device.js"></script>
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
						<a href="<?php echo base_url(); ?>define_device">Define Device</a> <span class="divider">/</span>
					</li>
                    
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
                     
			<div class="row-fluid">
				
		
<div id="container">
	<h1>Define The Devices</h1>

                <hr>
                
                 <?php
				 $attributes = array('id' => 'define_device_form');
				  echo form_open_multipart('define_device/do_upload', $attributes);?>
    	<!--<form method="post" id="add_location_form" action="<?php echo base_url();?>add_location/add_new_location" >-->
        	<div>
            	<label for="device_name">Device Name </label>
                <input id="device_name" name="device_name" type="text" />
                <span id="device_nameDetails">What's your Device name?</span>
             </div>

              <div>
            	<label for="device_description">Description </label>
                <textarea name="device_description" id="device_description" cols="45" rows="5" tabindex="1"></textarea>
                <span id="device_descriptionDetails">Description about the Device?</span>
             </div>
             
              <div>
            	<label for="device_max_Wattage">Maximum Wattage (W) </label>
                <input id="device_max_Wattage" name="device_max_Wattage" type="text" />
                <span id="device_max_WattageDetails">What's your maximum voltage of the device?</span>
             </div>
             
             <div>
            	<label for="device_max_time">Maximum Time of Usage  (Seconds) </label>
                <input id="device_max_time" name="device_max_time" type="text" />
                <span id="device_max_timeDetails">What's your maximum usage time of the device?</span>
             </div>
             
             <div>
            	<label for="alert_level_count">Maximum Alert level </label>
                <input id="alert_level_count" name="alert_level_count" type="text" />
                <span id="alert_level_countDetails">How many times have to check before giving an alert?</span>
             </div>
             
              <div>
            	<label for="alert_level_precentage">Maximum Alert level Precentage </label>
                <input id="alert_level_precentage" name="alert_level_precentage" type="text" />
                <span id="alert_level_precentageDetails">How much precentage of usage has to exceed before giving an alert?</span>
             </div>
             
             
             <div>
             <label for="imageUpload">Device Image </label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>img/no+image.gif" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
            <span id="imgDetails">Upload a image for your Location</span>
            <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
           
           
            <input type="file" name="userfile" id="image" /></span>
           
          <a href="#" class="btn btn-file fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
            </div>
             </div>            
                        
             <div>
             <input type="submit" id="save_location" class="btn btn-success" value="Save Device" />
           	 </div>
           	 <br>
           <!--  <a id="save_location" href="#" role="button" class="btn btn-primary"><i class="icon-share icon-white"></i><span class="break"></span> Save Location</a>-->
            	<div>
          		<?php if(validation_errors()):?>
                	<div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
            	<?php endif;?>	
          	</div>
          	<?php
            	if($success_add_definedevice == 1)
				{
					echo "<div><div class=\"alert alert-success span12\">". $success_add_definedevice_msg . "</div></div>";
				}
          	?>
          	
          	<?php
            	if($error == 1)
				{
					echo "<div><div class=\"alert alert-error span12\">". $error_msg . "</div></div>";
				}
          	?>
          
          
          
             </form>
             
             
                <hr>
             
 </div>	
         
              
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	
</body>
</html>
