$(document).ready(function() {
//	alert("a");
    var upgrade_form = $("#upgrade_form");
	var s_number = $("#s_number");
	var s_number_Details = $("#s_number_Details");
	var description = $("#description");
	var descriptionDetails = $("#descriptionDetails");
	//var pack1 = $("#pack1");
	//var CPackage_Details = $("#CPackage_Details");
	//var pack2 = $("#pack2");
	//var NPackage_Details = $("#NPackage_Details");
	var message = $("#message");
	
	s_number.blur(validateSerialnumber);
	description.blur(validateDescription);
	//pack1.blur(validatepackage1);
	//pack2.blur(validatepackage2);
	
	s_number.keyup(validateSerialnumber);
	description.keyup(validateDescription);
	//pack1.keyup(validatepackage1);
	//pack2.keyup(validatepackage2);

	
	upgrade_form.submit(function(){
			if(validateSerialnumber() & validateDescription() & validatemessage())
			{
				return true;
			}
			else
			{
				return false;
			}
		
	});
	


	function validateSerialnumber(){
		
		$(function(){
			$('#s_number').keydown(function(e) {
				if (e.shiftKey || e.ctrlKey || e.altKey) 
				{
					e.preventDefault();
					s_number.addClass("error");
					s_number_Details.text("Enter only numbers");
					s_number_Details.addClass("error");
					return false;
				} 
				else 
				{
					var key = e.keyCode;
					if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 		
					{
					//alert ("Enter only numbers");	
					s_number.addClass("error");
					s_number_Details.text("Enter only numbers");
					s_number_Details.addClass("error");
					return false;
					e.preventDefault();
					
					}
					else{
					s_number.removeClass("error");
					s_number_Details.text("Enter serial number of your current package");
					s_number_Details.removeClass("error");
					return true;
					}
				
				}
				
				})
			
			})
		
				
	}

	//$('#upgrade').attr("disabled", true);
	

function validateDescription(){
		if(description.val().length<25)
		{
			description.addClass("error");
			descriptionDetails.text("Your description is too short. Make it 25 characters or more.");
			descriptionDetails.addClass("error");
			return false;
			
		}
		else
		{
			description.removeClass("error");
			descriptionDetails.text("Reason for changing package");
			descriptionDetails.removeClass("error");
			return true;
			
		}
	}
	
	/*function validatepackage1(){
		if(pack1.val() !== pack2.val()){
			pack1.addClass("error");
			CPackage_Details.text("Passwords do not match!");
			CPackage_Details.addClass("error");
			return false;	
		}else{
			pack1.removeClass("error");
			CPackage_Details.text("Passwords matched!");
			CPackage_Details.removeClass("error");
			return true;	
		}
		
	}*/
	
	var $input = $('input:text'),
    $upgrade = $('#upgrade');    
	$upgrade.attr('disabled', true);

	$input.keyup(function(){
    var trigger = false;
    $input.each(function() {
        if (!$(this).val()) 
		{
            trigger = true;
        }
	});
    trigger ? $upgrade.attr('disabled', true) : $upgrade.removeAttr('disabled');
});					   
});
