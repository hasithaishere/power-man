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
						<a href="<?php echo base_url(); ?>main_devices">Main Devices</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
                     
			<div class="row-fluid">
				<a href="<?php echo base_url()."add_newmaindevice/index/".$location_id; ?>" role="button" class="btn btn-success"><i class="icon-plus-sign icon-white"></i><span class="break"></span> Add Main Device</a>
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
              		echo "<center><h3>" . $rows['device_title'] . "</h3>";
              		echo "<span class=\"label label-success\">Active</span>";
              		echo "</center>";
                  	echo "<img src=\"". base_url() . "img/" . $rows['power_images_url'] ."\" alt=\"\">";
                  	echo "<div class=\"caption\">";
                    echo "<h3>" . $rows['device_id'] . "</h3>";
                    echo "<p>" . $rows['device_description'] . "</p>";
                    echo "<a href=\"" . base_url() . "device_on_off/index/" . $this->encrypt_data->encode($rows['device_id']) . "\" class=\"btn btn-success\">Main Device</a><span> </span>";
                  	echo "<a href=\"#showfilter_option\" role=\"button\" class=\"btn btn-info filterbtn\" data-toggle=\"modal\" ><i class=\"icon-signal icon-white\"></i></a>";
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





<!--
<div class="row">


  <div class="box span3">
  <div class="thumbnail">
  <center><h3>Domore Office Location</h3>
  <span class="label label-success">Main Device 01</span>
  </center>
     <img src="<?php echo base_url(); ?>img/main_device.png" alt="">
      <div class="caption">
        <h3>Company Package</h3>
        <p>Domore Technology Office Area</p>
        <p><a href="<?php echo base_url(); ?>locations" class="btn btn-primary">Locations</a> <a href="<?php echo base_url(); ?>sub_devices" class="btn btn-primary">Sub Devices</a> 
      </div>
    </div>
  </div>
  
  
  </div>
  
 
  
  
  
  
  
  
  
  
  
			<hr>
	-->		
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->

		<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$('.filterbtn').click(function(){
				$('#showfilter_option').appendTo("body");
				//$("#showfilter_option").css("z-index", "1500");
			});
			
			var currentYear = (new Date).getFullYear();
			var currentMonth = (new Date).getMonth();

			$("#month_select").val(currentMonth+1);
			$("#year_select").val(currentYear);
			
			$("#month_select").attr("disabled","disabled");
			$("#year_select").attr("disabled","disabled");
			
			$("#rb_year").change(function(){
				$("#year_select").attr("disabled","disabled");
				$("#month_select").attr("disabled","disabled");
			});
			
			$("#rb_month").change(function(){
				$("#year_select").removeAttr("disabled");
				$("#month_select").attr("disabled","disabled");
			});
			
			$("#rb_day").change(function(){
				$("#year_select").removeAttr("disabled");
				$("#month_select").removeAttr("disabled");
			});
			
		});
	
	
	</script>
	
 <!-- Modals Start -->
 
		<div id="showfilter_option" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form class="form-horizontal" action="<?php echo base_url();?>index.php/main_devices/filterReport/<?php echo $location_id;?>" method="post">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Filter Power Monitoring</h3>
		</div>
		<div class="modal-body">
		<p>Please select filtering option. According to your selection all the main devices' power consumption will display.</p>
		
		<div>
             	<label for="head_msg" style="font-weight:600;">Group By</label>
        </div>
		
		<div>
             	<label class="radio">
				<input type="radio" name="groupby_rb" id="rb_year" value="1" checked>
				Yearly
				</label>
				<label class="radio">
				<input type="radio" name="groupby_rb" id="rb_month" value="2">
				Monthly
				</label>
				<label class="radio">
				<input type="radio" name="groupby_rb" id="rb_day" value="3">
				Daily
				</label>
				<label class="radio">
				<input type="radio" name="groupby_rb" id="rb_hour" value="4" disabled="disabled">
				Hourly
				</label>
        </div>
        <label>According to gouping selection please fill year and month when it requires.</label>
        <div>
            <label for="head_msg" style="font-weight:600;">Year</label>
            <select name="year_select" id="year_select">
            	<?php
            		for($i=1900;$i<=2100;$i++)
					{
						echo "<option value=\"". $i ."\">". $i ."</option>";
					}            		
            	?>
            </select>
        </div>
        <div>
            <label for="head_msg" style="font-weight:600;">Month</label>
            <select name="month_select" id="month_select">
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
            </select>
        </div>
        
			
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary" aria-hidden="true" id="model_runfilter" type="submit">Run Filter &raquo;</button>
		</div>
		</form>
		</div>
<!-- Modals End -->
	
	
</body>
</html>
