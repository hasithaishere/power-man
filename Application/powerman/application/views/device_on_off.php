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
				
				<?php
				$i = 0;
				foreach($content as $rows)
				{
					if($i == 0)
					{
						echo "<div class=\"row\">"; // For creating rows - 4 columns for one row - start div
					}
					
					/*<div class="span3">
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
 			</div>*/
					//print_r($content);
					//print_r($content2);
					
					
			
	
					echo "<div class=\"span3\">";
              		echo "<div class=\"thumbnail\"  id=\"device-thumbnail\">";
              		echo "<center><div class=\"device-header\"><p>" . $rows['device_title'] . "</p></div> </center>";
                  	echo "<img src=\"". base_url() . "img/" . $rows['image_url'] ."\" alt=\"\">";
                  	echo "<div class=\"progress\">";
					
					foreach($content2 as $rows2)
					{//echo $rows['maindevice_id'] . $rows2['maindevice_id'];
						if($rows['id'] == $rows2['id'])
						{
							$presentage = (int)$rows2['pcon'] * 0.05;
					
					
							echo "<div class=\"bar\" style=\"width: " . $presentage . "%\"></div>";
		                    echo "<span>" . $rows2['pcon'] . "</span>";
							
							echo "</div><div class=\"caption\">";
		                    echo "<div class=\"switch\"  id=\"on_off_switch\" data-on=\"success\" data-off=\"danger\">";
		                    
							$on_off_val = "";
							
							if($rows2['control_status'] == 1)
							{
								$on_off_val = "Checked";
							}
		                    
		                    echo "<input type=\"checkbox\" " . $on_off_val . " class=\"onoff_btn\" seq=\"" . $rows2['seq'] . "\" md=\"" . $rows2['maindevice_id'] . "\"/>";
							
						}
					}					
					
					
                    
                  	echo "</div></div></div></div>";
					
					if($i == 3)
					{
						echo "</div><hr>";// For creating rows - 4 columns for one row - end div
					}
					
					$i++;
					
					if($i==4)
					{
						$i = 0;
					}					
					
				}
				if($i != 3)
				{
					echo "</div><hr>";// For creating rows - 4 columns for one row - end div
				}

									//echo "<td>Admin</td>";
			?>
				
				
				
				
				
				
				
				
<!--			<div class="row">

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
    ------->
    
                  
</div>
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				
				$(".onoff_btn").change(function() {
				    if(this.checked) 
				    {
				        var form_data = {
								seq: $(this).attr('seq'),
								md: $(this).attr('md'),
								control: '1'
							};
					}
					else
					{
						var form_data = {
								seq: $(this).attr('seq'),
								md: $(this).attr('md'),
								control: '0'
							};
					}
				        
				        $.ajax({
				                type: "POST",
				                url: "<?php echo site_url('device_on_off/switch_device'); ?>",
								dataType: 'json',
				                data: form_data,
				                success: function(msg){
									//alert(msg.t2);
									
									//$.each(msg, function(index,value){
							            //process your data by index, in example
							        //    alert(value.t1);
							        //});
									if(msg.r1 == true)
									{
										alert('OK');										
									}
									else
									{
										alert('Not OK');
									}
									
									//$('#btn_changepass').prop("disabled", true);
								}
				            });
				});
			});
	</script>

	
	
	
</body>
</html>
