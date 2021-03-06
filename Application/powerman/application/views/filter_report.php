<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php'; ?>		
    <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
    
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
						<a href="#">Upgrade Packages</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                     <?php include 'includes/quick_buttons.php'; ?>
                        <hr>
			
                     
			<div class="row-fluid">


<div id="container">
	<h1>Power Monitoring</h1>
    <!--<div>
             	<?php if(validation_errors()):?>
                <div class='alert alert-error span12'><?php echo validation_errors(); ?></div>
                 
                <?php endif;?>
          </div>-->
    	<form method="post" id="filter_form" action="<?php echo base_url();?>index.php/Upgrade_Package/upgrade">
        
        	<div>
                <label for="cpackage">Location / Main Device / Subdevice Selection </label>
                
                <label class="radio">
				<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
				Option one is this and that—be sure to include why it's great
				</label>
				<label class="radio">
				<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				Option two can be something else and selecting it will deselect option one
				</label>
                
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
                <select name="pack2" id="pack2">
                <option value="business">Small Business Edition</option>
                <option value="company" >Company Edition</option>
                <option value="home">Home Edition</option>

                </select>
                <span id="NPackage_Details">What's your New package name?</span>  
          <div>          
            <span id="spryselect1">
                <label>Number of devices</label>
            <select name="devices" id="select">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
            </select>
             
          <span class="selectRequiredMsg">Please select an item.</span></span>
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


	
	
    <script type="text/javascript">
	
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
    </script>
    
</body>
</html>
