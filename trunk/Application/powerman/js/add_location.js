// JavaScript Document

 $('.fileupload').fileupload();
 $(document).ready(function() {
 var lform = $("#add_location_form");
	var location_name = $("#location_name");
	var location_nameDetails = $("#location_nameDetails");
	var sub_name = $("#sub_name");
	var sub_nameDetails = $("#sub_nameDetails");
	var location_description = $("#location_description");
	var location_descriptionDetails = $("#location_descriptionDetails");
	
 
 location_name.blur(validateLocationname);
 sub_name.blur(validatesubLocationname);
 location_description.blur(validateLocationDescription);
 
 
 location_name.keyup(validateLocationname);
 sub_name.keyup(validatesubLocationname);
 location_description.keyup(validateLocationDescription);
 
 $("input[type=submit]").attr("disabled", "disabled");
	
 
 lform.submit(function(){
			if(validateLocationname() && validatesubLocationname() && validateLocationDescription() ){
				$("input[type=submit]").removeAttr("disabled");
			return true;
			
			}else{
				
				$("input[type=submit]").attr("disabled", "disabled");
				return false;
				
			}
		});
 
 function validateLocationname(){
		if(location_name.val().length<5){
			location_name.addClass("error");
			location_nameDetails.text("Your Location name isn't that short. Make it 5 characters or more.");
			location_nameDetails.addClass("error");
			return false;
		}else{
			location_name.removeClass("error");
			location_nameDetails.text("What's your Location name?");
			location_nameDetails.removeClass("error");
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
 
 

