
/*---------------------- MÉTODO DE PAGO ----------------------------*/

$(document).ready(function() {
			$('input[type=radio][name=clase_card]').change(function() {
				if (this.value == 'card') {
					$('#id_card').show();
					$('#id_paypal').hide();
				}
				else if (this.value == 'paypal') {
					$('#id_card').hide();
					$('#id_paypal').show();
				}
			});
});

/*---------------------- MÉTODO DE PAGO ----------------------------*/

$(document).ready( function() {
    $('#datos_registro2_card').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#nombre_titular').val()=="" ) {
            error = true;
            $('#nombre_titular').addClass('campoinvalido');
            $('#errMsg_card').html("*Nombre del titular es obligatorio.");
        }
        if($('#nombre_titular').val()!=""){
            $('#nombre_titular').removeClass('campoinvalido');
        }
        if( !error && $('#dir_facturacion').val()=="" ) {
            error = true;
            $('#dir_facturacion').addClass('campoinvalido');
            $('#errMsg_card').html("*Dirección de facturación es obligatorio.");
        }
        if($('#dir_facturacion').val()!=""){
            $('#dir_facturacion').removeClass('campoinvalido');
        }
        if( !error && $('#num_tarjeta').val()=="" ) {
            error = true;
            $('#num_tarjeta').addClass('campoinvalido');
            $('#errMsg_card').html("*Número de tarjeta es obligatorio.");
        }
        if($('#num_tarjeta').val()!=""){
            $('#num_tarjeta').removeClass('campoinvalido');
        }
        if( !error && $('#cvc').val()=="" ) {
            error = true;
            $('#cvc').addClass('campoinvalido');
            $('#errMsg_card').html("*CVC es obligatorio.");
        }
        if($('#cvc').val()!=""){
            $('#cvc').removeClass('campoinvalido');
        }
        if(error){
            event.preventDefault();
            $('#errMsg_card').show();
        }
    });
});


$(document).ready( function() {
    $('#datos_registro2_paypal').on('submit', function(event) {
        
        var error = false;
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#email_paypal').val()=="" ) {
            error = true;
            $('#email_paypal').addClass('campoinvalido');
            $('#errMsg').html("*Email de Paypal es obligatorio.");
        }
        if($('#email_paypal').val()!=""){
            $('#email_paypal').removeClass('campoinvalido');
        }
        if( !error && $('#password_paypal').val()=="" ) {
            error = true;
            $('#password_paypal').addClass('campoinvalido');
            $('#errMsg').html("*Contraseña de Paypal es obligatorio.");
        }
        if($('#password_paypal').val()!=""){
            $('#password_paypal').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
});