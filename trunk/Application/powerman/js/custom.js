$(document).ready(function(){
    /* ---------- switch on/off Styles ---------- */
     $('.bool-slider .inset .control').click(function() {
        if (!$(this).parent().parent().hasClass('disabled')) {
            if ($(this).parent().parent().hasClass('true')) {
                
                $(this).parent().parent().addClass('false').removeClass('true');
                $('.item-icon').css("background-image", "url(img/bulb_off.png)");
            } else {
                $(this).parent().parent().addClass('true').removeClass('false');
                $('.item-icon').css("background-image", "url(img/bulb_on.png)");
            }
        }
    });

	
	/* ---------- Login Box Styles ---------- */
	if($(".login-box")) {
		
		$("#username").focus(function() {

			$(this).parent(".input-prepend").addClass("input-prepend-focus");

		});

		$("#username").focusout(function() {

			$(this).parent(".input-prepend").removeClass("input-prepend-focus");

		});

		$("#password").focus(function() {

			$(this).parent(".input-prepend").addClass("input-prepend-focus");

		});

		$("#password").focusout(function() {

			$(this).parent(".input-prepend").removeClass("input-prepend-focus");

		});
		
	}
					
	/* ---------- Add class .active to current link  ---------- */
	$('ul.main-menu li a').each(function(){
		
		if($(this).hasClass('submenu')) {
			
			if($($(this))[0].href==String(window.location)) {
				
				$(this).parent().parent().parent().addClass('active');
				
			}
			
		} else {
			
			if($($(this))[0].href==String(window.location)) {
				
				$(this).parent().addClass('active');
				
			}
					
		}
		
		
	}); 
			
	/* ---------- Acivate Functions ----------*/
	$("#overlay").delay(1250).fadeOut(500);
	template_functions();
	
	
	
});



/* ---------- Template Functions ---------- */		
		
function template_functions(){
	
	
	/* ---------- Submenu  ---------- */
	
	$('.dropmenu').click(function(e){

		e.preventDefault();

		$(this).parent().find('ul').slideToggle();
	
	});
	
	/* ---------- ToDo List Action Buttons ---------- */
	
	if($(".todo-list")) {
		
		$(".todo-remove").click(function(){

			$(this).parent().parent().fadeTo("slow", 0.00, function(){ //fade
				$(this).slideUp("slow", function() { //slide up
			    	$(this).remove(); //then remove from the DOM
			    });
			});


			return false;
		});
		
	}
	
	
	
}