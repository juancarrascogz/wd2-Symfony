/* --------------- MIS DATOS ------------------------*/
$(document).ready( function() {
    $('#datos_cambio').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
         
        if( !error && $('#password_cambios').val()=="" ) {
            error = true;
            $('#password_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Contraseña es obligatorio.");
        }
        if($('#password_cambios').val()!=""){
            $('#password_cambios').removeClass('campoinvalido');
        }
        if( !error && $('#password_cambios').val()!=$('#repetir_password_cambios').val() ) {
            error = true;
            $('#password_cambios').addClass('campoinvalido');
            $('#errMsg_cambios').html("*Ambas contraseñas deben coincidir.");
        }
        if($('#password_cambios').val()==$('#repetir_password_cambios').val()){
           $('#password_cambios').removeClass('password_cambios');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg_cambios').show();
        }
    });
         
});
/*---------------------------------------------------------------------------*/
