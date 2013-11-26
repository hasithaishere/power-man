<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>	
 		<script src="<?php echo base_url();?>js/add_newsubdevices.js"></script>
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
	<h1>Add New Sub-Device</h1>
    
     <!--<?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
             <?php endif;?>-->

                <hr>
                
                 <!--<?php
				 $attributes = array('id' => 'add_mainDevice_form');
				  echo form_open('add_newMainDevice/add_new_maindevice', $attributes);?>
    	<form method="post" id="add_subDevice_form" action="<?php echo base_url() . "add_newsubdevice/add_subdevice/" . $maindevice_id;?>" >
        	-->
        	<?php
            	if(count($newdevice) == 0)
				{
					if(!$success_addsubdevice == 1)
					{
						echo "<div><div class=\"alert alert-error span12\">No new physically paired sub device, Please pair a new sub device physically before adding to system.</div></div>";
					}
					echo "<form method=\"post\" id=\"add_subDevice_form\">";
				}
				else 
				{
					echo "<form method=\"post\" id=\"add_subDevice_form\" action=\"" . base_url() . "add_newsubdevice/add_subdevice/" . $maindevice_id . "\">";
				}
          	?>
        	
        	<div>
            	<label for="sub_device_title">Device Title </label>
                <input id="sub_device_title" name="sub_device_title" type="text" />
                <span id="sub_device_titleDetails">What's your Sub-Device Title?</span>
             </div>
             
             <div>
            	<label for="sub_device_serialno">Device Serial No </label>
                <input id="sub_device_serialno" name="sub_device_serialno" type="text" />
                <span id="sub_device_serialnoDetails">What's your Device Serial No?</span>
             </div>
             
             <div>
            	<label for="sub_device_description">Description </label>
                <textarea name="sub_device_description" id="location_description" cols="45" rows="5" tabindex="1"></textarea>
                <span id="sub_device_descriptionDetails">Description about the new Sub Device?</span>
             </div>
            
            <div>
            	<label for="sub_device_description">Select Sub-Device ID</label>
            <select name="device_id" id="subdevice_id">
            
			<?php
			
				foreach($newdevice as $rows)
				{
				   echo '<option value="'.$rows['device_id'].'" added_on="'.$rows['added_on'].'">'.$rows['device_id'].'</option>';
				}
			?>
			</select>
             	<span id="sub_device_type_Details" class="undefine_addedon"></span> 
                <span id="sub_device_type_Details">What's your Sub Device ID?</span>  
            </div>
          	
          	<!----------------- This Part For Selecting Device Type - START ------------------>
          	
          	<div>    
            <div>
            	<label for="sub_device_description">Select Sub-Device Type</label>
            <select name="device_type" id="subdevice_type">
            
			<?php
			
				foreach($content as $rows)
				{
				   echo '<option value="'.$rows['id'].'" img_path="'.$rows['image_path'].'" url="'.$rows['ins_url'].'">'.$rows['name'].'</option>';
				}
			?>
			</select>
             
                <span id="sub_device_type_Details">What's your Main Device Type?</span>  
                </div>
          	<div> 
             
             <div>
				<label for="sub_device_description">Image Preview</label>
             	<a href="#" id="subdevice_link" target="_blank" data-toggle="tooltip" title="Click here to find about this device."><img src="<?php echo base_url() . "img/no+image.gif";?>" class="img-rounded" id="subdevice_imageholder" /></a>
             </div>
            </div>
             </div>
             <!----------------- This Part For Selecting Device Type - END ------------------>
             
             <!----------------- This Part For Selecting Household Type - START ------------------>
             <br>
             <div>    
            <div>
            	<label for="sub_device_description">Select Househald Device - Subdevice Used</label>
            <select name="device_housetype" id="subdevice_housetype">
            
			<?php
			
				foreach($content2 as $rows)
				{
				   echo '<option value="'.$rows['id'].'" img_path="'.$rows['image_path'].'">'.$rows['name'].'</option>';
				}
			?>
			</select>
             
                <span id="sub_device_type_Details">This Sub-device use for?</span>  
                </div>
          	<div> 
             
             <div>
				<label for="sub_device_description">Image Preview</label>
             	<img src="<?php echo base_url() . "img/no+image.gif";?>" class="img-rounded" id="subhomedevice_imageholder" />
             </div>
            </div>
             </div>
             <br>
             <!----------------- This Part For Selecting Household Type - END ------------------>
                        
             <input type="hidden" id="hidden_imagepath" name="hidden_imagepath" value="" />           
          <div> 
          	<?php
            	if(count($newdevice) == 0)
				{
					echo "<input type=\"submit\" id=\"save_subDevice\" class=\"btn btn-success\" value=\"Save Sub-Device\" disabled=\"disabled\"/>";
				}
				else 
				{
					echo "<input type=\"submit\" id=\"save_subDevice\" class=\"btn btn-success\" value=\"Save Sub-Device\" />";
				}
          	?>  
             
           <!--  <a id="save_location" href="#" role="button" class="btn btn-primary"><i class="icon-share icon-white"></i><span class="break"></span> Save Location</a>-->
          </div>
          <br>
          <div>
          	<?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
            <?php endif;?>
          </div>
          <?php
            	if($success_addsubdevice == 1)
				{
					echo "<div><div class=\"alert alert-success span12\">". $success_addsubdevice_msg . "</div></div>";
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
				$("#subdevice_imageholder").attr('src', "<?php echo base_url()."img/power_device/";?>" + $('#subdevice_type :selected').attr('img_path'));
				$("#subdevice_link").attr('href',$('#subdevice_type :selected').attr('url'));
				$("#hidden_imagepath").val($('#subdevice_housetype :selected').attr('img_path'));
				$(".undefine_addedon").text("Added On : "+$("#subdevice_id :selected").attr('added_on')+" |");
				$("#subhomedevice_imageholder").attr('src', "<?php echo base_url()."img/define_device/";?>" + $('#subdevice_housetype :selected').attr('img_path'));
				
				$('#subdevice_type').change(function() {
				   // assign the value to a variable, so you can test to see if it is working
				    $("#subdevice_imageholder").attr('src', "<?php echo base_url()."img/power_device/";?>" + $('#subdevice_type :selected').attr('img_path'));
				    $("#subdevice_link").attr('href',$('#subdevice_type :selected').attr('url'));				    
				});
				
				$('#subdevice_id').change(function() {
					$(".undefine_addedon").text("Added On : "+$("#subdevice_id :selected").attr('added_on')+" |");
				});
				
				$('#subdevice_housetype').change(function() {
				   // assign the value to a variable, so you can test to see if it is working
				    $("#subhomedevice_imageholder").attr('src', "<?php echo base_url()."img/define_device/";?>" + $('#subdevice_housetype :selected').attr('img_path'));
				    $("#hidden_imagepath").val($('#subdevice_housetype :selected').attr('img_path'));
				});
			
			});
	</script>
	
	
</body>
</html>
