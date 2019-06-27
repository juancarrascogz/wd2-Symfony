
/* --------------- AÑADIR PRODUCTO ------------------------*/
$(document).ready( function() {
    $('#datos_registro').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#acronimo').val()=="" ) {
            error = true;
            $('#acronimo').addClass('campoinvalido');
            $('#errMsg').html("*Acrónimo de producto es obligatorio.");
        }
        if($('#acronimo').val()!=""){
            $('#acronimo').removeClass('campoinvalido');
        }
        
        if( !error && $('#nombre').val()=="" ) {
            error = true;
            $('#nombre').addClass('campoinvalido');
            $('#errMsg').html("*Nombre de producto es obligatorio.");
        }
        if($('#nombre').val()!=""){
            $('#nombre').removeClass('campoinvalido');
        }

        if( !error && $('#descripcion').val()=="" ) {
            error = true;
            $('#descripcion').addClass('campoinvalido');
            $('#errMsg').html("*Descripción producto es obligatorio.");
        }
        if($('#descripcion').val()!=""){
            $('#descripcion').removeClass('campoinvalido');
        }
        
        if( $('#precio').val()=="" ) {
            error = true;
            $('#precio').addClass('campoinvalido');
            $('#errMsg').html("*Precio de producto es obligatorio.");
        }
        if($('#precio').val()!=""){
            $('#precio').removeClass('campoinvalido');
        }

        if( $('#ref').val()=="" ) {
            error = true;
            $('#ref').addClass('campoinvalido');
            $('#errMsg').html("*Referencia del producto es obligatorio.");
        }
        if($('#ref').val()!=""){
            $('#ref').removeClass('campoinvalido');
        }

        if( $('#fabricante').val()=="" ) {
            error = true;
            $('#fabricante').addClass('campoinvalido');
            $('#errMsg').html("*Fabricante del producto es obligatorio.");
        }
        if($('#fabricante').val()!=""){
            $('#fabricante').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});