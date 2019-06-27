/*------------------LOGIN CLIENTES - LOGIN EMPLEADOS -----------------------*/

$(document).ready(function() {
    $(".boton").click(function(event){
        
        $("#identicarse_cliente").toggle();
        $("#identicarse_empleado").toggle();

        $("#identicarse_cliente").setvisible(!$("#identicarse_cliente").getVisible()); 
    })
});
/*--------------------------------------------------------*/

/*----------------------LOGIN ----------------------------*/

$(document).ready( function() {
    
    $('#datos_login_cliente').on('submit', function(event) {
        var hayErrores = false;
        var valEmail = $('#email').val();
        var valPasswrod = $('#password').val();
        
        $('.campos_login').removeClass('campoinvalido');
        
        if(valEmail!="" ||  valPasswrod!="" ){
            $('#email').removeClass('campoinvalido');
            $('#password').removeClass('campoinvalido');
        }
        if(valEmail=="" &&  valPasswrod=="" ){
            $('#errMsg').html("*Ambos campos son obligatorios.");
            $('#errMsg').show();
            $('#email').addClass('campoinvalido');
            $('#password').addClass('campoinvalido');
            hayErrores = true;
        }
        else if(valEmail==""){
            $('#errMsg').html("*Campo email es obligatorio.");
            $('#errMsg').show();
            $('#email').addClass('campoinvalido');
            hayErrores = true;
        }
        else if(valPasswrod==""){
            $('#errMsg').html("*Campo password es obligatorio.");
            $('#errMsg').show();
            $('#password').addClass('campoinvalido');
            hayErrores = true;
        }
        if( hayErrores ) {
            event.preventDefault();
            return false;
        }
    });
});


$(document).ready( function() {
    
    $('#datos_login_empleado').on('submit', function(event) {
        var hayErrores = false;
        var valID = $('#idEmpleado').val();
        var valPasswrod2 = $('#password2').val();
        
        $('.campos_login').removeClass('campoinvalido');
        
        if(valID!="" ||  valPasswrod2!="" ){
            $('#idEmpleado').removeClass('campoinvalido');
            $('#password2').removeClass('campoinvalido');
        }
        if(valID=="" &&  valPasswrod2=="" ){
            $('#errMsg2').html("*Ambos campos son obligatorios.");
            $('#errMsg2').show();
            $('#idEmpleado').addClass('campoinvalido');
            $('#password2').addClass('campoinvalido');
            hayErrores = true;
        }
        else if(valID==""){
            $('#errMsg2').html("*Campo ID Empleado es obligatorio.");
            $('#errMsg2').show();
            $('#idEmpleado').addClass('campoinvalido');
            hayErrores = true;
        }
        else if(valPasswrod2==""){
            $('#errMsg2').html("*Campo password es obligatorio.");
            $('#errMsg2').show();
            $('#password2').addClass('campoinvalido');
            hayErrores = true;
        }
        if( hayErrores ) {
            event.preventDefault();
            return false;
        }
    });
});
/*---------------------------------------------------------------------------*/

