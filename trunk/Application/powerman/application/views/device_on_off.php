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
						<a href="<?php echo base_url(); ?>locations">Locations</a><span class="divider">/</span>
					</li>
                    
					<li>
						<a href="<?php echo base_url(); ?>main_devices">Main Devices</a><span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>device_on_off">Sub Device Controlling</a>
					</li>
				</ul>
				
			</div>
			  <hr>
              	
			<!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                    
                        <hr>
			
                     <div class="row-fluid">
                     <a id="#subdevice_Modal" href="#add_subdevice_Modal" role="button" class="btn btn-primary" data-toggle="modal">Add New Sub Device</a>
				
			
			
			</div>
                     
                     
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
							echo "<a class=\"btn btn-success\"><i class=\"icon-signal icon-white icon-2x\" ></i> Log</a>";
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
				
				
				
			<div class="row">
            	<div class="span3 thumbnail" style="background-color:#373737;padding: 9px 9px 9px 9px;">
                	<div class="row">
                    	<div class="span8" style="color:#fff;"> 	
                            Domore Office / Rathamalane
                        </div>
                        <div class="span4" style="#FFF">
                        <img src="<?php echo base_url(); ?>img/small_washing_machin.jpg" alt=""> 
                        </div>
                        
                        <div class="row" style="color:#FFF;">
                        	<center>Washing Machine</center>
                            <div class="circleStatsItem red">
							<i class="fa-icon-thumbs-up"></i>
							<span class="plus">+</span>
							<span class="percent">%</span>
                        	<input type="text" value="58" class="orangeCircle" />
                    	</div>
                        <div class="row">
                        <center>
                        	<div class="span12" id="on_off_switch_icon" >
                            
                            <div class="switch"   data-on="success" data-off="danger">
                   				 <input type="checkbox" checked /> 
                           </div>
                                 
                    </div>
                    </center>
                    </div>
                    <div class="row">
                    
                           <center>
                            <div class="span12" id="sub_device_icons">
                             <span class="badge badge-warning"><a href="#"><i class="icon-warning-sign icon-white"></i></a></span>
                            <span class="badge badge-important"><a href="#"><i class="icon-ok icon-white"></i></a></span>
                            <span class="badge badge-success"><a href="#"><i class="icon-refresh icon-white"></i></a></span>
                           		
                            
                             </div>
                             </center>
                        </div>
                        </div>
                    </div>
                </div>
            </div>	
            
            <div class="row">
            	<div class="span3 thumbnail" style="background-color:#373737;padding: 9px 9px 9px 9px;">
                	<div class="row">
                    	<div class="span8" style="color:#fff;"> 	
                            Domore Office / Colombo
                        </div>
                        <div class="span4" style="#FFF">
                        <img src="<?php echo base_url(); ?>img/small_microware.jpg" alt=""> 
                        </div>
                        
                        <div class="row" style="color:#FFF;">
                        	<center>Microwave</center>
                           <div class="circleStatsItem green">
                        	<i class="fa-icon-bar-chart"></i>
							<span class="plus">+</span>
							<span class="percent">%</span>
                        	<input type="text" value="34" class="greenCircle" />
                    	</div>
                        <div class="row">
                        <center>
                        	<div class="span12" id="on_off_switch_icon" >
                            
                            <div class="switch"   data-on="success" data-off="danger">
                   				 <input type="checkbox" checked /> 
                           </div>
                                 
                    </div>
                    </center>
                    
                    <div class="row">
                           <center>
                            <div class="span12" id="sub_device_icons">
                             <span class="badge badge-warning"><a href="#"><i class="icon-warning-sign icon-white"></i></a></span>
                            <span class="badge badge-important"><a href="#"><i class="icon-ok icon-white"></i></a></span>
                            <span class="badge badge-success"><a href="#"><i class="icon-refresh icon-white"></i></a></span>
                           		
                            
                             </div>
                             </center>
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
	
	<script type="text/javascript" charset="utf-8">
	
			$(document).ready(function(){
				$('#subdevice_Modal').click(function(){
					$('#add_subdevice_Modal').modal('options');
					
				});
				
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

<div id="add_subdevice_Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
		
 

	
	
</body>
</html>
