
/* --------------- EDITAR EMPLEADO ------------------------*/
$(document).ready( function() {
    $('#datos_cambio').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( !error && $('#nombre_cambios').val()=="" ) {
            error = true;
            $('#nombre_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Nombre empleado es obligatorio.");
        }
        if($('#nombre_cambios').val()!=""){
            $('#nombre_cambios').removeClass('campoinvalido');
        }
        
        if( !error && $('#apellidos_cambios').val()=="" ) {
            error = true;
            $('#apellidos_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Apellidos empleado es obligatorio.");
        }
        if($('#apellidos_cambios').val()!=""){
            $('#apellidos_cambios').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg_cambios').show();
        }
    });
         
});
/*---------------------------------------------------------------------------*/
