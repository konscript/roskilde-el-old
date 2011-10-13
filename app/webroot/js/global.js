// Run on document ready
$(document).ready(function() {

    radioToggle();
    showOnChange();
    fadeMessages();
    
	//Toggle between two divs
	checkboxToggle('div.input.checkbox input.toggleClass');
	$('div.input.checkbox input.toggleClass').click(function(){
		checkboxToggle(this);
	});    

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

// Toggle two divs based on a checkbox
function checkboxToggle(checkbox){

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

// Google Analytics
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22779835-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();