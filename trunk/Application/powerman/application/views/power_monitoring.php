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
                text: '<?php echo $headtext;?>',
                x: -20 //center
            },
            subtitle: {
                text: 'Location Base',
                x: -20
            },
            xAxis: {
                categories: <?php echo json_encode($xtitle);?>
            },
            yAxis: {
                title: {
                    text: 'Wattage (KW)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'KW'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            
            <?php
            	echo "series: [";
            
				$datastring = "";
				//print_r($mapdata);
				foreach($mapdata as $level2)
				{
					foreach($level2 as $key => $val)
					{
						$datastring .= "{ name: '" . $key . "', data: " . json_encode($val) . "},";
					}
				}
				$datastring = rtrim($datastring,',');
				$datastring = str_replace("\"", "'", $datastring);
				echo $datastring;
            	echo "]";
            	
            ?>
        });

}
	</script>

	
</body>
</html>
