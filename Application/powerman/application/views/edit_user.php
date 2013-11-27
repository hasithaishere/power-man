<!DOCTYPE html>
<html lang="en"><head>

<?php include 'includes/head.php'; ?>		
		
</head>

<body>
<!-- start: Header Menu -->
		<?php include 'includes/headerbar.php'; ?>
<!-- end: Header Menu -->

<!-- start: Header -->
		
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
						<a href="<?php echo base_url(); ?>edit_user/index/hhXAaMJXNvvfrV1R2N5t9kYsLgKmaQ8H2IKjsgEh4Lw">User Profile</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                        <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
<!----------START-Update Basic Profile--------->
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-edit"></i><span class="break"></span>Basic User Information</h2>
					</div>
					<div class="box-content">
						
			<form method="post" id="basic_profile" action="<?php echo base_url();?>index.php/edit_user/update_user_details/<?php echo $userdata[0]['id'];?>">
        	<fieldset>
        	
        	<div class="control-group">
            	<label class="control-label"  for="fname">First Name </label>
                <div class="controls">
	                <input id="fname" name="fname" type="text" <?php echo "value=\"" . $userdata[0]['fname'] . "\"";?>/>
	                <span id="nameDetails">What's your first name?</span>
                </div>
             </div>
             
             <div class="control-group">
            	<label for="lname" class="control-label" >Last Name </label>
                <div class="controls">
	                <input id="lname" name="lname" type="text" <?php echo "value=\"" . $userdata[0]['lname'] . "\"";?>/>
	                <span id="lnameDetails">What's your last name?</span>
                </div>
             </div>
             
              <div class="control-group">
            	<label for="address1" class="control-label" >Address Line 1 </label>
                <div class="controls">
	                <input id="name" name="address1" type="text" <?php echo "value=\"" . $userdata[0]['address1'] . "\"";?>/>
	                <span id="addressDetails1">What's your Address?</span>
                </div>
             </div>
             
              <div class="control-group">
            	<label for="address2" class="control-label" >Address Line 2 </label>
            	<div class="controls">
	                <input id="address2" name="address2" type="text" <?php echo "value=\"" . $userdata[0]['address2'] . "\"";?>/>
	                <span id="addressDetails2">What's your address?</span>
                </div>
             </div>
             
             <div class="control-group">
            	<label for="city" class="control-label" >City </label>
            	<div class="controls">
	                <input id="city" name="city" type="text" <?php echo "value=\"" . $userdata[0]['city'] . "\"";?>/>
	                <span id="cityDetails">What's your city?</span>
                </div>
             </div>
             
             <div class="control-group">
            	<label for="province" class="control-label" >Province/ Region </label>
            	<div class="controls">
	                <input id="province" name="province" type="text" <?php echo "value=\"" . $userdata[0]['province'] . "\"";?>/>
	                <span id="provinceDetails">What's your Province/Region?</span>
                </div>
             </div>
			
            <div class="control-group">
            	<label for="zipcode" class="control-label" >Zip Code </label>
            	<div class="controls">
	                <input id="zipcode" name="zipcode" type="text" <?php echo "value=\"" . $userdata[0]['zip'] . "\"";?>/>
	                <span id="zipcodeDetails">What's your zip code</span>
                </div>
             </div>
        
         <div class="control-group">  
         <label for="country" class="control-label" >Country</label>
         <div class="controls"> 
            <select id="countries" name="countries">
             	
			<?php
			
					$xmlDoc = new DOMDocument();
					$xmlDoc->load($this->config->item('server_root') . "/xml/countries.xml");
					
					$searchNode = $xmlDoc->getElementsByTagName( "country" );
					
					foreach( $searchNode as $searchNode )
					{	    
					
					    $xmlDate = $searchNode->getElementsByTagName( "name" );
					    $value = $xmlDate->item(0)->nodeValue;
						
						if(!strcmp($userdata[0]['country'], $value))
						{
							echo "<option value=\"" . $value . "\" selected=\"selected\">" . $value . "</option>";
						}	
						else 
						{
							echo "<option value=\"" . $value . "\">" . $value . "</option>";
						}   
					    
					} 
			
			?>

			</select>
			</div>
        </div>      
            
             <div class="control-group">
             	<label for="email" class="control-label" >Email</label>
             	<div class="controls">
				 <input id="email" name="email" type="text" <?php echo "value=\"" . $userdata[0]['email'] . "\"";?>/>
                <span id="emailDetails">So I can get back to you</span>
                </div>
             </div>
			<div class="control-group">
				<div class="controls">	
						<button type="submit" class="btn btn-info">Save changes</button>
				</div>
            </div>
            <?php
            	if($success_update == 1)
				{
					echo "<div class=\"control-group\"><div class=\"controls\"><div class=\"alert alert-success\">". $success_update_msg . "</div></div>";
				}
            ?>
            
			<div class="control-group">
				<div class="controls">	
		             	<?php echo validation_errors('<div class="alert alert-danger">');?>
		   		</div>
		   	</div>
					
					</fieldset>
					</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			 
<!----------END-Update Basic Profile--------->

<!----------START-Update Password--------->
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-edit"></i><span class="break"></span>Update Password</h2>
					</div>
					<div class="box-content">
						
			<form method="post" id="change_password" action="<?php echo base_url();?>index.php/edit_user/update_user_password/<?php echo $userdata[0]['id'];?>">
        	<fieldset>
        	
        	<div class="control-group">
             	<input type="checkbox" name="is_change_pass" value="1" id="is_change_pass">
             	<label for="is_change_pass" style="position: absolute; margin-top: -16px; margin-left: 20px;">Do you want to change the password ?</label>
             </div>
             
             <div class="control-group">
             	<label class="control-label" for="pass1">Password</label>
             	<div class="controls">
					<input id="pass1" name="pass1" type="password" <?php echo "value=\"**********\"";?>/>
                	<span id="pass1Details">8 characters or more please</span>
             	</div>
             </div>
             <div class="control-group">
             	<label class="control-label" for="pass2">Confirm Password</label>
				<div class="controls">
					<input id="pass2" name="pass2" type="password" <?php echo "value=\"**********\"";?>/>
	                <span id="pass2Details">Same as above</span>
                </div>
             </div>
        	 <div class="control-group">
				<div class="controls">
        			<button type="submit" class="btn btn-info" id="update_password">Save changes</button>
        		</div>
             </div>
			<?php
            	if($success_updatepass == 1)
				{
					echo "<div class=\"control-group\"><div class=\"controls\"><div class=\"alert alert-success\">". $success_updatepass_msg . "</div></div>";
				}
            ?>	
					
					</fieldset>
					
					</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			 
<!----------END-Update Password--------->

<!----------START-Change Power Package--------->
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-edit"></i><span class="break"></span>Transfer to new package</h2>
					</div>
					<div class="box-content">
					
             		<form method="post" id="contact_form" action="<?php echo base_url();?>index.php/edit_user/update_user/<?php echo $userdata[0]['id'];?>">
        			<fieldset>
							<div class="controls">
						<a class="btn btn-info btn-setting" href="<?php echo base_url();?>Upgrade_Package">Change Package</a>
                	<span id="change_package">Click here to change the power package.</span>
             	</div>						
							
					<div>
		             	<?php echo validation_errors('<div class="alert alert-danger">');?>
		           	</div>
							
					</fieldset>
					</form>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			 
<!----------END-Chanage Power Package--------->
<!--
<div id="container">
	<h1>Create a User</h1>
    	<form method="post" id="contact_form" action="<?php echo base_url();?>index.php/edit_user/update_user/<?php echo $userdata[0]['id'];?>">
        	<div>
            	<label for="fname">First Name </label>
                <input id="fname" name="fname" type="text" <?php echo "value=\"" . $userdata[0]['fname'] . "\"";?>/>
                <span id="nameDetails">What's your first name?</span>
             </div>
             
             <div>
            	<label for="lname">Last Name </label>
                <input id="lname" name="lname" type="text" <?php echo "value=\"" . $userdata[0]['lname'] . "\"";?>/>
                <span id="lnameDetails">What's your last name?</span>
             </div>
             
              <div>
            	<label for="address1">Address Line 1 </label>
                <input id="name" name="address1" type="text" <?php echo "value=\"" . $userdata[0]['address1'] . "\"";?>/>
                <span id="addressDetails1">What's your Address?</span>
             </div>
             
              <div>
            	<label for="address2">Address Line 2 </label>
                <input id="address2" name="address2" type="text" <?php echo "value=\"" . $userdata[0]['address2'] . "\"";?>/>
                <span id="addressDetails2">What's your address?</span>
             </div>
             
             <div>
            	<label for="city">City </label>
                <input id="city" name="city" type="text" <?php echo "value=\"" . $userdata[0]['city'] . "\"";?>/>
                <span id="cityDetails">What's your city?</span>
             </div>
             
             <div>
            	<label for="province">Province/ Region </label>
                <input id="province" name="province" type="text" <?php echo "value=\"" . $userdata[0]['province'] . "\"";?>/>
                <span id="provinceDetails">What's your Province/Region?</span>
             </div>
			
            <div>
            	<label for="zipcode">Zip Code </label>
                <input id="zipcode" name="zipcode" type="text" <?php echo "value=\"" . $userdata[0]['zip'] . "\"";?>/>
                <span id="zipcodeDetails">What's your zip code</span>
             </div>
        
         <div>  
         <label for="country">Country</label> 
            <select id="countries" name="countries">
             	
			<?php
			
					$xmlDoc = new DOMDocument();
					$xmlDoc->load($this->config->item('server_root') . "/xml/countries.xml");
					
					$searchNode = $xmlDoc->getElementsByTagName( "country" );
					
					foreach( $searchNode as $searchNode )
					{	    
					
					    $xmlDate = $searchNode->getElementsByTagName( "name" );
					    $value = $xmlDate->item(0)->nodeValue;
						
						if(!strcmp($userdata[0]['country'], $value))
						{
							echo "<option value=\"" . $value . "\" selected=\"selected\">" . $value . "</option>";
						}	
						else 
						{
							echo "<option value=\"" . $value . "\">" . $value . "</option>";
						}   
					    
					} 
			
			?>

			</select>
        </div>      
            
             <div>
             	<label for="email">Email</label>
				 <input id="email" name="email" type="text" <?php echo "value=\"" . $userdata[0]['email'] . "\"";?>/>
                <span id="emailDetails">So I can get back to you</span>
             </div>
             
             <div>
             	<hr/>
             </div>
             
             <div>
             	<input type="checkbox" name="is_change_pass" value="1" id="is_change_pass">
             	<label for="is_change_pass" style="position: absolute; margin-top: -16px; margin-left: 20px;">Do you want to change the password ?</label>
             </div>
             
             <div>
             	<label for="pass1">Password</label>
				 <input id="pass1" name="pass1" type="password" <?php echo "value=\"" . $userdata[0]['password'] . "\"";?>/>
                <span id="pass1Details">8 characters or more please</span>
             </div>
             <div>
             	<label for="pass2">Confirm Password</label>
				 <input id="pass2" name="pass2" type="password" <?php echo "value=\"" . $userdata[0]['password'] . "\"";?>/>
                <span id="pass2Details">Same as above</span>
             </div>
            
            <div>
             	<hr/>
            </div>
            
            <div>
                <label for="package">Package category?</label>
                <select name="pack">
                	
               	<?php
				
					foreach($packages as $rows)
					{
						if(!strcmp($userdata[0]['package'], $rows['id']))
						{
							echo "<option value=\"" . $rows['id'] . "\" selected=\"selected\">" . $rows['name'] . "</option>";
						}
						else 
						{
							echo "<option value=\"" . $rows['id'] . "\" >" . $rows['name'] . "</option>";
						}
												
					}
				?>
				<!--					
                <option value="1" selected>Home Edition</option>
                <option value="2">Small Business Edition</option>
                <option value="3" >Enterprise Edition</option>

                </select>
                <span id="package">Choose the Package Category</span>
            </div>

             <div>
             	<input id="send" name="send" type="submit" value="Update User" />
             </div>
             
             <div>
             	<?php echo validation_errors('<div class="alert alert-danger">');?>
             </div>
             </form>

</div>-->
			<hr>
			
			
		
		<div class="clearfix"></div>
        <!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div>

	<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				
				$("#pass1").attr('disabled','disabled');
				$("#pass2").attr('disabled','disabled');
				$("#update_password").attr('disabled','disabled');
				
				$("#is_change_pass").change(function(){
					
					if($("#is_change_pass").is(':checked'))
					{
						$("#pass1").removeAttr('disabled');
						$("#pass2").removeAttr('disabled');
						$("#update_password").removeAttr('disabled');
						$("#pass1").val("");
						$("#pass2").val("");
					}
					else
					{
						$("#pass1").attr('disabled','disabled');
						$("#pass2").attr('disabled','disabled');
						$("#pass1").val("************");
						$("#pass2").val("************");
						$("#update_password").attr('disabled','disabled');
					}
					
				});
				
			});
	</script>
	
</body>
</html>
