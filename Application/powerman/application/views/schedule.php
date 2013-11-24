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
               <form class="form-horizontal well">
                  <div class="control-group">
                    <label class="control-label" for="Device_id">Device ID</label>
                    <div class="controls">
                      <input type="text" id="Device_id">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="Deviece_name">Device Name</label>
                    <div class="controls">
                      <input type="text" id="Device_name">
                    </div>
                  </div>
                  
           
                  <div class="control-group">
                  <label class="control-label" for="schedule_date">Schedule Date</label>
                  <div class="controls">
                      <div class="input-append date" id="datetimepicker1">
                        <input value="" data-format="yyyy-MM-dd hh:mm:ss" type="text">
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
                                		if(strtotime("now")<strtotime($rows['schedule_on']))
                                		{
                                			echo "<span class=\"label label-info\">Pending</span>";
                                		}
										else
										{
											echo "<span class=\"label label-success\">Completed</span>";
										}
										echo "</td>";
									
								
                                		echo "<td class=\"center\">";
										if($rows['control_status']==1)
										{
											echo "<span class=\"label label-success\">ON</span>";
										}
										elseif ($rows['control_status']==0) 
										{
											echo "<span class=\"label label-important\">OFF</span>";
										}
										echo "</td>";
								
										echo "<td class=\"center\">";
                                		echo "<div class=\"btn-group\">";
                                		echo "<a href=\"#\" class=\"btn btn-info\"><i class=\"icon-edit icon-white\"></i></a>";
                                     	echo "<a href=\"#\" data-toggle=\"dropdown\" class=\"btn btn-info dropdown-toggle\"><span class=\"caret\"></span></a>";
                                     	echo "<ul style=\"min-width:88px;\" class=\"dropdown-menu\">";
                                     	echo "<li><a href=\"#\"><i class=\"icon-pencil\"></i> Edit</a></li>";
                                        echo "<li><a href=\"#\"><i class=\"icon-ban-circle\"></i> Enable</a></li>";
                                        echo "<li class=\"divider\"></li>";
                                        echo "<li><a class=\"\" href=\"#\"><i class=\"icon-trash\"></i> Delete</a></li>";
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





		

	
	
	
</body>
</html>

