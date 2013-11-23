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
						<a href="<?php echo base_url(); ?>add_location">Add Main Device</a>
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
	<h1>Create a New Main Device</h1>
    
     <?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
                <?php endif;?>

                <hr>
                
                 <?php
				 $attributes = array('id' => 'add_mainDevice_form');
				  echo form_open('add_newMainDevice/add_new_maindevice', $attributes);?>
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
            	<label for="main_device_description">Description </label>
                <textarea name="main_device_description" id="location_description" cols="45" rows="5" tabindex="1"></textarea>
                <span id="main_device_descriptionDetails">Description about the new Main Device?</span>
             </div>
             
            <div>
            <select name="device_type">
            
			<?php
			
				foreach($content as $rows)
				{
				   echo '<option value="'.$rows['id'].'">'.$rows['device_type'].'</option>';
				}
			?>
			</select>
             
                <span id="main_device_type_Details">What's your Main Device Type?</span>  
                </div>
          <div> 
             
             <div>
             <?php  ?>
             <img src="<?php echo base_url() .$rows['image_path'];?>" class="img-rounded" />
            </div>
            </div>
             </div>            
                        
             
             <input type="submit" id="save_mainDevice" class="btn btn-success" value="Save Main Device" />
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
