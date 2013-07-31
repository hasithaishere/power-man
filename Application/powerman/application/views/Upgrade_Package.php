<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<title>Domore Technologies | Power Man</title>
	<meta name="description" content="Domore Technologies | Power Man.">
	<meta name="author" content="Powerman Team">
	
	
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
	
		
		
		
</head>

<body>
		<div id="overlay">
		<ul>
		  <li class="li1"></li>
		  <li class="li2"></li>
		  <li class="li3"></li>
		  <li class="li4"></li>
		  <li class="li5"></li>
		  <li class="li6"></li>
		</ul>
	</div>	
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <img alt="Dashboard" src="<?php echo base_url();?>img/new.png" /> <span class="hidden-phone">Power Man</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-warning-sign icon-white"></i> <span class="label label-important hidden-phone">2</span> <span class="label label-success hidden-phone">11</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li>
									<span class="dropdown-menu-title">You have 11 notifications</span>
								</li>	
                            	<li>
                                    <a href="#">
										+ <i class="icon-user"></i> <span class="message">New user registration</span> <span class="time">1 min</span> 
                                    </a>
                                </li>
								
                                <li>
                            		<a class="dropdown-menu-sub-footer">View all notifications</a>
								</li>	
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-tasks icon-white"></i> <span class="label label-warning hidden-phone">17</span>
							</a>
							<ul class="dropdown-menu tasks">
								<li>
									<span class="dropdown-menu-title">You have 17 tasks in progress</span>
                            	</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">Server Status -OK </span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim progressYellow">80</div> 
                                    </a>
                                </li>
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope icon-white"></i> <span class="label label-success hidden-phone">9</span>
							</a>
							<ul class="dropdown-menu messages">
								<li>
									<span class="dropdown-menu-title">You have 9 messages</span>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="<?php echo base_url();?>img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Powerman Admin
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            This is test message for display message to admin.
                                        </span>  
                                    </a>
                                </li>
                                
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						<li>
							<a class="btn" href="#">
								<i class="icon-wrench icon-white"></i>
							</a>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-user icon-white"></i>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> Profile</a></li>
								<li><a href="<?php echo base_url(); ?>login"><i class="icon-off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div class="span2 main-menu-span">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo base_url();?>main_panel"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="#"><i class="icon-eye-open icon-white"></i><span class="hidden-tablet"> Monitor</span></a></li>
						<li><a href="#"><i class="icon-edit icon-white"></i><span class="hidden-tablet"> Control</span></a></li>
						<li><a href="#"><i class="icon-list-alt icon-white"></i><span class="hidden-tablet"> Add</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-star icon-white"></i><span class="hidden-tablet"> Settings</span></a>
							<ul>
								<li><a class="submenu" href="<?php echo base_url();?>Upgrade_Package"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
								<li><a class="submenu" href="#"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
								<li><a class="submenu" href="#"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
							</ul>	
						</li>
						<li><a href="#"><i class="icon-font icon-white"></i><span class="hidden-tablet"> Reports</span></a></li>
						<li><a href="#"><i class="icon-picture icon-white"></i><span class="hidden-tablet"> Accessories</span></a></li>
						<li><a href="#"><i class="icon-align-justify icon-white"></i><span class="hidden-tablet"> Online User</span></a></li>
						<li><a href="#"><i class="icon-calendar icon-white"></i><span class="hidden-tablet"> Suggestions</span></a></li>
						<li><a href="#"><i class="icon-th icon-white"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a href="#"><i class="icon-folder-open icon-white"></i><span class="hidden-tablet"> File Manager</span></a></li>
						
						<li><a href="<?php echo base_url();?>create_user"><i class="icon-lock icon-white"></i><span class="hidden-tablet"> Create a User</span></a></li>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- end: Main Menu -->
			
			
			
			<div id="content" class="span10">
			<!-- start: Content -->
			
			<div>
				<hr>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				
			</div>
			  <hr>
                        <div class="sortable row-fluid">

				<a class="quick-button span2">
					<i class="fa-icon-group"></i>
					<p>Users</p>
					<span class="notification">1.367</span>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-comments-alt"></i>
					<p>Comments</p>
					<span class="notification green">167</span>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-shopping-cart"></i>
					<p>Orders</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-barcode"></i>
					<p>Products</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-envelope"></i>
					<p>Messages</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-calendar"></i>
					<p>Calendar</p>
					<span class="notification red">68</span>
				</a>

			</div>
                        <hr>
			
                     
			<div class="row-fluid">

        <h1>Upgrade Package</h1></br>
<form id="form1" name="form1" method="post" action="">

  <div>
  	<label><h4>Current Package</h4></label>
  	<select name="select" id="select">
  	  <option>Home Edition</option>
  	  <option>Small Business Edition</option>
  	  <option>Enterprise Edition</option>
    </select>  	
  	<span id="CPackage_Details">What's your current package name?</span>  	
  </div></br>
    
   <div>
  	<label><h4>Serial No</h4></label>
  	<input type="text" name="ser_no" id="ser_no" />  	
  	<span id="CPackage_Details">What's your current packages' serial number?</span>  	
  </div></br>
  
  <div> 
    <label><h4>Description</h4></label>
    <textarea name="Description" id="Description2" cols="45" rows="5" tabindex="1"></textarea>
    <span id="Description">Reason for changing package</span>  	</label>
    
  </div></br>
  
  <div>
  	<label><h4>New Package</h4></label>
  	<select name="New_package" id="New_package" tabindex="1">
  	  <option>Home Edition</option>
  	  <option>Small Business Edition</option>
  	  <option>Enterprise Edition</option>
    </select>    
  	<span id="NPackage_Details">Request package name?</span>  
  </div></br>
    
  <div>
    <label><h4>Sub Devices</h4></label>
    <select name="Sub_dev" id="Sub_dev2" tabindex="1">
      <option>2</option>
      <option>1</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
    </select>    
    <span id="Sub_dev">How many sub devices you want to add?</span>  
  </div></br>
    
 	<div>
 	  <label>
 	  <input type="submit" name="Upgarde" id="Upgarde" value="Upgrade" tabindex="1" />
 	  </label>
  	</div>
    
</form>
<label></label>
			<hr>
			
			
		
		<div class="clearfix"></div>
		
		<footer>
			<p>
				<span style="text-align:left;float:left">&copy; <a href="#" target="_blank">Power Man</a> 2013</span>
				<span style="text-align:right;float:right">Powered by: <a href="www.domore.lk">Domore Technologies (Pvt) Limited</a></span>
			</p>

		</footer>
				
	</div><!--/.fluid-container-->

	<!-- start: JavaScript-->

		<script src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>

		<script src="<?php echo base_url();?>js/jquery-ui-1.10.0.custom.min.js"></script>
	
		
	
		<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	
		<script src="<?php echo base_url();?>js/upgrade_package.js"></script>
		<script src="<?php echo base_url();?>js/custom.js"></script>
		<script type="text/javascript">
	
	
</body>
</html>
