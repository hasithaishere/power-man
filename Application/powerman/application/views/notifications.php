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
						<a href="<?php echo base_url(); ?>users_details">Alert Notifications</a>
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
					<div class="" style="margin-bottom:5px;" data-original-title>
				<!--		<a href="#" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i><span class="break"></span> Notify All</a>
                        <a href="#" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i><span class="break"></span> Selected Notify</a> -->
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                              <th></th>
                              <th>Alert Reference</th>
								  <th>Alert Priority</th>
								  
								  <th>Alert Description</th>
                                  
                                  <th>Alert Date</th>
								  
								  <!--<th>Register Status</th>-->
								  
							  </tr>
						  </thead>   
						  <tbody>
							<?php 
								foreach($content as $rows)
								{
									echo "<tr><td><label class=\"checkbox\"><input type=\"checkbox\" name=\"notify\" id=\"notify\" 
									value=".$rows['notified']."></label></td>";
									
									//if ($rows['notified'] == "0") {echo "checked = checked";} 
									
									echo "<td>".$rows['id']."</td>";
									
									echo "<td>".$rows['alert_priority']."</td>";
									
									echo "<td>".$rows['alert_discri']."</td>";
									
									echo "<td>".$rows['created_on']."</td></tr>";
									
									
									
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
		<!-- end: footer-->
		</div>		
	</div><!--/.fluid-container-->





	
	
	
</body>
</html>
