<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>
 



 			
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
						<a href="<?php echo base_url(); ?>alert_config">Alert Configuration</a>
					</li>
                    
					
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
            <div class="row-fluid sortable" style="margin-top: -14px ! important;">	
            	
            	<h2 >Alert Configuration</h2><hr>
            	
				<div class="box span12">
              		
                    
                    <form method="post" id="add_location_form" action="<?php echo base_url();?>alert_config/set_alert_config" >

						<div class="control-group">
								<label class="control-label"><h4>Web Alerts Activation</h4> </label>
						</div>
			
                              <div class="control-group">
								<div class="controls">
								  	<label class="radio">
										<input type="checkbox" name="web_exceed_alert" id="web_exceed_alert" value="1" <?php echo $web_exceed_alert;?>>
										Exceed Time Web Alert Settings
								 	</label>
								</div>
							  </div>
							  
							  <div class="control-group">
								<div class="controls">
								  	<label class="radio">
										<input type="checkbox" name="web_malf_alert" id="web_malf_alert" value="1" <?php echo $web_malf_alert;?>>
										Malfunction Sugestions Web Alert Settings
								 	</label>
								</div>
							  </div>
						<br>
						<div class="control-group">
								<label class="control-label"><h4>SMS Alerts Activation</h4> </label>
						</div>

							<div class="control-group">
								<div class="controls">
								  	<label class="radio">
										<input type="checkbox" name="sms_normal_sug" id="sms_normal_sug" value="1" <?php echo $sms_normal_sug;?>>
										Normal Sugestions SMS Settings
								 	</label>
								</div>
							  </div>

            				<div class="control-group">
								<div class="controls">
								  	<label class="radio">
										<input type="checkbox" name="sms_malf_alert" id="sms_malf_alert" value="1" <?php echo $sms_malf_alert;?>>
										Malfunction SMS Alert Settings
								 	</label>
								</div>
							  </div>
          
                              <div class="control-group">
								<div class="controls">
								  	<label class="radio">
										<input type="checkbox" name="sms_malfsug_alert" id="sms_malfsug_alert" value="1" <?php echo $sms_malfsug_alert;?>>
										Malfunction Sugestions SMS Alert Settings
								 	</label>
								</div>
							  </div>
                              
                              <div class="control-group">
								<div class="controls">
								  	<label class="radio">
										<input type="checkbox" name="sms_exceed_alert" id="sms_exceed_alert" value="1" <?php echo $sms_exceed_alert;?>>
										Exceed Time SMS Alert Settings
								 	</label>
								</div>
							  </div>
                              <input type="hidden" id="checkbox_val" name="checkbox_val" />             
             <br>           
             <div class="control-group">
				<div class="controls">
             		<input type="submit" id="save_configuration" class="btn btn-success" value="Save Configuration" />
           	 	</div>
           	 </div>
           	 <br>
           <?php
             	if($is_success == 1)
				{
					echo "<div class=\"control-group\"><div class=\"controls\"><div class=\"alert alert-success\">". $success_msg . "</div></div>";
				}
             ?>
          
             </form>
   
               
                  
                
             
               
        
				</div><!--/span-->
			
			</div>
			<hr>
			
		
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
        
		<!-- end: footer-->
		</div>		
	</div><!--/.fluid-container-->





		

	
	
	
</body>
</html>

