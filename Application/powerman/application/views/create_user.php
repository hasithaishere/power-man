<!DOCTYPE html>
<html lang="en"><head>
	
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
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-login-form.css" type="text/css"/>


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
				<a class="brand" href="index.html"> <img alt="Dashboard" src="<?php echo base_url(); ?>img/new.png" /> <span class="hidden-phone">Power Man</span></a>
								
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
											<span class="title">Application Development</span>
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
										<span class="avatar"><img src="<?php echo base_url(); ?>img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Domore Admin
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            This is a test message for confirm functionality of message display.
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
						<li><a href="<?php echo base_url(); ?>main_panel"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="#"><i class="icon-eye-open icon-white"></i><span class="hidden-tablet"> Monitor</span></a></li>
						<li><a href="#"><i class="icon-edit icon-white"></i><span class="hidden-tablet"> Control</span></a></li>
						<li><a href="#"><i class="icon-list-alt icon-white"></i><span class="hidden-tablet"> Add</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-star icon-white"></i><span class="hidden-tablet"> Settings</span></a>
							<ul>
								<li><a class="submenu" href="#"><i class="fa-icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
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
						
						<li><a href="<?php echo base_url(); ?>create_user"><i class="icon-lock icon-white"></i><span class="hidden-tablet">Create a User</span></a></li>
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
						<a href="#">Create a User</a>
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
			
                     
<div id="container">
	<h1>Create a User</h1>
    	<form action="" method="post" id="contact_form">
        	<div>
            	<label for="fname">First Name </label>
                <input id="fname" name="name" type="text" />
                <span id="nameDetails">What's your first name?</span>
             </div>
             
             <div>
            	<label for="lname">Last Name </label>
                <input id="lname" name="lname" type="text" />
                <span id="lnameDetails">What's your last name?</span>
             </div>
             
              <div>
            	<label for="address1">Address Line 1 </label>
                <input id="name" name="name" type="text" />
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
         <label for="country">Country </label> 
             <select id="countries" name="countries">
<option value="AF">Afghanistan</option>
<option value="AX">Åland Islands</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antarctica</option>
<option value="AG">Antigua and Barbuda</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaijan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrain</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BZ">Belize</option>
<option value="BJ">Benin</option>
<option value="BM">Bermuda</option>
<option value="BT">Bhutan</option>
<option value="BO">Bolivia</option>
<option value="BA">Bosnia and Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazil</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="BN">Brunei Darussalam</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodia</option>
<option value="CM">Cameroon</option>
<option value="CA">Canada</option>
<option value="CV">Cape Verde</option>
<option value="KY">Cayman Islands</option>
<option value="CF">Central African Republic</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CX">Christmas Island</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombia</option>
<option value="KM">Comoros</option>
<option value="CG">Congo</option>
<option value="CD">Congo, The Democratic Republic of The</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Cote D'ivoire</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK">Denmark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="DO">Dominican Republic</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="SV">El Salvador</option>
<option value="GQ">Equatorial Guinea</option>
<option value="ER">Eritrea</option>
<option value="EE">Estonia</option>
<option value="ET">Ethiopia</option>
<option value="FK">Falkland Islands (Malvinas)</option>
<option value="FO">Faroe Islands</option>
<option value="FJ">Fiji</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GF">French Guiana</option>
<option value="PF">French Polynesia</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabon</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Greece</option>
<option value="GL">Greenland</option>
<option value="GD">Grenada</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GG">Guernsey</option>
<option value="GN">Guinea</option>
<option value="GW">Guinea-bissau</option>
<option value="GY">Guyana</option>
<option value="HT">Haiti</option>
<option value="HM">Heard Island and Mcdonald Islands</option>
<option value="VA">Holy See (Vatican City State)</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran, Islamic Republic of</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IM">Isle of Man</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JE">Jersey</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KP">Korea, Democratic People's Republic of</option>
<option value="KR">Korea, Republic of</option>
<option value="KW">Kuwait</option>
<option value="KG">Kyrgyzstan</option>
<option value="LA">Lao People's Democratic Republic</option>
<option value="LV">Latvia</option>
<option value="LB">Lebanon</option>
<option value="LS">Lesotho</option>
<option value="LR">Liberia</option>
<option value="LY">Libyan Arab Jamahiriya</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao</option>
<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
<option value="MG">Madagascar</option>
<option value="MW">Malawi</option>
<option value="MY">Malaysia</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malta</option>
<option value="MH">Marshall Islands</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritania</option>
<option value="MU">Mauritius</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexico</option>
<option value="FM">Micronesia, Federated States of</option>
<option value="MD">Moldova, Republic of</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="ME">Montenegro</option>
<option value="MS">Montserrat</option>
<option value="MA">Morocco</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NL">Netherlands</option>
<option value="AN">Netherlands Antilles</option>
<option value="NC">New Caledonia</option>
<option value="NZ">New Zealand</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk Island</option>
<option value="MP">Northern Mariana Islands</option>
<option value="NO">Norway</option>
<option value="OM">Oman</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestinian Territory, Occupied</option>
<option value="PA">Panama</option>
<option value="PG">Papua New Guinea</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PN">Pitcairn</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="RE">Reunion</option>
<option value="RO">Romania</option>
<option value="RU">Russian Federation</option>
<option value="RW">Rwanda</option>
<option value="SH">Saint Helena</option>
<option value="KN">Saint Kitts and Nevis</option>
<option value="LC">Saint Lucia</option>
<option value="PM">Saint Pierre and Miquelon</option>
<option value="VC">Saint Vincent and The Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome and Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="RS">Serbia</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia and The South Sandwich Islands</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard and Jan Mayen</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syrian Arab Republic</option>
<option value="TW">Taiwan, Province of China</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania, United Republic of</option>
<option value="TH">Thailand</option>
<option value="TL">Timor-leste</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad and Tobago</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="TM">Turkmenistan</option>
<option value="TC">Turks and Caicos Islands</option>
<option value="TV">Tuvalu</option>
<option value="UG">Uganda</option>
<option value="UA">Ukraine</option>
<option value="AE">United Arab Emirates</option>
<option value="GB">United Kingdom</option>
<option value="US">United States</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistan</option>
<option value="VU">Vanuatu</option>
<option value="VE">Venezuela</option>
<option value="VN">Viet Nam</option>
<option value="VG">Virgin Islands, British</option>
<option value="VI">Virgin Islands, U.S.</option>
<option value="WF">Wallis and Futuna</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option>
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
                    <option value="empty" selected></option>
                <option value="home">Home Edition</option>
                <option value="business">Small Business Edition</option>
                <option value="company" >Company Edition</option>

                </select>
                <span id="package">Choose the Package Category</span>
            </div>

             <div>
             	<input id="send" name="send" type="submit" value="Create User" />
             </div>
             </form>

</div>
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

		<script src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>

		<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.0.custom.min.js"></script>
	
		
	
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	
	
		<script src="<?php echo base_url(); ?>js/custom.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/custom-login-form.js"></script>
		<script type="text/javascript">
	
	
</body>
</html>
