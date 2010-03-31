// Delay extension
$.fn.delay = function(time, callback){
    // Empty function:
    jQuery.fx.step.delay = function(){};
    // Return meaningless animation, (will be added to queue)
    return this.animate({delay:1}, time, callback);
}

// Toggle two divs based on a checkbox
function toggleOptions(checkbox){

    var checkboxContainer = $(checkbox).parent();
    var primary = $(checkboxContainer).next('div');
    var secondary = $(primary).next('div');

    //If checkbox is checked = show primary
    if($(checkbox).is(':checked')){
        $(primary).fadeIn();
        $(secondary).hide();
    }else{
        $(primary).hide();
        $(secondary).fadeIn();
    }
}

// Run on document ready
$(document).ready(function() {

	//Toggle between two divs
	toggleOptions('div.input.checkbox input.toggleClass');
	$('div.input.checkbox input.toggleClass').click(function(){
		toggleOptions(this);
	});

	// Fade in/out flash messages
	if($('#authMessage')){ 
		$('#authMessage').fadeIn(1000).delay(10000).fadeOut(1000);
	}
	if($('#flashMessage')){ 
		$('#flashMessage').fadeIn(1000).delay(10000).fadeOut(1000);
	}
});