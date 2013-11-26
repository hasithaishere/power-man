$(document).ready(function() {
//	alert("a");
    var form = $("#power_device_form");
	
	var Device_name = $("#Device_name");
	var Device_nameDetails = $("#Device_nameDetails");
	
	
	var Device_url = $("#Device_url");
	var Device_urlDetails = $("#Device_urlDetails");
	
	
	Device_name.blur(validate_device_name);
	Device_url.blur(validate_device_url);

	Device_name.keyup(validate_device_name);
	Device_url.keyup(validate_device_url);
	
	
	
	
	
	form.submit(function(){
			if(validate_device_name() & validate_device_url()){
			return true;
			}else{
				return false;
			}
		});
	

	function validate_device_name(){
		if(Device_name.val().length<5){
			Device_name.addClass("error");
			Device_nameDetails.text("Device Name should be more than 5 characters");
			Device_nameDetails.addClass("error");
			return false;
		}else{
			Device_name.removeClass("error");
			Device_nameDetails.text("What's Power Device Name?");
			Device_nameDetails.removeClass("error");
			return true;
			
		}
	}


	
	function validate_device_url(){
		if(Device_url.val().length<1)
		{
			Device_url.addClass("error");
			Device_urlDetails.text("Please give an Url which gave a description about the device.");
			Device_urlDetails.addClass("error");
			return false;
			
		}
		else
		{
			Device_url.removeClass("error");
			Device_urlDetails.text("Url which gave a description about the device");
			Device_urlDetails.removeClass("error");
			return true;
			
		}
	}



	
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