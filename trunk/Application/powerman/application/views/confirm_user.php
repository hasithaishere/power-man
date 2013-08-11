<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Domore Technologies | Power Man</title>
	<meta name="description" content="Perfectum Dashboard Bootstrap Admin Template.">
	<meta name="author" content="Powerman Team">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
	
	<!--[if lt IE 7 ]>
	<link id="ie-style" href="<?php echo base_url(); ?>css/style-ie.css" rel="stylesheet">
	<![endif]-->
	<!--[if IE 8 ]>
	<link id="ie-style" href="<?php echo base_url(); ?>css/style-ie.css" rel="stylesheet">
	<![endif]-->
	<!--[if IE 9 ]>
	<![endif]-->
	
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(<?php echo base_url(); ?>img/bg.jpg) !important; background-repeat:repeat; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
                <center>  <div id="company-logo"><img src="<?php echo base_url();?>img/login-bg.png" /></div> </center>
					<div class="icons">
						<a href="index.html"><i class="icon-home"></i></a>
						<a href="#"><i class="icon-cog"></i></a>
					</div>
					<h1>User Confirmation</h1>
					
						
							
							<div class="input-prepend" title="Username">
								<img class="img-responsive" src="<?php echo base_url();?>img/confirmprocess.png"/>
							</div>
							<div class="clearfix"></div>
							<p>You have to complete this user validation. If you will complete these three steps sucessfully, Our Domore PowerMan system automatically activate you as a valid customer. Please follow the given instruction carefully. Press Start Over button to begin. </p>
							<div class="clearfix"></div>
							
							
							<hr>
							<div class="button-login2">	
								<a href="<?php echo $link1;?>" role="button" class="btn btn-primary" data-toggle="modal" id="model_userconfirm_mainbtn">Start Over</a>
							</div>
							<div class="clearfix"></div>
							
							
							
					
						
				</div><!--/span-->
			</div><!--/row-->
			
				</div><!--/fluid-row-->
				
	</div><!--/.fluid-container-->
	
	<!-- Modals Start -->
		<div id="Changepassword" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Change Password</h3>
		</div>
		<div class="modal-body">
			 <div>
             	<label for="pass1">Password</label>
				 <input id="model_pass1" name="model_pass1" type="password" />
                <span id="pass1Details">8 characters or more please</span>
             </div>
             <div>
             	<label for="pass2">Confirm Password</label>
				 <input id="model_pass2" name="model_pass2" type="password" />
                <span id="pass2Details">Same as above</span>
             </div>
			 <div>
				<button class="btn" aria-hidden="true" id="btn_changepass">Change Password</button>
			 </div>
			 </div>
			 <div class="alert alert-error" id="pass_error_holder">
		    	
		     </div>
		
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a href="<?php echo $link2;?>" role="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="model_changepassword">Next &raquo;</a>
		</div>
		</div>
	<!-- Modals End -->
	<!-- Modals Start -->
		<div id="Confirmemail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Activate Your Email Account</h3>
		</div>
		<div class="modal-body">
		<p>Please enter the email activation code which has been given by the Powerman administrator. If you haven't recieved activation email yet please check the email spam box in your account or Contact Powercare adminstrator.</p>
		
		<div>
             	<label for="pass1">Activation Code</label>
				 <input id="model_emailcode" name="model_emailcode" type="text" />
                <span id="pass1Details">Enter email activation code here.</span>
        </div>
			<div>
				<button class="btn" aria-hidden="true" id="btn_activeemail">Validate Email</button>
			</div></div>
			<div class="alert alert-error" id="email_error_holder">
		    	
		    </div>
		
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a href="<?php echo $link3;?>" role="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="model_activateemail">Next &raquo;</a>
		</div>
		</div>
	<!-- Modals End -->
	<!-- Modals Start -->
		<div id="Confirmtelno" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Activate your mobile phone number</h3>
		</div>
		<div class="modal-body">
		<p>Please enter you phone number and click send,after few second you will recieved activation code. If you didn't received the code please try it again. After recieved a code enter and check it. For more details contact Powercare administrator.</p>
		<div>
             	<label for="pass1">Telephone Number</label>
				 <input id="model_telon" name="model_telon" type="text" />
                <span id="pass1Details">Enter your phone Number ex- +9471XXXXXXX</span>
        </div>
		<div>
		<button class="btn" aria-hidden="true" id="btn_sendactivecode">Send</button>
		</div>
		<p><div class="alert alert-error" id="telno_error_holder2">

		    </div></p>
		<div>
             	<label for="pass1">Activation Code</label>
				 <input id="model_telcode" name="model_telcode" type="text" />
                <span id="pass1Details">Enter activation code here.</span>
        </div>
			<div>
				<button class="btn" aria-hidden="true" id="btn_activetelno">Validate Phone No</button></div>
			<p><div class="alert alert-error" id="telno_error_holder">
		    	
		    </div></p>
		
			</div>
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a href="#" role="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="model_activatetelno">Next &raquo;</a>
		</div>
		</div>
	<!-- Modals End -->
	
	<!-- start: JavaScript-->

		<script src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
	
	<script src="<?php echo base_url(); ?>js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.ui.touch-punch.js"></script>
	
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>
	
		<script src='<?php echo base_url(); ?>js/fullcalendar.min.js'></script>
	
		<script src='<?php echo base_url(); ?>js/jquery.dataTables.min.js'></script>

		<script src="<?php echo base_url(); ?>js/excanvas.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.resize.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.chosen.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.uniform.min.js"></script>
		
		<script src="<?php echo base_url(); ?>js/jquery.cleditor.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.noty.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.elfinder.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.raty.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.iphone.toggle.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.imagesloaded.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.masonry.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.knob.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.sparkline.min.js"></script>

		<script src="<?php echo base_url(); ?>js/custom.js"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){

				var act_changepassword = 0;
				var act_emailvalid = 0;
				var act_phonevalid = 0;
				var send_phonecode = 0;
				var act_go_over = 0;
			
				$('#pass_error_holder').hide();
				$('#email_error_holder').hide();
				$('#telno_error_holder').hide();
				$('#telno_error_holder2').hide();
				
				$('#btn_activetelno').attr("disabled", "disabled");
				
				///////////////START OF CHANGE PASSWORD AJAX/////////////////////////
				
				$('#btn_changepass').click(function(){
					if($('#model_pass1').val() == '' || $('#model_pass2').val() == '')
					{
						$('#pass_error_holder').show();
						$('#pass_error_holder').empty();
						$('#pass_error_holder').append('<p>Password fields are empty.</p>');
						return false;
					}
					else
					{
						if($('#model_pass1').val() != $('#model_pass2').val())
						{
							$('#pass_error_holder').show();
							$('#pass_error_holder').empty();
							$('#pass_error_holder').append('<p>Password not match, please check the password again.</p>');
							return false;
						}
						else
						{
							$('#pass_error_holder').empty();
							$('#pass_error_holder').hide();
							
							var form_data = {
								password: $("#model_pass1").val(),
								change_pass: '1'
							};
							
							 $.ajax({
				                type: "POST",
				                url: "<?php echo site_url('confirm_user/change_password'); ?>",
								dataType: 'json',
								async: false,
				                data: form_data,
				                success: function(msg){
									//alert(msg.t2);
									
									//$.each(msg, function(index,value){
							            //process your data by index, in example
							        //    alert(value.t1);
							        //});
									if(msg.r1 == true)
									{
										$('#model_pass1').val('');
										$('#model_pass2').val('');
										$('#pass_error_holder').removeClass( "alert alert-error" ).addClass( "alert alert-success" );
										$('#pass_error_holder').show();
										$('#pass_error_holder').empty();
										$('#pass_error_holder').append('<p>Password successfully updated.</p>');
										act_changepassword = 1;
										
										check_confirm_user();
										
									}
									else
									{
										alert('not ok');
									}
									
									//$('#btn_changepass').prop("disabled", true);
								}
				            });
											
						}	
					}
					
				});
				
				///////////////END OF CHANGE PASSWORD AJAX/////////////////////////
				
				//////////////START OF VALIDATE EMAIL AJAX///////////////////////
				
				$('#btn_activeemail').click(function(){
					
						if($('#model_emailcode').val() == '')
						{
							$('#email_error_holder').show();
							$('#email_error_holder').empty();
							$('#email_error_holder').append('<p>Email code filed is empty.</p>');
							return false;
						}
						else
						{
							$('#email_error_holder').empty();
							$('#email_error_holder').hide();
							
							var form_data = {
								email_code: $("#model_emailcode").val(),
								validate_email: '1'
							};
							
							 $.ajax({
				                type: "POST",
				                url: "<?php echo site_url('confirm_user/validate_email'); ?>",
								dataType: 'json',
								async: false,
				                data: form_data,
				                success: function(msg){
									//alert(msg.t2);
									
									//$.each(msg, function(index,value){
							            //process your data by index, in example
							        //    alert(value.t1);
							        //});
									if(msg.r1 == true)
									{
										$('#model_emailcode').val('');
										$('#email_error_holder').removeClass( "alert alert-error" ).addClass( "alert alert-success" );
										$('#email_error_holder').show();
										$('#email_error_holder').empty();
										$('#email_error_holder').append('<p>Your email succesfully validated.</p>');
										act_emailvalid = 1;
										
										check_confirm_user();
										
									}
									else
									{
										$('#model_emailcode').val('');
										$('#email_error_holder').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
										$('#email_error_holder').show();
										$('#email_error_holder').empty();
										$('#email_error_holder').append('<p>Email activation code is wrong please check the code and reenter.</p>');
										act_emailvalid = 0;
									}
									
									//$('#btn_changepass').prop("disabled", true);
								}
				            });
											
						}	
					
					
				});
				//////////////END OF VALIDATE EMAIL AJAX///////////////////////
				
				//////////////START OF SEND SMS VALIDATION CODE PHONE AJAX///////////////////////
				
				$('#btn_sendactivecode').click(function(){
					
						if($('#model_telon').val() == '')
						{
							$('#telno_error_holder2').show();
							$('#telno_error_holder2').empty();
							$('#telno_error_holder2').append('<p>Phone number filed is empty.</p>');
							return false;
						}
						else
						{
							var reg_exp =  /^[0-9-+]+$/;
							
							if(reg_exp.test($('#model_telon').val()) && $("#model_telon").val().length == 12)
							{
								$('#telno_error_holder2').empty();
								$('#telno_error_holder2').hide();
								
								var form_data = {
									phoneno: $("#model_telon").val().replace("+","")
								};
								
								 $.ajax({
					                type: "POST",
					                url: "<?php echo site_url('confirm_user/send_sms_code'); ?>",
									dataType: 'json',
									async: false,
					                data: form_data,
					                success: function(msg){
										//alert(msg.t2);
										
										//$.each(msg, function(index,value){
								            //process your data by index, in example
								        //    alert(value.t1);
								        //});
										if(msg.r1 == true)
										{
											$('#model_telon').val('');
											$('#telno_error_holder2').removeClass( "alert alert-error" ).addClass( "alert alert-success" );
											$('#telno_error_holder2').show();
											$('#telno_error_holder2').empty();
											$('#telno_error_holder2').append('<p>Activation code succesfully send to your phone.</p>');
											$('#btn_activetelno').removeAttr("disabled");
											send_phonecode = 1;
										}
										else
										{
											$('#model_telon').val('');
											$('#telno_error_holder2').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
											$('#telno_error_holder2').show();
											$('#telno_error_holder2').empty();
											$('#telno_error_holder2').append('<p>Sending activation code is failed.</p>');
											$('#btn_activetelno').attr("disabled", "disabled");
											send_phonecode = 0;
										}
										
										if(msg.r2 == false)
										{
											$('#model_telon').val('');
											$('#telno_error_holder2').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
											$('#telno_error_holder2').show();
											$('#telno_error_holder2').empty();
											$('#telno_error_holder2').append('<p>Phone number is invalid. Please check the number and resend.</p>');
											$('#btn_activetelno').attr("disabled", "disabled");
											send_phonecode = 0;
										}
										
									}
					            });
							}
							else
							{
								$('#model_telon').val('');
								$('#telno_error_holder2').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
								$('#telno_error_holder2').show();
								$('#telno_error_holder2').empty();
								$('#telno_error_holder2').append('<p>Phone number is not valied.</p>');
								$('#btn_activetelno').attr("disabled", "disabled");
								return false;
								send_phonecode = 0;
							}
											
						}	
					
					
				});
				//////////////END OF SEND SMS VALIDATION CODE AJAX///////////////////////
				
				//////////////START OF VALIDATE PHONE AJAX///////////////////////
				
				$('#btn_activetelno').click(function(){
					
						if($('#model_telcode').val() == '')
						{
							$('#telno_error_holder').show();
							$('#telno_error_holder').empty();
							$('#telno_error_holder').append('<p>Email code filed is empty.</p>');
							return false;
						}
						else
						{
							$('#telno_error_holder').empty();
							$('#telno_error_holder').hide();
							
							var form_data = {
								phone_code: $("#model_telcode").val(),
								validate_phone: '1'
							};
							
							 $.ajax({
				                type: "POST",
				                url: "<?php echo site_url('confirm_user/validate_phone'); ?>",
								dataType: 'json',
								async: false,
				                data: form_data,
				                success: function(msg){
									//alert(msg.t2);
									
									//$.each(msg, function(index,value){
							            //process your data by index, in example
							        //    alert(value.t1);
							        //});
									if(msg.r1 == true)
									{
										$('#model_telcode').val('');
										$('#telno_error_holder').removeClass( "alert alert-error" ).addClass( "alert alert-success" );
										$('#telno_error_holder').show();
										$('#telno_error_holder').empty();
										$('#telno_error_holder').append('<p>Your phone succesfully activated.</p>');
										act_phonevalid = 1;
										
										check_confirm_user();
										
									}
									else
									{
										$('#model_telcode').val('');
										$('#telno_error_holder').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
										$('#telno_error_holder').show();
										$('#telno_error_holder').empty();
										$('#telno_error_holder').append('<p>Your activation code is wrong please check the code and reenter.</p>');
										act_phonevalid = 0;
									}
									
									//$('#btn_changepass').prop("disabled", true);
								}
				            });
											
						}	
					
					
				});
				
				//////////////END OF VALIDATE PHONE AJAX///////////////////////
			
				
				$('#model_changepassword').click(function(e) {

					if(act_changepassword == 0)
					{
						$('#pass_error_holder').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
						$('#pass_error_holder').show();
						$('#pass_error_holder').empty();
						$('#pass_error_holder').append('<p>First you have to change the current tempory password.</p>');
						return false;
					}
					
				   				   
				});
				
				$('#model_activateemail').click(function(e) {

					if(act_emailvalid == 0)
					{
						$('#email_error_holder').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
						$('#email_error_holder').show();
						$('#email_error_holder').empty();
						$('#email_error_holder').append('<p>First you have to validate your email using given email activation code.</p>');
						return false;
					}
					
				   				   
				});
				
				$('#model_activatetelno').click(function(e) {

					if(send_phonecode == 0)
					{
						$('#telno_error_holder').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
						$('#telno_error_holder').show();
						$('#telno_error_holder').empty();
						$('#telno_error_holder').append('<p>First you have to enter phone number and send activation code to your phone.</p>');
						return false;					
						
					}	
					
					if(act_phonevalid == 0)
					{
						$('#telno_error_holder').removeClass( "alert alert-success" ).addClass( "alert alert-error" );
						$('#telno_error_holder').show();
						$('#telno_error_holder').empty();
						$('#telno_error_holder').append('<p>You have to activate your phone, using recieved activation code through SMS.</p>');
						return false;
					}				
							   
				});
				
				$('#model_userconfirm_mainbtn').click(function(e) {

					if(act_go_over == 1)
					{
						return false;
					}		
							   
				});
				
				
			});
			
			function check_confirm_user()
			{
				$.ajax({
				type: "POST",
				url: "<?php echo site_url('confirm_user/checked_confirm_user'); ?>",
				dataType: 'json',
				async: false,
				success: function(msg){
					
					if(msg.r1 == true)
					{
						$('#model_userconfirm_mainbtn').attr("href", "<?php echo base_url()."/signout"; ?>");
						$('#model_userconfirm_mainbtn').removeClass( "btn btn-prima" ).addClass( "btn btn-success" );
						$('#model_userconfirm_mainbtn').text('Go Over');
						act_go_over = 1;
					}
					else
					{
						act_go_over = 0;
					}									
				}
				});	                
			}
		
		</script>
		<!-- end: JavaScript-->
	
</body>
</html>
