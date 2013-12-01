// JavaScript Document

 $('.fileupload').fileupload();
 $(document).ready(function() {
 var lform = $("#add_mainDevice_form");
 
	var main_device_title = $("#main_device_title");
	var main_device_titleDetails = $("#main_device_titleDetails");
	
	var main_device_id = $("#main_device_id");
	var main_device_idDetails = $("#main_device_idDetails");
	
	var main_device_serialno = $("#main_device_serialno");
	var main_device_serialnoDetails = $("#main_device_serialnoDetails");
	
	
	var main_device_description = $("#main_device_description");
	var main_device_descriptionDetails = $("#main_device_descriptionDetails");
	
 
 main_device_title.blur(validateLocationname);
 main_device_id.blur(validatesubLocationname);
 main_device_description.blur(validateLocationDescription);
 main_device_serialno.blur(validateserialno);

 
 
main_device_title.keyup(validateLocationname);
 main_device_id.keyup(validatesubLocationname);
 main_device_description.keyup(validateLocationDescription);
  main_device_serialno.keyup(validateserialno);
 
 
 //$("input[type=submit]").attr("disabled", "disabled");
	
 
 lform.submit(function(){
			if(validateLocationname() && validatesubLocationname() && validateLocationDescription() && validateserialno() ){
				$("input[type=submit]").removeAttr("disabled");
			return true;
			
			}else{
				
			//	$("input[type=submit]").attr("disabled", "disabled");
				return false;
				
			}
		});
		
		
/*-----------------Prevent Typing Non-number Values - START ----------------------*/

   $('#main_device_serialno').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       
	   
		
			main_device_serialno.addClass("error");
			main_device_serialnoDetails.text("Type only numbers.");
			main_device_serialnoDetails.addClass("error");
			return false;
			
		}
		
	   
	   
	   
	   
	   
	   

   });		
 
 function validateLocationname(){
		if(main_device_title.val().length<5){
			main_device_title.addClass("error");
			main_device_titleDetails.text("Your Main Device name isn't that short. Make it 5 characters or more.");
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
		if(main_device_id.val().length<5){
			main_device_id.addClass("error");
			main_device_idDetails.text("Your Main Device ID isn't that short. Make it 5 characters or more.");
			main_device_idDetails.addClass("error");
			return false;
		}else{
			main_device_id.removeClass("error");
			main_device_idDetails.text("What's your location's sub name?");
			main_device_idDetails.removeClass("error");
			return true;
			
		}
	}
	
	function validateLocationDescription(){
		if(main_device_description.val().length<25)
		{
			main_device_description.addClass("error");
			main_device_descriptionDetails.text("Your description is too short. Make it 25 characters or more.");
			main_device_descriptionDetails.addClass("error");
			return false;
			
		}
		else
		{
			main_device_description.removeClass("error");
			main_device_descriptionDetails.text("Description about the new Location?");
			main_device_descriptionDetails.removeClass("error");
			return true;
			
		}
	}
	
	
	function validateserialno(){
		if(main_device_serialno.val().length<5)
		{
			main_device_serialno.addClass("error");
			main_device_serialnoDetails.text("Your serial number is too short. Make it 5 characters or more.");
			main_device_serialnoDetails.addClass("error");
			return false;
			
		}
		else
		{
			main_device_serialno.removeClass("error");
			main_device_serialnoDetails.text("Serial number of the Main Device?");
			main_device_serialnoDetails.removeClass("error");
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
 
 

