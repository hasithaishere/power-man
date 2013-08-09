$(document).ready(function() {
//	alert("a");
    var upgrade_form = $("#upgrade_form");
	var s_number = $("#s_number");
	var s_number_Details = $("#s_number_Details");
	var description = $("#description");
	var descriptionDetails = $("#descriptionDetails");
	var message = $("#message");
	
	s_number.blur(validateSerialnumber);
	description.blur(validateDescription);
	
	s_number.keyup(validateSerialnumber);
	description.keyup(validateDescription);
	
	upgrade_form.submit(function(){
			if(validateDescription() & validateSerialnumber() & validatemessage())
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
					
				} 
				else 
				{
					var key = e.keyCode;
					if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 		
					{
					alert ("Enter only numbers");	
					e.preventDefault();
					
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
	
	var $input = $('input:text');
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
