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
			
            <div class="row-fluid sortable">	
            	
				<div class="box span12">
              		<div><h2>Alert Configuration</h2></div><br/>
                    
                    <form method="post" id="add_location_form" action="<?php echo base_url();?>alert_config/set_alert_config" >

            				<div class="control-group">
								<label class="control-label"><h4>SMS Alert Settings</h4> </label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked="">
									Switch ON
								  </label>
								  
								  <label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="0">
									Switch OFF
								  </label>
								</div>
							  </div>
                              
                              <br/>
                              <div class="control-group">
								<label class="control-label"><h4>SMS Suggestion Alert Settings</h4> </label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="optionsRadios2" id="optionsRadios1" value="1" checked="">
									Switch ON
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="optionsRadios2" id="optionsRadios2" value="0">
									Switch OFF
								  </label>
								</div>
							  </div>
                              
                              <br/>
                               <div class="control-group">
								<label class="control-label"><h4>Time warning</h4> </label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="optionsRadios3" id="optionsRadios1" value="1" checked="">
									Switch ON
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="optionsRadios3" id="optionsRadios2" value="0">
									Switch OFF
								  </label>
								</div>
							  </div>
                              
                              
                              <br/>
                               <div class="control-group">
								<label class="control-label"><h4>Time warning SMS</h4> </label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="optionsRadios4" id="optionsRadios1" value="1" checked="">
									Switch ON
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="optionsRadios4" id="optionsRadios2" value="0">
									Switch OFF
								  </label>
								</div>
							  </div>
             
             
             			<br/>
                               <div class="control-group">
								<label class="control-label"><h4>Normal Suggestion SMS</h4> </label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="optionsRadios5" id="optionsRadios1" value="1" checked="">
									Switch ON
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="optionsRadios5" id="optionsRadios2" value="0">
									Switch OFF
								  </label>
								</div>
							  </div>
             
             		<br/>
                               <div class="control-group">
								<label class="control-label"><h4>Mulfunction Suggestions</h4> </label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="optionsRadios6" id="optionsRadios1" value="1" checked="">
									Switch ON
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="optionsRadios6" id="optionsRadios2" value="0">
									Switch OFF
								  </label>
								</div>
							  </div>
             
             
             
             
             
             
                        
             <div>
             <input type="submit" id="save_configuration" class="btn btn-success" value="Save Configuration" />
           	 </div>
           	 <br>
           <?php
             	if($is_success == 1)
				{
					echo "<div class=\"control-group\"><div class=\"controls\"><div class=\"alert alert-success\">". $success_msg . "</div></div>";
				}
             ?>
              <div>
             	<?php echo validation_errors('<div class="alert alert-danger">');?>
             </div>
          
          
         
          
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

