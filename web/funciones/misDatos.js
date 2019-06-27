
/* --------------- MIS DATOS ------------------------*/
$(document).ready( function() {
    $('#datos_cambio').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#nombre_usuario_cambios').val()=="" ) {
            error = true;
            $('#nombre_usuario').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Nombre de usuario es obligatorio.");
        }
        if($('#nombre_usuario_cambios').val()!=""){
            $('#nombre_usuario_cambios').removeClass('campoinvalido');
        }
        
        if( !error && $('#nombre_cambios').val()=="" ) {
            error = true;
            $('#nombre_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Nombre es obligatorio.");
        }
        if($('#nombre_cambios').val()!=""){
            $('#nombre_cambios').removeClass('campoinvalido');
        }
        
        if( !error && $('#apellidos_cambios').val()=="" ) {
            error = true;
            $('#apellidos_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Apellidos es obligatorio.");
        }
        if($('#apellidos_cambios').val()!=""){
            $('#apellidos_cambios').removeClass('campoinvalido');
        }

        if( !error && $('#dni_cambios').val()=="" ) {
            error = true;
            $('#dni_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*DNI es obligatorio.");
        }
        if($('#dni_cambios').val()!=""){
            $('#dni_cambios').removeClass('campoinvalido');
        }
        
        if( !error && $('#direccion_cambios').val()=="" ) {
            error = true;
            $('#direccion_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Dirección es obligatorio.");
        }
        if($('#direccion_cambios').val()!=""){
            $('#direccion_cambios').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg_cambios').show();
        }
    });
         
});
/*---------------------------------------------------------------------------*/
