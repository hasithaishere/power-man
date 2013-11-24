<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Domore Technologies | Power Man</title>
	<meta name="description" content="Domore Technologies.">
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
			body { background: url(<?php echo base_url(); ?>img/bg.jpg) !important;
			background-repeat:repeat;
			
			 }
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
                    <!--<p><div class="alert alert-success">You are Successfully reset the process </div></p>-->
		
					<h2 style="width: 80%; text-align: justify;color: #B1B1B1;font-size: 13px;font-style: italic;">You are on board to recover your password, please type your new password.</h2>
                    
					<form class="form-horizontal" action="<?php echo base_url()."change_password/change/".$token."/".$user_id;?>" method="post">
						<fieldset>
							
							<div class="input-prepend" title="new_password">
								<span class="add-on"><i class="icon-lock"></i></span>
								<input class="input-large span10" name="new_password" id="new_password" type="password" placeholder="New Passowrd"/>
							</div>
                            <div class="input-prepend" title="confirm_new_Password">
								<span class="add-on"><i class="icon-ok"></i></span>
								<input class="input-large span10" name="confirm_new_Password" id="confirm_new_Password" type="password" placeholder="Confirm New Password"/>
							</div>
							<div class="clearfix"></div>
                            
<!--
							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="icon-lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="Type Password"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label> -->

							<div class="button-login">	
								<button type="submit" class="btn btn-success" id="btn_changepassword"><i class="icon-off icon-white"></i> Change Password</button>
							</div>
							<div class="clearfix"></div>
							<div id="error_holder">
								
							</div>
					</form>
				<!--	<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>-->	
				</div>
			</div>
			
				</div><!--/fluid-row-->
				
	</div><!--/.fluid-container-->

	<!-- start: JavaScript-->

		<script src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("#btn_changepassword").attr('disabled','disabled');
				$("#confirm_new_Password").attr('disabled','disabled');
				$("#new_password").keyup(function(){
					if($("#new_password").val().length<8)
					{
						$("#error_holder").html("<h2 style=\"width: 80%; text-align: justify;color: #B94A48;font-size: 13px;font-style: italic;\">Password is too short, minimun 8 characters</h2>");
						$("#btn_changepassword").attr('disabled','disabled');
						$("#confirm_new_Password").attr('disabled','disabled');
					}
					else
					{
						$("#error_holder").empty();
						//$("#btn_changepassword").removeAttr('disabled');
						$("#confirm_new_Password").removeAttr('disabled');
					}
				});
				
				$("#confirm_new_Password").keyup(function(){
					if($("#new_password").val()!=$("#confirm_new_Password").val())
					{
						$("#error_holder").html("<h2 style=\"width: 80%; text-align: justify;color: #B94A48;font-size: 13px;font-style: italic;\">Password not match.</h2>");
						$("#btn_changepassword").attr('disabled','disabled');
						//$("#confirm_new_Password").attr('disabled','disabled');
					}
					else
					{
						$("#error_holder").empty();
						$("#btn_changepassword").removeAttr('disabled');
						//$("#confirm_new_Password").removeAttr('disabled');
					}
				});
				
			});
		</script>
		
		
		
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
		<!-- end: JavaScript-->
	
</body>
</html>
