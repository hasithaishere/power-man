// JavaScript Document

 $(document).ready(function() {
 var mainDevice_form = $("#add_mainDevice_form");
	var main_device_title = $("#main_device_title");
	var main_device_id = $("#main_device_id");
	var main_device_serialno = $("#main_device_serialno");
	var main_device_description = $("#main_device_description");
	
	var main_device_titleDetails = $("#main_device_titleDetails");
	var main_device_idDetails = $("#main_device_idDetails");
	var main_device_serialnoDetails = $("#main_device_serialnoDetails");
	var main_device_descriptionDetails = $("#main_device_descriptionDetails");
	
 
 main_device_title.blur(validateMainDeviceTitle);
 main_device_id.blur(validateMainDeviceId);
 main_device_serialno.blur(validateMainDeviceSerialNo);
 main_device_description.blur(validateMainDeviceDescription);
 
 
 main_device_title.keyup(validateMainDeviceTitle);
 main_device_id.keyup(validateMainDeviceId);
 main_device_serialno.keyup(validateMainDeviceSerialNo);
 main_device_description.keyup(validateMainDeviceDescription);
 
 $("input[type=submit]").attr("disabled", "disabled");
	
 /*
mainDevice_form.submit(function(){
			if(validateMainDeviceTitle() && validateMainDeviceId() && validateMainDeviceSerialNo() && validateMainDeviceDescription() ){
				$("input[type=submit]").removeAttr("disabled");
			return true;
			
			}else{
				
				$("input[type=submit]").attr("disabled", "disabled");
				return false;
				
			}
		});
 
	 function validateMainDeviceTitle(){
		if(main_device_title.val().length<3){
			main_device_title.addClass("error");
			main_device_titleDetails.text("Your Main name isn't that short. Make it 5 characters or more.");
			main_device_titleDetails.addClass("error");
			return false;
		}else{
			main_device_title.removeClass("error");
			main_device_titleDetails.text("What's your Main Device name?");
			main_device_titleDetails.removeClass("error");
			return true;
			
		}
	}
	
	 function validatesubLocationname(){
		if(sub_name.val().length<5){
			sub_name.addClass("error");
			sub_nameDetails.text("Your Sub Location name isn't that short. Make it 5 characters or more.");
			sub_nameDetails.addClass("error");
			return false;
		}else{
			sub_name.removeClass("error");
			sub_nameDetails.text("What's your location's sub name?");
			sub_nameDetails.removeClass("error");
			return true;
			
		}
	}
	
	function validateLocationDescription(){
		if(location_description.val().length<25)
		{
			location_description.addClass("error");
			location_descriptionDetails.text("Your description is too short. Make it 25 characters or more.");
			location_descriptionDetails.addClass("error");
			return false;
			
		}
		else
		{
			location_description.removeClass("error");
			location_descriptionDetails.text("Description about the new Location?");
			location_descriptionDetails.removeClass("error");
			return true;
			
		}
	}
	
	*/
	
/*	
	
	var $input = $('input:text'),
    $send = $('#save_location');    
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
	*/
	
	
 });



 
 

