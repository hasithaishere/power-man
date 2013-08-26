<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>	
 		<!--<script src="<?php echo base_url();?>js/add_location.js"></script>-->
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
	<h1>Create a New Location</h1>
    
     <?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
                <?php endif;?>

                <hr>
                
                 <?php
				 $attributes = array('id' => 'add_mainDevice_form');
				  echo form_open('add_newMainDevice/do_upload', $attributes);?>
    	<!--<form method="post" id="add_location_form" action="<?php echo base_url();?>add_location/add_new_location" >-->
        	<div>
            	<label for="main_device_title">Device Title </label>
                <input id="main_device_title" name="main_device_title" type="text" />
                <span id="main_device_titleDetails">What's your Main Device Title?</span>
             </div>
             
             <div>
            	<label for="main_device_id">Device ID </label>
                <input id="main_device_id" name="main_device_id" type="text" />
                <span id="main_device_idDetails">What's your Device ID?</span>
             </div>
             
             <div>
            	<label for="main_device_serialno">Device Serial No </label>
                <input id="main_device_serialno" name="main_device_serialno" type="text" />
                <span id="main_device_serialnoDetails">What's your Device Serial No?</span>
             </div>
             
              <div>
                <label for="main_device_type">Device Type</label>
                <select name="main_device_type2" id="main_device_type2">
                <option value="business">Main Device Type 1</option>
                <option value="company" >Main Device Type 2</option>
                <option value="home">Main Device Type 3</option>

                </select>
                <span id="main_device_type_Details">What's your Main Device Type?</span>  
          <div> 
             
             <div>
             <label for="imageUpload">Location Image </label>
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
                        
             
             <input type="submit" id="save_mainDevice" class="btn btn-primary" value="Save Main Device" />
           <!--  <a id="save_location" href="#" role="button" class="btn btn-primary"><i class="icon-share icon-white"></i><span class="break"></span> Save Location</a>-->
          
             </form>
             
             
                <hr>
             
 </div>	
           
		
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	
</body>
</html>
