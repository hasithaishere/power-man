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
			body { background: url(<?php echo base_url(); ?>img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="icon-home"></i></a>
						<a href="#"><i class="icon-cog"></i></a>
					</div>
					<h1>User Confirmation</h1>
					
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<img class="img-rounded" data-src="holder.js/140x140" alt="140x140" style="width: 400px; height: 140px;" src="<?php echo base_url();?>img/confirmprocess.png">
							</div>
							<div class="clearfix"></div>
							<p>You have to complete this user validation. If you will complete these three steps sucessfully, Our Domore PowerMan system automatically activate you as a valid customer. Please follow the given instruction carefully. Press Start Over button to begin. </p>
							<div class="clearfix"></div>
							
							
							<hr>
							<div class="button-login2">																<a href="#Changepassword" role="button" class="btn btn-primary" data-toggle="modal">Start Over</a>
							</div>
							<div class="clearfix"></div>
							
							
							</fieldset>
					
						
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
			 <div class="alert alert-error" id="pass_error_holder">
		    	
		     </div>
		</div>
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a href="#Confirmemail" role="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="model_changepassword">Change Password &raquo;</a>
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
			<div class="alert alert-error" id="email_error_holder">
		    	
		     </div>
		</div>
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a href="#Confirmtelno" role="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="model_activateemail">Validate Email &raquo;</a>
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
		<button class="btn" aria-hidden="true">Send</button>
		</div>
		<p></p>
		<div>
             	<label for="pass1">Activation Code</label>
				 <input id="model_telcode" name="model_telcode" type="text" />
                <span id="pass1Details">Enter activation code here.</span>
        </div>
		<div>
		<button class="btn" aria-hidden="true">Check</button>
		</div>
			<div class="alert alert-error" id="telno_error_holder">
		    	
		    </div>
		</div>
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a href="#" role="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="model_activatetelno">Validate Phone Number &raquo;</a>
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
				$('#pass_error_holder').hide();
				$('#email_error_holder').hide();
				$('#telno_error_holder').hide();
				
				$('#model_changepassword').click(function(){
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
								password: $("#model_pass1").val()
							};
							
							 $.ajax({
				                type: "POST",
				                url: "<?php echo site_url('confirm_user/change_password'); ?>",
				                data: form_data,
				                success: function(msg){
									$('#model_pass1').val() = '';
									$('#model_pass2').val() = '';
								}
				            });
											
						}	
					}
					
				});
				
			});
		
		</script>
		<!-- end: JavaScript-->
	
</body>
</html>
