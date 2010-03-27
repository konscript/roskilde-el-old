 $(document).ready(function() {

    //
    



    /*** Hide selectbox initially ***/
    $("form#ProjectAddForm select#UserUserId").parent().hide(); //skal måske gøres via css?

    //On checkbox change
    $('form#ProjectAddForm input#UserCreateNew').click(function(){

        //If checkbox is checked = create new!
        if($('form#ProjectAddForm input#UserCreateNew').is(':checked')){
            $("form#ProjectAddForm select#UserUserId").parent().hide(); //hide select
            $('form#ProjectAddForm input#UserUsername').parent().fadeIn(); //show input field
        }else{ //select projectmanager from lsit
            $("form#ProjectAddForm select#UserUserId").parent().fadeIn(); //show select
            $('form#ProjectAddForm input#UserUsername').parent().hide(); //hide input field
        }

    });


 });