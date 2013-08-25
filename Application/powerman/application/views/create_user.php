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
						<a href="<?php echo base_url(); ?>create_user">Create a User</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                        <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
			
                     
<div id="container">
	<h1>Create a User</h1>
    	<form method="post" id="contact_form" action="<?php echo base_url();?>index.php/create_user/add_new_user">
        	<div>
            	<label for="fname">First Name </label>
                <input id="fname" name="fname" type="text" />
                <span id="nameDetails">What's your first name?</span>
             </div>
             
             <div>
            	<label for="lname">Last Name </label>
                <input id="lname" name="lname" type="text" />
                <span id="lnameDetails">What's your last name?</span>
             </div>
             
              <div>
            	<label for="address1">Address Line 1 </label>
                <input id="name" name="address1" type="text" />
                <span id="addressDetails1">What's your Address?</span>
             </div>
             
              <div>
            	<label for="address2">Address Line 2 </label>
                <input id="address2" name="address2" type="text" />
                <span id="addressDetails2">What's your address?</span>
             </div>
             
             <div>
            	<label for="city">City </label>
                <input id="city" name="city" type="text" />
                <span id="cityDetails">What's your city?</span>
             </div>
             
             <div>
            	<label for="province">Province/ Region </label>
                <input id="province" name="province" type="text" />
                <span id="provinceDetails">What's your Province/Region?</span>
             </div>
			
            <div>
            	<label for="zipcode">Zip Code </label>
                <input id="zipcode" name="zipcode" type="text" />
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
								   
					    echo "<option value=\"" . $value . "\">" . $value . "</option>";
					} 
			
			?>

			</select>
        </div>      
            
             <div>
             	<label for="email">Email</label>
				 <input id="email" name="email" type="text" />
                <span id="emailDetails">So I can get back to you</span>
             </div>
             <div>
             	<label for="pass1">Password</label>
				 <input id="pass1" name="pass1" type="password" />
                <span id="pass1Details">8 characters or more please</span>
             </div>
             <div>
             	<label for="pass2">Confirm Password</label>
				 <input id="pass2" name="pass2" type="password" />
                <span id="pass2Details">Same as above</span>
             </div>
            
            <div>
                <label for="package">Package category?</label>
                <select name="pack">
                	
               	<?php
				
					foreach($packages as $rows)
					{
						echo "<option value=\"" . $rows['id'] . "\">" . $rows['name'] . "</option>";
					}
				?>
				<!--					
                <option value="1" selected>Home Edition</option>
                <option value="2">Small Business Edition</option>
                <option value="3" >Enterprise Edition</option>-->

                </select>
                <span id="package">Choose the Package Category</span>
            </div>

             <div>
             	<input id="send" name="send" type="submit" value="Create User" />
             </div>
             
             <div>
             	<?php echo validation_errors('<div class="alert alert-danger">');?>
             </div>
             </form>

</div>
			<hr>
			
			
		
		<div class="clearfix"></div>
        <!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
				
	</div>

	
</body>
</html>
