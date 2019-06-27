
/* --------------- BAJA EMPLEADO ------------------------*/
$(document).ready( function() {
    $('#datos_baja_empleado').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#numero_empleado').val()=="" ) {
            error = true;
            $('#numero_empleado').addClass('campoinvalido');
            $('#errMsg').html("*Numero de empleado es obligatorio.");
        }
        if($('#numero_empleado').val()!=""){
            $('#numero_empleado').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});