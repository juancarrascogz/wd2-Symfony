 
/* --------------- REGISTRO ------------------------*/
$(document).ready( function() {
    $('#datos_registro').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#nombre_usuario').val()=="" ) {
            error = true;
            $('#nombre_usuario').addClass('campoinvalido');
            $('#errMsg').html("*Nombre de usuario es obligatorio.");
        }
        if($('#nombre_usuario').val()!=""){
            $('#nombre_usuario').removeClass('campoinvalido');
        }
        
        if( !error && $('#nombre').val()=="" ) {
            error = true;
            $('#nombre').addClass('campoinvalido');
            $('#errMsg').html("*Nombre es obligatorio.");
        }
        if($('#nombre').val()!=""){
            $('#nombre').removeClass('campoinvalido');
        }
        
        if( !error && $('#apellidos').val()=="" ) {
            error = true;
            $('#apellidos').addClass('campoinvalido');
            $('#errMsg').html("*Apellidos es obligatorio.");
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
/*---------------------------------------------------------------------------*/

/*----------------------REGISTRO - Añadir Filas ----------------------------*/
var filas_phone = 0;
var filas_address = 0;
    function addRowPhone(){
        if(filas_phone<1){
        var nueva_fila = document.getElementById("p_telefono").innerHTML;
                
        nueva_fila += "<div id=\"p_telefono2\" class=\"campos_reg\"><label for=\"telefono2\">Teléfono 2<br/></label> <input id=\"telefono2\" name=\"telefono2\" type=\"tel\" title=\"Teléfono 2 (e.g. 985000999 - 983 222 850 - 955 666852 - 975 52 25 14)\" placeholder=\"983 202 099\" size=\"50\"    pattern=\"[0-9]{9}|[0-9]{3} [0-9]{3} [0-9]{3}|[0-9]{3} [0-9]{6}|[0-9]{3} [0-9]{2} [0-9]{2} [0-9]{2}\"></div>";
                    
        document.getElementById("p_telefono").innerHTML = nueva_fila;
            filas_phone += 1;
        }
        else{
            alert("Sólo puede introducir un máximo de 2 números de teléfono.");
            }
        }

        function addRowAddress(){  
            if(filas_address<1){
                var nueva_fila = document.getElementById("p_direccion").innerHTML;
                
                nueva_fila += "<div id=\"p_direccion2\" class=\"campos_reg\"><label for=\"telefono2\">Dirección 2<br/></label> <input id=\"direccion2\" name=\"direccion2\" type=\"text\" title=\"Dirección 2\" placeholder=\"C/Fray Luis de León 14\" size=\"50\"></div>";
                    
                document.getElementById("p_direccion").innerHTML = nueva_fila;
                    filas_address += 1;
                }
                else{
                    alert("Sólo puede introducir un máximo de 2 direcciones.");
                }
			}

/*---------------------------------------------------------------------------*/