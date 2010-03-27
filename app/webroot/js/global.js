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


 $(document).ready(function() {

    //Toggle between two divs
    toggleOptions('div.input.checkbox input.toggleClass');
    $('div.input.checkbox input.toggleClass').click(function(){
        toggleOptions(this);
    });

 });