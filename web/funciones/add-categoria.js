
/* --------------- AÑADIR CATEGORIA ------------------------*/
$(document).ready( function() {
    $('#datos_registro').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#acronimo').val()=="" ) {
            error = true;
            $('#acronimo').addClass('campoinvalido');
            $('#errMsg').html("*Acrónimo de categoria es obligatorio.");
        }
        if($('#acronimo').val()!=""){
            $('#acronimo').removeClass('campoinvalido');
        }
        
        if( !error && $('#nombre').val()=="" ) {
            error = true;
            $('#nombre').addClass('campoinvalido');
            $('#errMsg').html("*Nombre de categoria es obligatorio.");
        }
        if($('#nombre').val()!=""){
            $('#nombre').removeClass('campoinvalido');
        }

        if( !error && $('#descripcion').val()=="" ) {
            error = true;
            $('#descripcion').addClass('campoinvalido');
            $('#errMsg').html("*Descripción categoria es obligatorio.");
        }
        if($('#descripcion').val()!=""){
            $('#descripcion').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});