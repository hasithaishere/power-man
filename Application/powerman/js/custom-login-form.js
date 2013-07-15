$(document).ready(function() {
//	alert("a");
    var form = $("#contact_form");
	var name = $("#name");
	var nameDetails = $("#nameDetails");
	var email = $("#email");
	var emailDetails = $("#emailDetails");
	var pass1 = $("#pass1");
	var pass2 = $("#pass2");
	var pass1Details = $("#pass1Details");
	var pass2Details = $("#pass2Details");
	var message = $("#message");
	
	name.blur(validateName);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	
	name.keyup(validateName);
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
	function validateName(){
		if(name.val().length<5){
			name.addClass("error");
			nameDetails.text("Your name isn't that short. Make it 5 characters or more.");
			nameDetails.addClass("error");
			return true;
		}else{
			name.removeClass("error");
			nameDetails.text("What's your name?");
			nameDetails.removeClass("error");
			return true;
			
		}
	}
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
			pass2Details.text("Passwords do not match!");
			pass2Details.removeClass("error");
			return true;	
		}
		
	}
	
});