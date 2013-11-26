$(document).ready(function() {
//	alert("a");
    var form = $("#add_mainDevice_form");
	var title = $("#sub_device_title");
	var subdeviceDetails = $("#sub_device_titleDetails");
	
	var subdevice_serialno = $("#sub_device_serialno");
	var subdevice_serialnoDetails = $("#sub_device_serialnoDetails");
	
	var description = $("#sub_device_description");
	var descriptionDetails = $("#sub_device_descriptionDetails");
	
	
	title.blur(validate_title);
	subdevice_serialno.blur(validate_serialno);
	description.blur(validate_description);
	
	
	
	title.keyup(validate_title);
	subdevice_serialno.keyup(validate_serialno);
	description.keyup(validate_description);
	
	
	
	
	form.submit(function(){
			if(validate_title() & validate_serialno() & validate_description()){
			return true;
			}else{
				return false;
			}
		});
	

	function validate_title(){
		if(title.val().length<5){
			title.addClass("error");
			subdeviceDetails.text("Device Title should be more than 8 characters");
			subdeviceDetails.addClass("error");
			return false;
		}else{
			title.removeClass("error");
			subdeviceDetails.text("What's your Sub-Device Title?");
			subdeviceDetails.removeClass("error");
			return true;
			
		}
	}

	function validate_serialno(){
		if(subdevice_serialno.val().length<5)
		{
			subdevice_serialno.addClass("error");
			subdevice_serialnoDetails.text("Your serial number is too short. Make it 5 characters or more.");
			subdevice_serialnoDetails.addClass("error");
			return false;
			
		}
		else
		{
			subdevice_serialno.removeClass("error");
			subdevice_serialnoDetails.text("What's your Device Serial No?");
			subdevice_serialnoDetails.removeClass("error");
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
			descriptionDetails.text("Description about the new Sub Device?");
			descriptionDetails.removeClass("error");
			return true;
			
		}
	}

/*-----------------Prevent Typing Non-number Values - START ----------------------*/

   $('#sub_device_serialno').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
		   
		   subdevice_serialno.addClass("error");
			subdevice_serialnoDetails.text("You can type numbers only");
			subdevice_serialnoDetails.addClass("error");
		   
		   
		   
       }

   });
   
   
/*-----------------Prevent Typing Non-number Values - START ----------------------*/


	
});
