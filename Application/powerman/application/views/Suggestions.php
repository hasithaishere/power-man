<!DOCTYPE html>
<html lang="en"><head>

<?php include 'includes/head.php'; ?>
	
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
						<a href="<?php echo base_url(); ?>main_panel">Home</a>
					</li>
			  </ul>
</div>
			  <hr>
                        <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
                        
                        <div id="container">
<h1> Suggestions </h1>

			 <div>
            	<label for="Customer_ID">Customer ID </label>
                <input id="Customer_ID" name="Customer_ID" type="text" />
                <span id="Customer_Details">Relevent User ID</span>
             </div>
                        
             <div>
            	<label for="Device_Type">Device Type</label>
                <input id="Device_Type" name="Device_Type" type="text" />
                <span id="Device_Type">Type of the device</span>
			</div>
                 
                 <div>
            	<label for="Device_ID">Device ID</label>
                <input id="Device_ID" name="Device_ID" type="text" />
                <span id="Device_ID">Enter device ID</span>
			</div>
                    
              <div>
            	<label for="Suggestion">Suggestion</label>
            	<textarea name="Suggestion" id="Suggestion" cols="45" rows="5" tabindex="1"></textarea>
            	<span id="Suggestion_Details">Enter Suggestions here</span>             
              </div>
                       
             <input type="submit" id="suggestion" class="btn btn-success" value="Give Suggestions" />

