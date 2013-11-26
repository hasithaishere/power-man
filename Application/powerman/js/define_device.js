$(document).ready(function() {
//	alert("a");
    var form = $("#define_device_form");
	
	var device_name = $("#device_name");
	var device_nameDetails = $("#device_nameDetails");
	
	var description = $("#device_description");
	var descriptionDetails = $("#device_descriptionDetails");
	
	var device_max_Wattage = $("#device_max_Wattage");
	var device_max_WattageDetails = $("#device_max_WattageDetails");
	
	var device_max_time = $("#device_max_time");
	var device_max_timeDetails = $("#device_max_timeDetails");
	
	var alert_level_count = $("#alert_level_count");
	var alert_level_countDetails = $("#alert_level_countDetails");
	
	var alert_level_precentage = $("#alert_level_precentage");
	var alert_level_precentageDetails = $("#alert_level_precentageDetails");
	
	
	
	
	
	device_name.blur(validate_device_name);
	description.blur(validate_description);
	device_max_Wattage.blur(validate_device_max_Wattage);
	device_max_time.blur(validate_device_max_time);
	alert_level_count.blur(validate_alert_level_count);
	alert_level_precentage.blur(validate_alert_level_precentage);
	
	
	
	device_name.keyup(validate_device_name);
	description.keyup(validate_description);
	device_max_Wattage.keyup(validate_device_max_Wattage);
	device_max_time.keyup(validate_device_max_time);
	alert_level_count.keyup(validate_alert_level_count);
	alert_level_precentage.keyup(validate_alert_level_precentage);

	form.submit(function(){
			if(validate_device_name() & validate_description() & validate_device_max_Wattage() & validate_device_max_time() & validate_alert_level_count() & validate_alert_level_precentage() ){
			return true;
			}else{
				return false;
			}
		});
	

	function validate_device_name(){
		if(device_name.val().length<5){
			device_name.addClass("error");
			device_nameDetails.text("Device Title should be more than 5 characters");
			device_nameDetails.addClass("error");
			return false;
		}else{
			device_name.removeClass("error");
			device_nameDetails.text("What's your Device Name?");
			device_nameDetails.removeClass("error");
			return true;
			
		}
	}
	
	function validate_description(){
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
			descriptionDetails.text("Description about the new Device?");
			descriptionDetails.removeClass("error");
			return true;
			
		}
	}
	
	

	function validate_device_max_Wattage(){
		if(device_max_Wattage.val().length<1)
		{
			device_max_Wattage.addClass("error");
			device_max_WattageDetails.text("Please enter your device maximum wattage usage.");
			device_max_WattageDetails.addClass("error");
			return false;
			
		}
		else
		{
			device_max_Wattage.removeClass("error");
			device_max_WattageDetails.text("What's your device maximum wattage usage?");
			device_max_WattageDetails.removeClass("error");
			return true;
			
		}
	}
	
	
	function validate_device_max_time(){
		if(device_max_time.val().length<1)
		{
			device_max_time.addClass("error");
			device_max_timeDetails.text("Please enter your maximum usage time of the device.");
			device_max_timeDetails.addClass("error");
			return false;
			
		}
		else
		{
			device_max_time.removeClass("error");
			device_max_timeDetails.text("What's your maximum usage time of the device?");
			device_max_timeDetails.removeClass("error");
			return true;
			
		}
	}
	
		function validate_alert_level_count(){
		if(alert_level_count.val().length<1)
		{
			alert_level_count.addClass("error");
			alert_level_countDetails.text("Please enter how many times have to check before giving an alert.");
			alert_level_countDetails.addClass("error");
			return false;
			
		}
		else
		{
			alert_level_count.removeClass("error");
			alert_level_countDetails.text("How many times have to check before giving an alert?");
			alert_level_countDetails.removeClass("error");
			return true;
			
		}
	}
	
		function validate_alert_level_precentage(){
		if(alert_level_precentage.val().length<1)
		{
			alert_level_precentage.addClass("error");
			alert_level_precentageDetails.text("Please enter how much precentage of usage has to exceed before giving an alert.");
			alert_level_precentageDetails.addClass("error");
			return false;
			
		}
		else
		{
			alert_level_precentage.removeClass("error");
			alert_level_precentageDetails.text("How much precentage of usage has to exceed before giving an alert?");
			alert_level_precentageDetails.removeClass("error");
			return true;
			
		}
	}
	
	

/*-----------------Prevent Typing Non-number Values - START ----------------------*/

   $('#device_max_Wattage').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
		   
		  device_max_Wattage.addClass("error");
			device_max_WattageDetails.text("You can type numbers only");
			device_max_WattageDetails.addClass("error");
		   
		   
		   
       }

   });
   
    $('#device_max_time').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
		   
		  device_max_time.addClass("error");
			device_max_timeDetails.text("You can type numbers only");
			device_max_timeDetails.addClass("error");
		   
		   
		   
       }

   });
   
       $('#alert_level_count').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
		   
		  alert_level_count.addClass("error");
			alert_level_countDetails.text("You can type numbers only");
			alert_level_countDetails.addClass("error");
		   
		   
		   
       }

   });
   
   
     $('#alert_level_precentageDetails').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
		   
		  alert_level_precentage.addClass("error");
			alert_level_precentageDetails.text("You can type numbers only");
			alert_level_precentageDetails.addClass("error");
		   
		   
		   
       }

   });

   
   
   
/*-----------------Prevent Typing Non-number Values - START ----------------------*/


	
});
(function($) {
    $.fn.checkFileType = function(options) {
        var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
        };
        options = $.extend(defaults, options);

        return this.each(function() {

            $(this).on('change', function() {
                var value = $(this).val(),
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);

                if ($.inArray(extension, options.allowedExtensions) == -1) {
                    options.error();
                    $(this).focus();
                } else {
                    options.success();

                }

            });

        });
    };

})(jQuery);

$(function() {
    $('#image').checkFileType({
        allowedExtensions: ['jpg', 'jpeg','png','gif'],
        success: function() {
			
			  $send = $('#save_location');    
	$send.attr('disabled', false);
	
	
            return true;
        },
        error: function() {
			
		
    $send = $('#save_location');    
	$send.attr('disabled', true);
	
            return false;
        }
    });

});