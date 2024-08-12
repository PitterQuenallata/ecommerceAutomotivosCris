$(document).ready(function() {
  var precioUnidad = parseFloat($('#precio_total').text());

  // Actualizar precio total basado en la cantidad
  function actualizarPrecioTotal(cantidad) {
      var precioTotal = (precioUnidad * cantidad).toFixed(2);
      $('#precio_total').text(precioTotal);
  }

  // Asegurarse de que la cantidad no sea menor a 1 y actualizar el precio al cambiar manualmente la cantidad
  $('#cantidad_repuesto').on('input', function() {
      var cantidad = parseInt($(this).val());

      if (isNaN(cantidad) || cantidad < 1) {
          $(this).val(1);
          cantidad = 1;
      }

      actualizarPrecioTotal(cantidad);
  });

  // Decrementar cantidad
  $('#add1').click(function() {
      var cantidad = parseInt($('#cantidad_repuesto').val());
      if (cantidad > 1) {
          cantidad--; // Disminuir la cantidad en 1
          $('#cantidad_repuesto').val(cantidad); // Actualizar el valor del input
          actualizarPrecioTotal(cantidad); // Actualizar el precio total
      }
  });

  // Incrementar cantidad
  $('#addo2').click(function() {
      var cantidad = parseInt($('#cantidad_repuesto').val());
      cantidad++; // Aumentar la cantidad en 1
      $('#cantidad_repuesto').val(cantidad); // Actualizar el valor del input
      actualizarPrecioTotal(cantidad); // Actualizar el precio total
  });


  
});
