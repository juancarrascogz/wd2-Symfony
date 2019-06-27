/* --------------- ELIMINAR CATEGORIA ------------------------*/
$(document).ready( function() {
    $('#datos_baja_empleado').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#numero_producto').val()=="" ) {
            error = true;
            $('#numero_producto').addClass('campoinvalido');
            $('#errMsg').html("*Numero de producto es obligatorio.");
        }
        if($('#numero_producto').val()!=""){
            $('#numero_producto').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});