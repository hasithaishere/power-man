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
						<a href="<?php echo base_url(); ?>users">User Settings</a>
					</li>
				</ul>
				
			</div>
			  <hr>
              	
			<!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                    
                        <hr>
			
                     
			<div class="row-fluid">
			<div class="row">

              <div class="span3">
              <div class="thumbnail" id="device-thumbnail">
              
					<center><div class="device-header"><p>LED BULB</p></div> </center>
                   <img src="<?php echo base_url(); ?>img/bulb_off.jpg" alt=""> 
                               <div class="progress">
                    <div class="bar" style="width: 50%"></div>
                    <span>50 W</span>
                </div>
                   <div class="caption">
                   
                   <div class="switch"  id="on_off_switch" data-on="success" data-off="danger">
                    <input type="checkbox" checked />
                    
                    </div>
                    </div>
 				 </div>
 			</div>

 			  <div class="span3">
              <div class="thumbnail" id="device-thumbnail">
					<center><div class="device-header"><p>WASHING MACHIN</p></div> </center>
                   <img src="<?php echo base_url(); ?>img/washing_machin_off.jpg" alt=""> 
                               <div class="progress">
                    <div class="bar" style="width: 70%"></div>
                    <span>70 W</span>
                </div>
                  
                   <div class="caption">
                   
                   <div class="switch"  id="on_off_switch" data-on="success" data-off="danger">
                    <input type="checkbox" checked />
                    
                    </div>
                    </div>
                  
                   
 				 </div>
 			</div>
            
  			 <div class="span3">
              <div class="thumbnail" id="device-thumbnail">
					<center><div class="device-header"><p>REFRIGERATOR</p></div> </center>
                   <img src="<?php echo base_url(); ?>img/refrigerator_off.jpg" alt=""> 
                               <div class="progress">
                    <div class="bar" style="width: 60%"></div>
                    <span>60 W</span>
                </div>
                   
                   
                    <div class="caption">
                   
                   <div class="switch"  id="on_off_switch" data-on="success" data-off="danger">
                    <input type="checkbox" checked />
                    
                    </div>
                    </div>
                   
 				 </div>
 			</div>  
  
  			<div class="span3">
              <div class="thumbnail" id="device-thumbnail">
					<center><div class="device-header"><p>FAN</p></div> </center>
                   <img src="<?php echo base_url(); ?>img/fan_off.jpg" alt=""> 
                               <div class="progress progress-danger progress-striped">
                    <div class="bar" style="width: 80%"></div>
                    <span>80 W</span>
                </div>
                   
                   
                    <div class="caption">
                   
                   <div class="switch"  id="on_off_switch" data-on="success" data-off="danger" data-toggle="model">
                    <input type="checkbox" checked /> 
                   </div>
                  
                  
                  
                   </div>
                   
 				 </div>
 			</div> 
  

		
    </div>  
    <div class="row">
    	<div class="span3">
              <div class="thumbnail" id="device-thumbnail">
					<center><div class="device-header"><p>FAN</p></div> </center>
                   <img src="<?php echo base_url(); ?>img/fan_off.jpg" alt=""> 
                               <div class="progress progress-danger progress-striped">
                    <div class="bar" style="width: 80%"></div>
                    <span>80 W</span>
                </div>
                   
                    <div class="caption">
                   
                   <div class="switch"  id="on_off_switch" data-on="success" data-off="danger">
                    <input type="checkbox" checked />
                    
                    </div>
                    </div>
                   
 				 </div>
 			</div> 
  
    </div>
    
                  
</div>
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->

	
	
	
</body>
</html>
