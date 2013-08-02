$(document).ready(function() {
//	alert("a");
    var form = $("#contact_form");
	var fname = $("#fname");
	var nameDetails = $("#nameDetails");
	var lname = $("#lname");
	var lnameDetails = $("#lnameDetails");
	var name = $("#name");
	var addressDetails1 = $("#addressDetails1");
	var address2 = $("#address2");
	var addressDetails2 = $("#addressDetails2");
	var city = $("#city");
	var cityDetails = $("#cityDetails");
	var province = $("#province");
	var provinceDetails = $("#provinceDetails");
	var zipcode = $("#zipcode");
	var zipcodeDetails = $("#zipcodeDetails");
	var email = $("#email");
	var emailDetails = $("#emailDetails");
	var pass1 = $("#pass1");
	var pass2 = $("#pass2");
	var pass1Details = $("#pass1Details");
	var pass2Details = $("#pass2Details");
	var message = $("#message");
	
	fname.blur(validateFname);
	lname.blur(validateLname);
	name.blur(validateName);
	address2.blur(validateAddress);
	city.blur(validateCity);
	province.blur(validateProvince);
	zipcode.blur(validateZipcode);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	
	fname.keyup(validateFname);
	lname.keyup(validateLname);
	name.keyup(validateName);
	address2.keyup(validateAddress);
	city.keyup(validateCity);
	province.keyup(validateProvince);
	zipcode.keyup(validateZipcode);
	email.keyup(validateEmail);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	
	
	form.submit(function(){
			if(validateName() & validateEmail() & validatPass1() & validatPass2() & validateMessage()){
			return true;
			}else{
				return false;
			}
		});
	
	function validateFname(){
		if(fname.val().length<5){
			fname.addClass("error");
			nameDetails.text("Your name isn't that short. Make it 5 characters or more.");
			nameDetails.addClass("error");
			return false;
		}else{
			fname.removeClass("error");
			nameDetails.text("What's your Last name?");
			nameDetails.removeClass("error");
			return true;
			
		}
	}
	
	function validateLname(){
		if(lname.val().length<5){
			lname.addClass("error");
			lnameDetails.text("Your name isn't that short. Make it 5 characters or more.");
			lnameDetails.addClass("error");
			return false;
		}else{
			lname.removeClass("error");
			lnameDetails.text("What's your Last name?");
			lnameDetails.removeClass("error");
			return true;
			
		}
	}
	
	function validateName(){
		if(name.val().length<5){
			name.addClass("error");
			addressDetails1.text("Your address isn't that short.");
			addressDetails1.addClass("error");
			return false;
		}else{
			name.removeClass("error");
			addressDetails1.text("What's your Address?");
			addressDetails1.removeClass("error");
			return true;
			
		}
	}
	
	function validateAddress(){
		if(address2.val().length<5){
			address2.addClass("error");
			addressDetails2.text("Your address isn't that short.");
			addressDetails2.addClass("error");
			return false;
		}else{
			address2.removeClass("error");
			addressDetails2.text("Address line 2 ?");
			addressDetails2.removeClass("error");
			return true;
			
		}
	}
	
	function validateCity(){
		if(city.val().length<5){
			city.addClass("error");
			cityDetails.text("Invalied City. Enter correct one.");
			cityDetails.addClass("error");
			return false;
		}else{
			city.removeClass("error");
			cityDetails.text("What's your city ?");
			cityDetails.removeClass("error");
			return true;
			
		}
	}
	
	function validateProvince(){
		if(province.val().length<5){
			province.addClass("error");
			provinceDetails.text("Invalied province, Enter correct one");
			provinceDetails.addClass("error");
			return false;
		}else{
			province.removeClass("error");
			provinceDetails.text("What's your Province/Region?");
			provinceDetails.removeClass("error");
			return true;
		}
	}
	
		function validateZipcode(){
		
		$(function(){
			$('#zipcode').keydown(function(e) {
				if (e.shiftKey || e.ctrlKey || e.altKey) {
					e.preventDefault();
					
				} else {
					var key = e.keyCode;
					if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 			{
					e.preventDefault();
				}
				}

				})
			})
		
				
				
}
		
		//if (zipcode.val().length<5){
			//zipcode.addClass("error");
			//zipcodeDetails.text("Enter 5 numbers only");
			//zipcodeDetails.addClass("error");
			//return true;
		//else{
			//zipcode.removeClass("error");
			//zipcodeDetails.text("What's the zip code of your province?");
			//zipcodeDetails.removeClass("error");
			//return true;
		//}
	//}
	
	function validateEmail(){
		var a = email.val();
		//var regexp = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z][2,4]$/;
		
		var regexp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
		
		
		if(regexp.test(a)){
			email.removeClass("error");
			emailDetails.text("So I can get back to you");
			emailDetails.removeClass("error");
			return true;	
		}else{
			email.addClass("error");
			emailDetails.text("Enter a valid email address please");
			emailDetails.addClass("error");
			return false;	
		}
			
	}
	
	function validatePass1(){
		if(pass1.val().length<8){
			pass1.addClass("error");
			pass1Details.text("8 characters or more please");
			pass1Details.addClass("error");
			return false;
		}else{
			pass1.removeClass("error");
			pass1Details.text("8 characters or more please");
			pass1Details.removeClass("error");
			return true;	
		}	
	}
		
	function validatePass2(){
		if(pass1.val() !== pass2.val()){
			pass2.addClass("error");
			pass2Details.text("Passwords do not match!");
			pass2Details.addClass("error");
			return false;	
		}else{
			pass2.removeClass("error");
			pass2Details.text("Passwords matched!");
			pass2Details.removeClass("error");
			return true;	
		}
		
	}
	
	// $('#send').attr("disabled", true);
	
	var $input = $('input:text'),
    $send = $('#send');    
	$send.attr('disabled', true);

	$input.keyup(function() {
    var trigger = false;
    $input.each(function() {
        if (!$(this).val()) {
            trigger = true;
        }
    });
    trigger ? $send.attr('disabled', true) : $send.removeAttr('disabled');
});

});