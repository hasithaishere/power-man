<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>
 
<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker.css" type="text/css">  
<link type="text/css" href="<?php echo base_url();?>css/bootstrap-timepicker.min.css" />
<link type="text/css" href="<?php echo base_url();?>css/timepicker.min.css" />

<script  type="text/javascript" src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-timepicker.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
			
			$('#dp3').datepicker();
		//	$('#time').timepicker();
			
			
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
              
               <div align="center"><h2>Add a New Schedule</h2></div>
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
                      <input type="password" id="Device_name">
                    </div>
                  </div>
                  
                  <div class="control-group">
                  <label class="control-label" for="schedule_date">Schedule Date</label>
                  <div class="controls">
                  <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">                  
                    <input size="16" type="text" value="12-02-2012" readonly>
                    <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    </div>
        </div>
        			 
                  <div class="control-group">
                  <label class="control-label" for="schedule_time">Schedule Time</label>
                  <div class="controls">
                        <div class="input-append bootstrap-timepicker" id="time">
                <input id="timepicker1" type="text" class="input-small timepicker" ">
                <span class="add-on"><i class="icon-time"></i></span>
                </div>
                </div>
                </div>
                  
                 <div class="control-group"> 
                 <label class="control-label" for="schedule_action">Action</label>
                 <div class="controls">
                  <label class="radio">
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Switch ON
                </label>
                <label class="radio">
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Switch OFF
                </label>
                  </div>
                  </div>
                  
                  
                  <div class="control-group">
                    <div class="controls">
					 <button type="submit" class="btn">Set Schedule</button>
                    </div>
                  </div>
                </form>
               
        
					<div class="box-header" style="margin-bottom:5px;" data-original-title>
						
						
					</div>
					<div class="box-content">
				
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                              	<th>Device ID</th>
								  <th>Scheduled Date</th>
								  <th>Scheduled Time</th>
								  <th>Scheduling Date</th>
								  <th>Scheduling Time</th>
                                  <th>Schedule To</th>
                                  <th>Scheduling Status</th>
                                  <th>Device Status</th>
								  <th>Control</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
                            <td>0005</td>
								<td>26/10/2013</td>
								<td class="center">11.00 p.m</td>
								<td class="center">28/10/2013</td>
								<td class="center">2.00 p.m</td>
                                <td class="center">Switch Off</td>
                                <td class="center">
									<span class="label label-info">Pending</span>
								</td>
                                <td class="center">
									<span class="label label-success">ON</span>
								</td>
								<td class="center">
                                <div class="btn-group">
                                	<a href="#" class="btn btn-info"><i class="icon-edit icon-white"></i></a>
                                     <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></a>
                                     <ul style="min-width:88px;" class="dropdown-menu">
                                     	<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                        <li><a href=""><i class="icon-ban-circle"></i> Enable</a></li>
                                        <li class="divider"></li>
                                        <li><a class="" href=""><i class="icon-trash"></i> Delete</a></li>
                                        </ul>
                                        </div>
									
				
								</td>
							</tr>
							
                            </tbody>
                        </table>
                           
                        
					   
                        
					</div>
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
