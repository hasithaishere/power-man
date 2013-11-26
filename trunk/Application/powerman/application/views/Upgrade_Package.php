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
	<h1>Request for Upgrade / Extend Package</h1>
  
    	<form method="post" id="upgrade_formnew" action="<?php echo base_url();?>index.php/Upgrade_Package/upgrade">
        
        		<?php
					$tmp_oldpackage = "";
					foreach($packages as $rows)
					{
						if($old_package[0]['package_id'] == $rows['id'])
						{
							$tmp_oldpackage = $rows['name'];
						}
					}
				?>
        	<p>Please select and request a new package which you want to update or extend. If you upgrade / extend the upgrading cost will be added to your monthly domore power care bill.</p>
             <div>
            	<label for="package_name">Current Package</label>
                <input id="package_name" name="package_name" type="text" readonly value="<?php echo $tmp_oldpackage;?>" />
                <span id="package_name">The package which you currently using</span>  
             </div>
             
             <div>
            	<label for="expired_on">Expired On</label>
                <input id="expired_on" name="expired_on" type="text" readonly value="<?php echo $old_package[0]['expired_on'];?>" />
                <span id="expired_on_Details">The package which you currently using</span>  
             </div>
             
             <div>
                <label for="newpackage">New Package</label>
                <select name="newpackage" id="newpackage">
                
                <?php
				
					foreach($packages as $rows)
					{
						echo "<option value=\"" . $rows['id'] . "\">" . $rows['name'] . "</option>";
					}
				?>

                </select>
                <span id="NPackage_Details">What's your New package name?</span>  
          		<input type="hidden" name="old_package_id" value="<?php echo $old_package[0]['id'];?>" />
             </div>
             <div>
             	<input id="upgrade_package" name="upgrade_package" type="submit" class="btn btn-success" value="Upgrade / Extend" />
             </div>
             <br>
             	<?php
	            	if($success_upgrade == 1)
					{
						echo "<div><div class=\"alert alert-success span12\">". $success_upgrade_msg . "</div></div>";
					}
          		?>
             </form>

</div>
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<?php include 'includes/footer.php'; ?>		
	</div><!--/.fluid-container-->


    
</body>
</html>

