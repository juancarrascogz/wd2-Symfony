
/* --------------- AÑADIR ELEMENTOS DE UN PRODUCTO ------------------------*/
$(document).ready( function() {
    $('#datos_add_elementos').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#elementos_add').val()=="" ) {
            error = true;
            $('#elementos_add').addClass('campoinvalido');
            $('#errMsg').html("*Número de elementos ha añadir de un producto es obligatorio.");
        }
        if($('#elementos_add').val()!=""){
            $('#elementos_add').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});