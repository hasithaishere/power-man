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
						<a href="<?php echo base_url(); ?>users_details">All Users</a>
					</li>
                    
					
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
          <!--  <div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header">
					<h2><i class="icon-list-alt"></i><span class="break"></span>Realtime</h2>
					
				</div>
				<div class="box-content">
					 <div id="realtimechart" style="height:190px;"></div>
					 <p>You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
					 <p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
				</div>
			</div>
		</div><!--/row-->
		
		
					
           <div class="row-fluid sortable">   
           <div class="box span12">      
			<div id="charts" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
			</div>
		</div>
        <hr>
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
		</div>		
	</div><!--/.fluid-container-->

	<script type="text/javascript" charset="utf-8">
	
	function basic_charts(){
	
        $('#charts').highcharts({
            chart: {
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Monthly Average Voltage Consumption',
                x: -20 //center
            },
            subtitle: {
                text: 'Domore Office',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Voltage (w)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'W'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Location 01',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'Location 02',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Location 03',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'Location 04',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
   
    

}	
	
	</script>

	
</body>
</html>
