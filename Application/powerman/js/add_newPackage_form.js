$(document).ready(function() {
//	alert("a");
    var form = $("#add_newPackage_form");
	var nPackage = $("#nPackage");
	var packageDetails = $("#packageDetails");
	var description = $("#details");
	var descriptionDetails = $("#dDetails");
	var mDevices = $("#mDevices");
	var mDeviceDetails = $("#mDeviceDetails");
	var sDevices = $("#sDevices");
	var sDeviceDetails = $("#sDeviceDetails");
	var smsAmount = $("#smsAmount");
	var sms_amountDetails = $("#sms_amountDetails");
	var duration = $("#duration");
	var durationDetails = $("#durationDetails");
	var eDuration = $("#eDuration");
	var expire_durationDetails = $("#expire_durationDetails");
	
	nPackage.blur(validate_nPackage);
	description.blur(validate_description);
	mDevices.blur(validate_mDevices);
	sDevices.blur(validate_sDevices);
	smsAmount.blur(validate_smsAmount);
	duration.blur(validate_duration);
	eDuration.blur(validate_eDuration);
	
	
	nPackage.keyup(validate_nPackage);
	description.keyup(validate_description);
	mDevices.keyup(validate_mDevices);
	sDevices.keyup(validate_sDevices);
	smsAmount.keyup(validate_smsAmount);
	duration.keyup(validate_duration);
	eDuration.keyup(validate_eDuration);
	
	
	
	form.submit(function(){
			if(validate_nPackage() & validate_description() & validate_mDevices() & validate_sDevices() & validate_smsAmount() & validate_duration() & validate_eDuration()){
			return true;
			}else{
				return false;
			}
		});
	

	function validate_nPackage(){
		if(nPackage.val().length<5){
			nPackage.addClass("error");
			packageDetails.text("Package name should be more than 8 characters");
			packageDetails.addClass("error");
			return false;
		}else{
			nPackage.removeClass("error");
			packageDetails.text("What's the package name?");
			packageDetails.removeClass("error");
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
			descriptionDetails.text("Reason for changing package");
			descriptionDetails.removeClass("error");
			return true;
			
		}
	}

/*-----------------Prevent Typing Non-number Values - START ----------------------*/

   $('#mDevices').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       }

   });
   
   $('#sDevices').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       }

   });
   
   $('#smsAmount').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       }

   });
   
   $('#duration').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       }

   });
   
   $('#eDuration').keypress(function(event){

       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       }

   });
   
/*-----------------Prevent Typing Non-number Values - START ----------------------*/

function validate_mDevices(){
		if(mDevices.val().length<1)
		{
			mDevices.addClass("error");
			mDeviceDetails.text("Enter more than one main device.");
			mDeviceDetails.addClass("error");
			return false;
			
		}
		else
		{
			mDevices.removeClass("error");
			mDeviceDetails.text("Number of main devices in this package.");
			mDeviceDetails.removeClass("error");
			return true;
			
		}
	}


	/*function validate_mDevices(){
		
		$(function(){
			$('#mDevices').keydown(function(e) {
				if (e.shiftKey || e.ctrlKey || e.altKey) 
				{
					e.preventDefault();
					mDevices.addClass("error");
					mDeviceDetails.text("Enter only numbers");
					mDeviceDetails.addClass("error");
					return false;
				} 
				else 
				{
					var key = e.keyCode;
					if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 		
					{
					//alert ("Enter only numbers");	
					mDevices.addClass("error");
					mDeviceDetails.text("Enter only numbers");
					mDeviceDetails.addClass("error");
					return false;
					e.preventDefault();
					
					}
					else{
					mDevices.removeClass("error");
					mDeviceDetails.text("Number of main devices in this package");
					mDeviceDetails.removeClass("error");
					return true;
					}
				
				}
				
				})
			
			})
		
				
	}*/

	function validate_sDevices(){
		if(sDevices.val().length<1)
		{
			sDevices.addClass("error");
			sDeviceDetails.text("Enter more than one sub device per main device.");
			sDeviceDetails.addClass("error");
			return false;
			
		}
		else
		{
			sDevices.removeClass("error");
			sDeviceDetails.text("Number of sub devices per main device in this package.");
			sDeviceDetails.removeClass("error");
			return true;
			
		}
	}
/*
	function validate_sDevices(){
		
		$(function(){
			$('#sDevices').keydown(function(e) {
				if (e.shiftKey || e.ctrlKey || e.altKey) 
				{
					e.preventDefault();
					sDevices.addClass("error");
					sDeviceDetails.text("Enter only numbers");
					sDeviceDetails.addClass("error");
					return false;
				} 
				else 
				{
					var key = e.keyCode;
					if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 		
					{
					//alert ("Enter only numbers");	
					sDevices.addClass("error");
					sDeviceDetails.text("Enter only numbers");
					sDeviceDetails.addClass("error");
					return false;
					e.preventDefault();
					
					}
					else{
					sDevices.removeClass("error");
					sDeviceDetails.text("Number of sub devices in this package");
					sDeviceDetails.removeClass("error");
					return true;
					}
				
				}
				
				})
			
			})
		
				
	}
*/

	function validate_smsAmount(){
		if(smsAmount.val().length<1)
		{
			smsAmount.addClass("error");
			sms_amountDetails.text("Enter more than one per package.");
			sms_amountDetails.addClass("error");
			return false;
			
		}
		else
		{
			smsAmount.removeClass("error");
			sms_amountDetails.text("Amount of SMSs allowed to transmit in this package.");
			sms_amountDetails.removeClass("error");
			return true;
			
		}
	}

/*
	function validate_smsAmount(){
		
		$(function(){
			$('#smsAmount').keydown(function(e) {
				if (e.shiftKey || e.ctrlKey || e.altKey) 
				{
					e.preventDefault();
					smsAmount.addClass("error");
					sms_amountDetails.text("Enter only numbers");
					sms_amountDetails.addClass("error");
					return false;
				} 
				else 
				{
					var key = e.keyCode;
					if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 		
					{
					//alert ("Enter only numbers");	
					smsAmount.addClass("error");
					sms_amountDetails.text("Enter only numbers");
					sms_amountDetails.addClass("error");
					return false;
					e.preventDefault();
					
					}
					else{
					smsAmount.removeClass("error");
					sms_amountDetails.text("Amount of SMSs allowed to transmit in this package");
					sms_amountDetails.removeClass("error");
					return true;
					}
				
				}
				
				})
			
			})
		
				
	}
*/

	function validate_duration(){
		if(duration.val().length<1)
		{
			duration.addClass("error");
			durationDetails.text("Enter more than a day per package.");
			durationDetails.addClass("error");
			return false;
			
		}
		else
		{
			duration.removeClass("error");
			durationDetails.text("Number for days that the packge will activate.");
			durationDetails.removeClass("error");
			return true;
			
		}
	}

/*
	function validate_duration(){
		
		$(function(){
			$('#duration').keydown(function(e) {
				if (e.shiftKey || e.ctrlKey || e.altKey) 
				{
					e.preventDefault();
					duration.addClass("error");
					durationDetails.text("Enter only numbers");
					durationDetails.addClass("error");
					return false;
				} 
				else 
				{
					var key = e.keyCode;
					if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 		
					{
					//alert ("Enter only numbers");	/
					duration.addClass("error");
					durationDetails.text("Enter only numbers");
					durationDetails.addClass("error");
					return false;
					e.preventDefault();
					
					}
					else{
					duration.removeClass("error");
					durationDetails.text("Number of main devices in this package");
					durationDetails.removeClass("error");
					return true;
					}
				
				}
				
				})
			
			})
		
				
	}
	
*/

	function validate_eDuration(){
		if(eDuration.val().length<1)
		{
			eDuration.addClass("error");
			expire_durationDetails.text("Enter more than a day per package.");
			expire_durationDetails.addClass("error");
			return false;
			
		}
		else
		{
			eDuration.removeClass("error");
			expire_durationDetails.text("Number for days that the syatem show expiring alert.");
			expire_durationDetails.removeClass("error");
			return true;
			
		}
	}
/*
	function validate_eDuration(){
		
		var dtValue = eDuration.val();
		var dtRegex = new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
		
		
		if(dtRegex.test(dtValue)){
			eDuration.removeClass("error");
			expire_durationDetails.text("Expire date in mm/dd/yyyy or mm-dd-yyyy");
			expire_durationDetails.removeClass("error");
			return true;	
		}else{
			eDuration.addClass("error");
			expire_durationDetails.text("Enter a valid date in 'mm/dd/yyyy or mm-dd-yyyy' please");
			expire_durationDetails.addClass("error");
			return false;	
		}
			
	}
	 $('#send').attr("disabled", true);
	var $input = $('input:text'),
    $add = $('#add');    
	$add.attr('disabled', true);

	$input.keyup(function() {
    var trigger = false;
    $input.each(function() {
        if (!$(this).val()) {
            trigger = true;
        }
    });
    trigger ? $add.attr('disabled', true) : $add.removeAttr('disabled');
	});
	*/
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//$(function(){
			//$('#eDuration').keydown(function(e) {
				//if (e.shiftKey || e.ctrlKey || e.altKey) 
				//{
					//e.preventDefault();
					//eDuration.addClass("error");
					//expire_durationDetails.text("Enter only numbers");
					//expire_durationDetails.addClass("error");
					//return false;
				//} 
				//else 
				//{
					//var key = e.keyCode;
					//if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 		
					//{
					//alert ("Enter only numbers");	
					//eDuration.addClass("error");
					//expire_durationDetails.text("Enter only numbers");
					//expire_durationDetails.addClass("error");
					//return false;
					//e.preventDefault();
					
					//}
					//else{
					//eDuration.removeClass("error");
					//expire_durationDetails.text("Expire date of this package");
					//expire_durationDetails.removeClass("error");
					//return true;
					//}
				
				//}
				
				//})
			
			//})
		
				
	//}
	//function validateLname(){
		//if(lname.val().length<5){
			//lname.addClass("error");
			//lnameDetails.text("Your name isn't that short. Make it 5 characters or more.");
			//lnameDetails.addClass("error");
			//return false;
		//}else{
			//lname.removeClass("error");
			//lnameDetails.text("What's your Last name?");
			//lnameDetails.removeClass("error");
			//return true;
			
		//}
	//}
	
		
//});