/* --------------- ELIMINAR CATEGORIA ------------------------*/
$(document).ready( function() {
    $('#datos_baja_empleado').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#numero_categoria').val()=="" ) {
            error = true;
            $('#numero_categoria').addClass('campoinvalido');
            $('#errMsg').html("*Numero de categoria es obligatorio.");
        }
        if($('#numero_categoria').val()!=""){
            $('#numero_categoria').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});