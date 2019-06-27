/*---------------------- CARRITO ----------------------------*/

$(document).ready( function() {
    
    var total1 = 0;
    var num_productos1 = 0;
    var num_productos_total = 0;
    
    $('.input_elemento').change(function(){
                
        var precio = parseInt($('#precio_producto_1').text());
        
        total1 = precio * ($('#num_productos_0').val());
        
        $('.total_carrito').text(total1 /*+ total2*/);
        
        num_productos1 = $('#num_productos_0').val();
        //num_productos2 = $('#num_productos_1').val();
        num_productos_total = parseInt(num_productos1) /*+ parseInt(num_productos2)*/;
                
        $('#num_articulos').text(num_productos_total);
        
    });
});