
/* --------------- REGISTRO EMPLEADO ------------------------*/
$(document).ready( function() {
    $('#datos_registro').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#nombre').val()=="" ) {
            error = true;
            $('#nombre').addClass('campoinvalido');
            $('#errMsg').html("*Nombre del empleado es obligatorio.");
        }
        if($('#nombre').val()!=""){
            $('#nombre').removeClass('campoinvalido');
        }
        
        if( !error && $('#apellidos').val()=="" ) {
            error = true;
            $('#apellidos').addClass('campoinvalido');
            $('#errMsg').html("*Apellidos del empleado es obligatorio.");
        }
        if($('#apellidos').val()!=""){
            $('#apellidos').removeClass('campoinvalido');
        }

        if( !error && $('#dni').val()=="" ) {
            error = true;
            $('#dni').addClass('campoinvalido');
            $('#errMsg').html("*DNI es obligatorio.");
        }
        if($('#dni').val()!=""){
            $('#dni').removeClass('campoinvalido');
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
           
        if( !error && $('#password').val()=="" ) {
            error = true;
            $('#password').addClass('campoinvalido');
            $('#errMsg').html("*Contraseña es obligatorio.");
        }
        if($('#password').val()!=""){
            $('#password').removeClass('campoinvalido');
        }
        
		if( !error && $('#password').val()!=$('#repetir_password').val() ) {
            error = true;
            $('#password').addClass('campoinvalido');
            $('#errMsg').html("*Ambas contraseñas deben coincidir.");
        }
        if($('#password').val()==$('#repetir_password').val()){
           $('#password').removeClass('password');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});