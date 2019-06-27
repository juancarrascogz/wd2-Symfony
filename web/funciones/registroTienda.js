
/* --------------- REGISTRO TIENDA ------------------------*/
$(document).ready( function() {
    $('#datos_registro').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#nombre_tienda').val()=="" ) {
            error = true;
            $('#nombre_tienda').addClass('campoinvalido');
            $('#errMsg').html("*Nombre de tienda es obligatorio.");
        }
        if($('#nombre_tienda').val()!=""){
            $('#nombre_tienda').removeClass('campoinvalido');
        }
        
        if( !error && $('#nombre').val()=="" ) {
            error = true;
            $('#nombre').addClass('campoinvalido');
            $('#errMsg').html("*Nombre de responsable es obligatorio.");
        }
        if($('#nombre').val()!=""){
            $('#nombre').removeClass('campoinvalido');
        }
        
        
        // Expresion regular para email en unicode 
        var regexp = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		if( !error && regexp.test($('#email').val())==false ) {
            error = true;
            $('#email').addClass('campoinvalido');
            $('#errMsg').html("*Email es obligatorio.");
        }
        if(regexp.test($('#email').val())==true){
           $('#email').removeClass('campoinvalido');
        }
        
        if( !error && $('#email').val()!=$('#repetir_email').val() ) {
            error = true;
            $('#email').addClass('campoinvalido');
            $('#errMsg').html("*Ambos email deben coincidir.");
        }
        if($('#email').val()==$('#repetir_email').val()){
           $('#email').removeClass('campoinvalido');
        }
        
        
        if( !error && $('#direccion1').val()=="" ) {
            error = true;
            $('#direccion1').addClass('campoinvalido');
            $('#errMsg').html("*Dirección es obligatorio.");
        }
        if($('#direccion1').val()!=""){
            $('#direccion1').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});