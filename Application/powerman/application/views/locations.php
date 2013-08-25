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
						<a href="<?php echo base_url(); ?>locations">Locations</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
                     
			<div class="row-fluid">
				<a href="<?php echo base_url(); ?>add_location" role="button" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i><span class="break"></span> ADD New Location</a>
                <hr>
			<?php
				$i = 0;
				foreach($content as $rows)
				{
					if($i == 0)
					{
						echo "<div class=\"row\">"; // For creating rows - 4 columns for one row - start div
					}
					
					echo "<div class=\"box span3\">";
              		echo "<div class=\"thumbnail\">";
              		echo "<center><h3>" . $rows['name'] . "</h3>";
              		echo "<span class=\"label label-success\">Active</span>";
              		echo "</center>";
                  	echo "<img src=\"". base_url() . "img/" . $rows['image_url'] ."\" alt=\"\">";
                  	echo "<div class=\"caption\">";
                    echo "<h3>" . $rows['sub_name'] . "</h3>";
                    echo "<p>" . $rows['description'] . "</p>";
                    echo "<a href=\"" . base_url() . "main_devices/index/" . $this->encrypt_data->encode($rows['id']) . "\" class=\"btn btn-primary\">Main Device</a>";
                  	echo "</div></div></div>";
					
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
           
		<!-- <div class="row">
            
            
             <div class="box span3">
              <div class="thumbnail" id="add_thumbnail">
              <center><h3>Add New Location</h3>
              
              </center>
                 <img src="<?php echo base_url(); ?>img/add.jpg" alt="">
                  <div class="caption"> 
                    
                  <center><a href="#add_new_location" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i><span class="break"></span> ADD Location</a></center>
                   
                  </div>
                </div>
              </div>
              
              
            </div>
              
              
			<hr>-->
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	
</body>
</html>
