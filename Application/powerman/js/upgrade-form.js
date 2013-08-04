$(document).ready(function() {
//	alert("a");
    var upgrade_form = $("#upgrade_form");
	var description = $("#description");
	var descriptionDetails = $("#descriptionDetails");

	
	description.blur(validateDescriotion);
	description.keyup(validateDescriotion);

	upgrade_form.submit(function(){
			if(validateDescriotion() & Serialnumber()){
			return true;
			}else{
				return false;
			}
		});
	

	function validateDescriotion(){
		if(description.val().length<10){
			description.addClass("error");
			descriptionDetails.text("Your description is too short. Make it 10 characters or more.");
			descriptionDetails.addClass("error");
			return false;
		}else{
			description.removeClass("error");
			descriptionDetails.text("Reason for changing package");
			descriptionDetails.removeClass("error");
			return true;
			
		}
	}
	

		function validateSerialnumber(){
		
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
	
	
	
	// $('#send').attr("disabled", true);
	
	var $input = $('input:text'),
    $send = $('#upgrade');    
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