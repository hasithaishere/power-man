<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>	
 		<script src="<?php echo base_url();?>js/add_location.js"></script>
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
						<a href="<?php echo base_url(); ?>locations">Locations</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url(); ?>add_location">Add Location</a>
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
	<h1>Power Devices</h1>

                <hr>
                
                 <?php
				 $attributes = array('id' => 'power_device_form');
				  echo form_open_multipart('power_device/do_upload', $attributes);?>
    	<!--<form method="post" id="add_location_form" action="<?php echo base_url();?>add_location/add_new_location" >-->
        	<div>
                <label for="device_type">Device Type</label>
                <select name="device_type" id="device_type">
                <option value="1">Device Type 01</option>
                <option value="2">Device Type 02</option>
                

            </select>
                <span id="device_typeDetails">What's your Device Type?</span>
            </div>
            
            
            
            
            <div>
            	<label for="Device_name">Device Name </label>
                <input id="Device_name" name="Device_name" type="text" />
                <span id="Device_nameDetails">What's your Device name?</span>
             </div>
             
            
              <div>
            	<label for="Device_url">Instruction Url </label>
                <textarea name="Device_url" id="Device_url" cols="45" rows="5" tabindex="1"></textarea>
                <span id="Device_urlDetails">Description about the device?</span>
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
            	if($success_addpowerdevice == 1)
				{
					echo "<div><div class=\"alert alert-success span12\">". $success_addpowerdevice_msg . "</div></div>";
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
           
		<!-- <div class="row">
            
            
             <div class="box span3">
              <div class="thumbnail" id="add_thumbnail">
              <center><h3>Add New Location</h3>
              
              </center>
                 <img src="<?php echo base_url(); ?>img/add.jpg" alt="">
                  <div class="caption"> 
                    
                  <center><a href="#add_new_location" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i><span class="break"></span> ADD Location</a></center>
                   
                  </div>
                </div>
              </div>
              
              
            </div>
              
              
			<hr>-->
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	
</body>
</html>
