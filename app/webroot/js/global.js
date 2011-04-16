// Run on document ready
$(document).ready(function() {

    radioToggle();
    showOnChange();
    fadeMessages();

});



// Fade in/out flash messages
function fadeMessages(){
	if($('#authMessage')){ 
		$('#authMessage').fadeIn(1000).delay(10000).fadeOut(1000);
	}
	if($('#flashMessage')){ 
		$('#flashMessage').fadeIn(1000).delay(10000).fadeOut(1000);
	}
}

//show/hide specific divs according to radio button selection
function radioToggle(){
	$('div.radioToggle').not('div.radioToggle:first').hide();
		
    $("input.radioToggle").click(function() {
    	$('div.radioToggle').hide();	  		
        var chosen_div_name = $(this).val();        
        $("div.radioToggle."+chosen_div_name).fadeIn();
    }); 
}

//show all if the first input field is changed
function showOnChange(){
    $(".showOnChange").not('.showOnChange:first').hide();
    $("select.showOnChange:first, input.showOnChange:first").change(function() {
        $(".showOnChange").fadeIn();
    });
}

// Delay extension
$.fn.delay = function(time, callback){
    // Empty function:
    jQuery.fx.step.delay = function(){};
    // Return meaningless animation, (will be added to queue)
    return this.animate({delay:1}, time, callback);
}
