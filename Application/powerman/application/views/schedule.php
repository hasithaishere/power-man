<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>
 
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" type="text/css">  




<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>



 			
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
						<a href="<?php echo base_url(); ?>users_details">Schedule</a>
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
              
               <div><h2>Add a New Schedule</h2></div>
               <form class="form-horizontal well" method="post" action="<?php echo base_url() . "schedule/scheduling/" . $device_id . "/" . $maindevice_id;?>">
                  <div class="control-group">
                    <label class="control-label" for="Device_id">Device ID</label>
                    <div class="controls">
                      <input type="text" id="Device_id" name="Device_id" value="<?php echo $device_id;?>" style="width: 50% ! important;">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="Deviece_name">Device Name</label>
                    <div class="controls">
                      <input type="text" id="Device_name" name="Device_name" value="<?php echo $content2['sub_devicetitle'];?>" style="width: 50% ! important;">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="Deviece_location">Device Location</label>
                    <div class="controls">
                      <input type="text" id="Deviece_location" name="Deviece_location" value="<?php echo $content2['loc_name']." / ".$content2['loc_subname']." / ".$content2['main_devicetitle'];?>" style="width: 50% ! important;">
                    </div>
                  </div>
                  
           
                  <div class="control-group">
                  <label class="control-label" for="schedule_date">Schedule Date</label>
                  <div class="controls">
                      <div class="input-append date" id="datetimepicker1">
                        <input name="schedule_on" value="<?php echo $curent_time;?>" data-format="yyyy-MM-dd hh:mm:ss" type="text" style="width: 70% ! important;">
                        <span class="add-on">
                          <i class="icon-time" data-date-icon="icon-calendar" data-time-icon="icon-time">
                          </i>
                        </span>
                      </div>
                  
                    </div>
        </div>
        		<!--	 
                  <div class="control-group">
                  <label class="control-label" for="schedule_time">Schedule Time</label>
                  <div class="controls">
                        <div class="input-append bootstrap-timepicker" id="time">
                <input id="timepicker1" type="text" class="input-small timepicker" ">
                <span class="add-on"><i class="icon-time"></i></span>
                </div>
                </div>
                </div>-->
                  
                 <div class="control-group"> 
                 <label class="control-label" for="schedule_action">Action</label>
                 <div class="controls">
                  <label class="radio">
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                  <span class="label label-success">Switch ON</span>
                </label>
                <label class="radio">
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="0">
                  <span class="label label-important">Switch OFF</span>
                </label>
                  </div>
                  </div>
                  
                  
                  <div class="control-group">
                    <div class="controls">
					 <button type="submit" class="btn btn-info">Set Schedule</button>
                    </div>
                  </div>
                  	<?php
		            	if($success_schedule == 1)
						{
							echo "<div class=\"control-group\"><div class=\"controls\"><div class=\"alert alert-success span12\">". $success_schedule_msg . "</div></div></div>";
						}
	          		?>
                </form>
               
        
					<div class="box-header" style="margin-bottom:5px;" data-original-title>
					<h2 style="font-weight: 700;">Currently available schedules</h2>						
					</div>
					<div class="box-content">
				
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Schedule Set Time</th>
								  <th>Schedule Execute Time</th>
                                  <th>Execution Status</th>
                                  <th>Control Status</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	
						  	<?php

									foreach($content as $rows)
									{
						  	
										echo "<tr>";
										echo "<td class=\"center\">". $rows['control_on'] ."</td>";
										echo "<td class=\"center\">". $rows['schedule_on'] ."</td>";
                                		
                                		echo "<td class=\"center\">";
										
										$cancelled_status = 0;
                                		
                                		if($rows['schedule_cancel']==0)
										{
											if(strtotime("now")<strtotime($rows['schedule_on']))
	                                		{
	                                			echo "<span class=\"label label-info\">Pending</span>";
												$cancelled_status = 1;
	                                		}
											else
											{
												echo "<span class=\"label label-success\">Completed</span>";
											}
										}
										else 
										{
											echo "<span class=\"label label-important\">Cancelled</span>";
										}
										echo "</td>";
									
								
                                		echo "<td class=\"center\">";
										
										$delete_status = 0;
										
										if($rows['control_status']==1)
										{
											echo "<span class=\"label label-success\">ON</span>";
										}
										elseif ($rows['control_status']==0) 
										{
											echo "<span class=\"label label-important\">OFF</span>";
											$delete_status = 1;
										}
										echo "</td>";
								
										echo "<td class=\"center\">";
                                		echo "<div class=\"btn-group\">";
                                		echo "<a href=\"#\" class=\"btn btn-info\"><i class=\"icon-edit icon-white\"></i></a>";
                                     	echo "<a href=\"#\" data-toggle=\"dropdown\" class=\"btn btn-info dropdown-toggle\"><span class=\"caret\"></span></a>";
                                     	echo "<ul style=\"min-width:88px;\" class=\"dropdown-menu\">";
                                     	//echo "<li><a href=\"#\"><i class=\"icon-pencil\"></i> Edit</a></li>";
                                     	
                                     	if($cancelled_status == 1)
										{
                                        	echo "<li><a class=\"cancel_sch\" href=\"#cancel_schedule\" data-toggle=\"modal\" cancel_url=\"". base_url() . "schedule/cancel_schedule/".$rows['id']."/". $this->encrypt_data->encode($rows['schedule_on']) . "/" . $delete_status ."/".$rows['device_id']."/".$rows['maindevice_id']."\"><i class=\"icon-ban-circle\"></i> Cancel</a></li>";
										}
										else 
										{
                                        	//echo "<li class=\"divider\"></li>";
											echo "<li><a class=\"delete_sch\" href=\"#delete_schedule\" data-toggle=\"modal\" delete_url=\"". base_url() . "schedule/delete_schedule/". $rows['id'] ."/".$rows['device_id']."/".$rows['maindevice_id']."\"><i class=\"icon-trash\"></i> Delete</a></li>";
										}
                                        
                                        echo "</ul>";
                                        echo "</div>";
										echo "</td>";
										echo "</tr>";
							
									}
							?>
							
                            </tbody>
                        </table>
                           
                        
					   
                        
					</div>
				</div><!--/span-->
			
			</div>
			<hr>
			
		
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
        <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-datetimepicker.js"></script> 
		<!-- end: footer-->
		</div>		
	</div><!--/.fluid-container-->

	<!-- Modals Start -->
		<div id="cancel_schedule" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Confirm Cancel Schedule</h3>
		</div>
		<div class="modal-body">
		<p>Do you want to cancel this schedule?</p>
		</div>
		<div class="modal-footer">
			<a href="#" role="button" class="btn btn-danger" id="model_btn_cancelsch"><i class="icon-ban-circle icon-white"></i> Cancel</a>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		
		</div>
		</div>
	<!-- Modals End -->
	
	<!-- Modals Start -->
		<div id="delete_schedule" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Confirm Delete Schedule</h3>
		</div>
		<div class="modal-body">
		<p>Do you want to delete this schedule?</p>
		</div>
		<div class="modal-footer">
			<a href="#" role="button" class="btn btn-danger" id="model_btn_deletesch"><i class="icon-trash icon-white"></i> Delete</a>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		
		</div>
		</div>
	<!-- Modals End -->

	<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				
				$(".cancel_sch").click(function(){
					$("#model_btn_cancelsch").attr('href',$(this).attr('cancel_url'));
				});
				
				$(".delete_sch").click(function(){
					$("#model_btn_deletesch").attr('href',$(this).attr('delete_url'));
				});
				
			});
	</script>

		

	
	
	
</body>
</html>

