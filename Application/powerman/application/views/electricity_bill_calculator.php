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
                <h1>Select the month and the year to generate the electricity bill.</h1>    <br/>      
               <form method="post" id="add_subDevice_form" action="<?php echo base_url();?>electricity_bill_calculator/calculate">       
              <div>
            	<label for="year_description" style="font-weight: 700;">Year</label>
            <select name="year" id="year">
            
			<?php
				$i = 1900;
				while ($i<=2100) 
				{
					if($i == date("Y"))
					{
						echo '<option value="'. $i .'" selected="selected">'. $i .'</option>';
					}
					else
					{
						echo '<option value="'. $i .'">'. $i .'</option>';
					}
				   $i++;
				}
			?>
			</select>
                <span id="sub_device_type_Details">What is the year you want ?</span>  
            </div>
          	
          	<!----------------- This Part For Selecting Device Type - START ------------------>
          	
          	<div>    
            <div>
            	<label for="month_description" style="font-weight: 700;">Month</label>
            <select name="month" id="subdevice_type">
            
			<?php
			
				$m = 1;
				while ($m<=12) 
				{
					if($m == date("m"))
					{
						echo '<option value="'. $m .'" selected="selected">'. date("F", mktime(0, 0, 0, $m, 10)) .'</option>';
					}
					else
					{
						echo '<option value="'. $m .'">'. date("F", mktime(0, 0, 0, $m, 10)) .'</option>';
					}
				   $m++;
				}
			?>
			</select>
             
                <span id="sub_device_type_Details">What is the month you want ?</span>  
                </div>
          	
             </div>
    
            
             </div>
             
             <div>
            	<label for="units">Total Units(Kwh) </label>
                <input id="units" name="units" type="text" value="<?php echo $units;?>" />
                
             </div>
             
             <div>
            	<label for="cost">Total Cost(Rs) </label>
                <input id="cost" name="cost" type="text" value="<?php echo $price;?>" />
                
             </div>
			<input type="submit" id="generate_report" class="btn btn-success" value="Monthly Electricity Bill Amount" />

</form>


	
             
 </div>	
       
			
			
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div><!--/.fluid-container-->
	
	
</body>
</html>
