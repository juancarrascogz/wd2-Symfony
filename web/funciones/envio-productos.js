/*---------------------- MÉTODO DE PAGO ----------------------------*/

$(document).ready(function() {
    $('input[type=radio][name=clase_tienda]').change(function() {
        if (this.value == 'tienda') {
            $('#id_tienda').show();
            $('#id_envio').hide();
        }
        else if (this.value == 'envio') {
            $('#id_tienda').hide();
            $('#id_envio').show();
        }
    });
});