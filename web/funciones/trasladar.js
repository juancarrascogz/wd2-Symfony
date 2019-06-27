
/* --------------- TRASLADAR PRODUCTO ------------------------*/

$(document).ready( function() {
    $('#datos_trasladar').on('submit', function(event) {
        
        var error = false;

        var stock = parseInt($('#stock_producto').text());
        
        $('.campos_reg').removeClass('campoinvalido');
        
        if( $('#stock_trasladar').val()=="" || $('#stock_trasladar').val()<1) {
            error = true;
            $('#stock_trasladar').addClass('campoinvalido');
            $('#errMsg').html("*Número de elementos a trasladar es obligatorio o al menos 1.");
        }
        if( $('#stock_trasladar').val()>stock) {
            error = true;
            $('#stock_trasladar').addClass('campoinvalido');
            $('#errMsg').html("*No hay tanto stock.");
        }
        if($('#stock_trasladar').val()!=""){
            $('#stock_trasladar').removeClass('campoinvalido');
        }
        
        if(error){
            event.preventDefault();
            $('#errMsg').show();
        }
    });
         
});