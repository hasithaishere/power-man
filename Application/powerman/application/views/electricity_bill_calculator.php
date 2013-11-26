<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>	
 		<script src="<?php echo base_url();?>js/power_device.js"></script>
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
						<a href="<?php echo base_url(); ?>electricity_bill_calculator">Electricity Bill Calculator</a> <span class="divider">/</span>
					</li>
                   
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
                     
<div class="row-fluid">
				
		
<div id="container">
<h1>Approved Tariff on 12th April 2013</h1>
<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
                              <th>Consumer Category & consumption(KWh)</th>
                              <th>Unit Charge(Rs)</th>
							
								  
								  <th>Fixed Charge(Rs)</th>
                                  
                                  <th>Fual Adjestment Charge(% of Total Unit charge)</th>
								  
								  <!--<th>Register Status</th>-->
								  
							  </tr>
						  </thead>   
						  <tbody>
                          
                          <tr>
                          	<td><input type="text" value="0-30" />  </td>
                            <td><input type="text" value="5.00" /> </td>
                            <td><input type="text" value="30"/> </td>
                            <td><input type="text" value="25" /> </td>
                            
                            
                          </tr>
                          
                          
                          <tr>
                          	<td><input type="text" value="31-60" /> </td>
                            <td><input type="text" value="6.00"/> </td>
                            <td><input type="text" value="60"/> </td>
                            <td><input type="text" value="35"/> </td>
                            
                            
                          </tr>
                          
                          
                          <tr>
                          	<td><input type="text" value="61-90" /> </td>
                            <td><input type="text" value="8.50" /> </td>
                            <td><input type="text" value="90" /> </td>
                            <td><input type="text" value="40" /> </td>
                            
                            
                          </tr>
                          
                           <tr>
                          	<td><input type="text" value="91-120" /> </td>
                            <td><input type="text" value="15.00" /> </td>
                            <td><input type="text" value="315" /> </td>
                            <td><input type="text" value="40" /> </td>
                            
                            
                          </tr>
                           <tr>
                          <td><input type="text" value="121-180" /> </td>
                            <td><input type="text" value="20.00" /> </td>
                            <td><input type="text" value="315" /> </td>
                            <td><input type="text" value="40" /> </td>
                            
                            
                          </tr>
                           <tr>
                          	<td><input type="text" value="181-210" /> </td>
                            <td><input type="text" value="24.00" /> </td>
                            <td><input type="text" value="315" /> </td>
                            <td><input type="text" value="40" /> </td>
                            
                            
                          </tr>
                           <tr>
                          <td><input type="text" value="211-300" /> </td>
                            <td><input type="text" value="26.00" /> </td>
                            <td><input type="text" value="315" /> </td>
                            <td><input type="text" value="40" /> </td>
                            
                            
                            
                          </tr>
                           <tr>
                          	<td><input type="text" value="301-900" /> </td>
                            <td><input type="text" value="32.00" /> </td>
                            <td><input type="text" value="315" /> </td>
                            <td><input type="text" value="40" /> </td>
                            
                            
                          </tr>
                           <tr>
                          	<td><input type="text" value="900+" /> </td>
                            <td><input type="text" value="34.00" /> </td>
                            <td><input type="text" value="315" /> </td>
                            <td><input type="text" value="40" /> </td>
                            
                            
                            
                          </tr>
                          
                          
                          
                          
                          
                          
                          
                          </tbody>
                          </table>
                          
             <div>
            	<label for="month">Month </label>
                <input id="month" name="month" type="text" />
            
             </div>
             
             <div>
            	<label for="units">Total Units(Kwh) </label>
                <input id="units" name="units" type="text" />
                
             </div>
             
             <div>
            	<label for="cost">Total Cost(Rs) </label>
                <input id="cost" name="cost" type="text" />
                
             </div>





	
             
 </div>	
       
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	
</body>
</html>
