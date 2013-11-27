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
	<h1>Domore Powercare Report Generator</h1>
    
     <!--<?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
             <?php endif;?>-->

                <hr>

			<form method="post" id="add_subDevice_form" action="<?php echo base_url();?>download_report/download">

<!--        	<div>
            	<label for="sub_device_title">Device Title </label>
                <input id="sub_device_title" name="sub_device_title" type="text" />
                <span id="sub_device_titleDetails">What's your Sub-Device Title?</span>
             </div>
            -->
             <div>
            	<p>Please selcet year and month for generate the report. This report will be provided in PDF format, this PDF format is capable with all devices.</p>
             </div>
             <!--
             <div>
            	<label for="sub_device_description">Description </label>
                <textarea name="sub_device_description" id="location_description" cols="45" rows="5" tabindex="1"></textarea>
                <span id="sub_device_descriptionDetails">Description about the new Sub Device?</span>
             </div>-->
            
            <div>
            	<label for="year_description" style="font-weight: 700;">Year</label>
            <select name="year" id="year">
            
			<?php
				$i = 1900;
				while ($i<=2100) 
				{
					if($i == date("Y"))
					{
						echo '<option value="'. $i .'" selected="selected">'. $i .'</option>';
					}
					else
					{
						echo '<option value="'. $i .'">'. $i .'</option>';
					}
				   $i++;
				}
			?>
			</select>
                <span id="sub_device_type_Details">What is the year you want ?</span>  
            </div>
          	
          	<!----------------- This Part For Selecting Device Type - START ------------------>
          	
          	<div>    
            <div>
            	<label for="month_description" style="font-weight: 700;">Month</label>
            <select name="month" id="subdevice_type">
            
			<?php
			
				$m = 1;
				while ($m<=12) 
				{
					if($m == date("m"))
					{
						echo '<option value="'. $m .'" selected="selected">'. date("F", mktime(0, 0, 0, $m, 10)) .'</option>';
					}
					else
					{
						echo '<option value="'. $m .'">'. date("F", mktime(0, 0, 0, $m, 10)) .'</option>';
					}
				   $m++;
				}
			?>
			</select>
             
                <span id="sub_device_type_Details">What is the month you want ?</span>  
                </div>
          	
             </div>
             <br>
             <!----------------- This Part For Selecting Household Type - END ------------------>
                        
             <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id;?>" />           
          <div> 
          	
				<input type="submit" id="generate_report" class="btn btn-success" value="Generate Report" />
			
           <!--  <a id="save_location" href="#" role="button" class="btn btn-primary"><i class="icon-share icon-white"></i><span class="break"></span> Save Location</a>-->
          </div>
          <br>
          <?php
            	if($success_download == 1)
				{
					echo "<div><div class=\"alert alert-success span12\">". $success_msg . "</div></div>";
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
	
	
</body>
</html>
