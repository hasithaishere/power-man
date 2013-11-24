<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>	
 		<script src="<?php echo base_url();?>js/add_newMainDevice.js"></script>
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
						<a href="<?php echo base_url(); ?>main_devices">Main Device</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url(); ?>add_newmaindevice">Add Main Device</a>
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
	<h1>Add New Main Device</h1>
    
     <!--<?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
             <?php endif;?>-->

                <hr>
                
                <?php
				// $attributes = array('id' => 'add_mainDevice_form');
				 // echo form_open('add_newMainDevice/add_new_maindevice', $attributes);?>
    	<form method="post" id="add_mainDevice_form" action="<?php echo base_url() . "add_newmaindevice/add_maindevice/" . $location_id;?>" >
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
            	<label for="main_device_description">Select Main Device Type</label>
            <select name="device_type" id="maindevice_type">
            
			<?php
			
				foreach($content as $rows)
				{
				   echo '<option value="'.$rows['id'].'" img_path="'.$rows['image_path'].'" url="'.$rows['ins_url'].'">'.$rows['name'].'</option>';
				}
			?>
			</select>
             
                <span id="main_device_type_Details">What's your Main Device Type?</span>  
                </div>
          	<div> 
             
             <div>
				<label for="main_device_description">Image Preview</label>
             	<a href="#" id="maindevice_link" target="_blank" data-toggle="tooltip" title="Click here to find about this device."><img src="<?php echo base_url() . "img/no+image.gif";?>" class="img-rounded" id="maindevice_imageholder" /></a>
             </div>
            </div>
             </div>            
             <input type="hidden" id="hidden_imagepath" name="hidden_imagepath" value="" />           
          <div>   
             <input type="submit" id="save_mainDevice" class="btn btn-success" value="Save Main Device" />
           <!--  <a id="save_location" href="#" role="button" class="btn btn-primary"><i class="icon-share icon-white"></i><span class="break"></span> Save Location</a>-->
          </div>
          <br>
          <div>
          	<?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
            <?php endif;?>
          </div>
          <?php
            	if($success_adddevice == 1)
				{
					echo "<div><div class=\"alert alert-success span12\">". $success_adddevice_msg . "</div></div>";
				}
          ?>
          
          </form>
             
          <hr>
             
 </div>	
           
		
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("#maindevice_imageholder").attr('src', "<?php echo base_url()."img/";?>" + $('#maindevice_type :selected').attr('img_path'));
				$("#maindevice_link").attr('href',$('#maindevice_type :selected').attr('url'));
				$("#hidden_imagepath").val($('#maindevice_type :selected').attr('img_path'));
				
				$('#maindevice_type').change(function() {
				   // assign the value to a variable, so you can test to see if it is working
				    $("#maindevice_imageholder").attr('src', "<?php echo base_url()."img/";?>" + $('#maindevice_type :selected').attr('img_path'));
				    $("#maindevice_link").attr('href',$('#maindevice_type :selected').attr('url'));
				    $("#hidden_imagepath").val($('#maindevice_type :selected').attr('img_path'));
				});
			
			});
	</script>
	
	
</body>
</html>
