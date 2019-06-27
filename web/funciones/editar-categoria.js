
/* --------------- EDITAR CATEGORIA ------------------------*/
$(document).ready( function() {
    $('#datos_cambio').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( !error && $('#acronimo_cambios').val()=="" ) {
            error = true;
            $('#acronimo_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Acrónimo categoria es obligatorio.");
        }
        if($('#acronimo_cambios').val()!=""){
            $('#acronimo_cambios').removeClass('campoinvalido');
        }
        
        if( !error && $('#nombre_cambios').val()=="" ) {
            error = true;
            $('#nombre_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Nombre categoria es obligatorio.");
        }
        if($('#nombre_cambios').val()!=""){
            $('#nombre_cambios').removeClass('campoinvalido');
        }
        
        if( !error && $('#descripcion_cambios').val()=="" ) {
            error = true;
            $('#descripcion_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Descripción categoria es obligatorio.");
        }
        if($('#descripcion_cambios').val()!=""){
            $('#descripcion_cambios').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg_cambios').show();
        }
    });
         
});
/*---------------------------------------------------------------------------*/
