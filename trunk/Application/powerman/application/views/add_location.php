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
                
                <?php echo $error;?>
      
              
              
                <hr>
                
                 <?php
				 $attributes = array('id' => 'add_location_form');
				  echo form_open_multipart('add_location/do_upload', $attributes);?>
    	<!--<form method="post" id="add_location_form" action="<?php echo base_url();?>add_location/add_new_location" >-->
        	<div>
            	<label for="location_name">Location Name </label>
                <input id="location_name" name="location_name" type="text" />
                <span id="location_nameDetails">What's your Location name?</span>
             </div>
             
             <div>
            	<label for="sub_name">Sub Name </label>
                <input id="sub_name" name="sub_name" type="text" />
                <span id="sub_nameDetails">What's your location's sub name?</span>
             </div>
             
              <div>
            	<label for="location_description">Description </label>
                <textarea name="location_description" id="location_description" cols="45" rows="5" tabindex="1"></textarea>
                <span id="location_descriptionDetails">Description about the new Location?</span>
             </div>
             
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
                        
             
             <input type="submit" id="save_location" class="btn btn-primary" value="Save Location" />
           <!--  <a id="save_location" href="#" role="button" class="btn btn-primary"><i class="icon-share icon-white"></i><span class="break"></span> Save Location</a>-->
          
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
