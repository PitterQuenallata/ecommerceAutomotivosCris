// $(document).ready(function() {

//   // Cargar carrito desde localStorage al iniciar
//   loadCartFromLocalStorage();

//   // Manejar el evento de añadir al carrito
//   $('.btn-add-to-cart').click(function() {
//       var productId = $(this).data('product-id');
//       var productName = $(this).data('product-name');
//       var productPrice = parseFloat($(this).data('product-price'));
//       var productImage = $(this).data('product-image');
//       var quantity = parseInt($('#cantidad_repuesto').val()) || 1; // Si no se proporciona cantidad, usar 1 por defecto

//       // Añadir el producto al carrito
//       addToCart(productId, productName, productPrice, productImage, quantity);
//   });

//   function addToCart(id, name, price, image, quantity) {
//       var cartItems = $('#cart-items');
//       var cartCount = $('#cart-count');
//       var cartSubtotal = $('#cart-subtotal');

//       // Obtener el carrito actual desde localStorage o crear uno nuevo
//       var cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];

//       // Verificar si el producto ya está en el carrito
//       var existingItemIndex = cart.findIndex(item => item.id === id);
//       if (existingItemIndex !== -1) {
//           // Actualizar la cantidad y el precio del producto existente
//           cart[existingItemIndex].quantity += quantity;
//       } else {
//           // Añadir un nuevo producto al carrito
//           cart.push({
//               id: id,
//               name: name,
//               price: price,
//               image: image,
//               quantity: quantity
//           });
//       }

//       // Guardar el carrito actualizado en localStorage
//       localStorage.setItem('shoppingCart', JSON.stringify(cart));

//       // Actualizar la UI del carrito
//       renderCart(cart);
//   }

//   function renderCart(cart) {
//       var cartItems = $('#cart-items');
//       var cartCount = $('#cart-count');
//       var cartSubtotal = $('#cart-subtotal');

//       cartItems.empty(); // Limpiar la lista actual de productos
//       var totalQuantity = 0;
//       var subtotal = 0;

//       cart.forEach(function(item) {
//           var quantity = item.quantity || 1; // Si la cantidad es null o undefined, usar 1 por defecto
//           var totalItemPrice = (item.price * quantity).toFixed(2);
//           totalQuantity += quantity;
//           subtotal += parseFloat(totalItemPrice);

//           var newItem = `
//               <li class="pb-7" data-product-id="${item.id}">
//                   <div class="d-flex align-items-center">
//                       <img src="${item.image}" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="${item.name}" />
//                       <div>
//                           <h6 class="mb-1">${item.name}</h6>
//                           <p class="mb-0 text-muted fs-2 product-quantity">Cantidad: ${quantity}</p>
//                           <div class="d-flex align-items-center justify-content-between mt-2">
//                               <h6 class="fs-2 fw-semibold mb-0 text-muted product-price">$${totalItemPrice}</h6>
//                           </div>
//                       </div>
//                   </div>
//               </li>`;

//           cartItems.append(newItem);
//       });

//       // Actualizar el contador de productos
//       cartCount.text(`${totalQuantity} productos`);

//       // Actualizar el subtotal
//       cartSubtotal.text(`$${subtotal.toFixed(2)}`);
//   }

//   function loadCartFromLocalStorage() {
//       var cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
//       renderCart(cart);
//   }
// });

$(document).ready(function () {
  // Cargar carrito desde localStorage al iniciar
  loadCartFromLocalStorage();

  // Manejar el evento de añadir al carrito
  $(".btn-add-to-cart").click(function () {
    var productId = $(this).data("product-id");
    var productName = $(this).data("product-name");
    var productPrice = parseFloat($(this).data("product-price"));
    var productImage = $(this).data("product-image");
    var quantity = parseInt($("#cantidad_repuesto").val()) || 1; // Si no se proporciona cantidad, usar 1 por defecto

    // Añadir el producto al carrito
    addToCart(productId, productName, productPrice, productImage, quantity);
  });

  function addToCart(id, name, price, image, quantity) {
    var cartItems = $("#cart-items");
    var cartCount = $("#cart-count");
    var cartSubtotal = $("#cart-subtotal");

    // Obtener el carrito actual desde localStorage o crear uno nuevo
    var cart = JSON.parse(localStorage.getItem("shoppingCart")) || [];

    // Verificar si el producto ya está en el carrito
    var existingItemIndex = cart.findIndex((item) => item.id === id);
    if (existingItemIndex !== -1) {
      // Actualizar la cantidad y el precio del producto existente
      cart[existingItemIndex].quantity += quantity;
    } else {
      // Añadir un nuevo producto al carrito
      cart.push({
        id: id,
        name: name,
        price: price,
        image: image,
        quantity: quantity,
      });
    }

    // Guardar el carrito actualizado en localStorage
    localStorage.setItem("shoppingCart", JSON.stringify(cart));

    // Sincronizar con el servidor si el usuario está logueado
    syncCartWithServer(cart);

    // Actualizar la UI del carrito
    renderCart(cart);
  }

  function renderCart(cart) {
    var cartItems = $("#cart-items");
    var cartCount = $("#cart-count");
    var cartSubtotal = $("#cart-subtotal");

    cartItems.empty(); // Limpiar la lista actual de productos
    var totalQuantity = 0;
    var subtotal = 0;

    cart.forEach(function (item) {
      var quantity = item.quantity || 1; // Si la cantidad es null o undefined, usar 1 por defecto
      var totalItemPrice = (item.price * quantity).toFixed(2);
      totalQuantity += quantity;
      subtotal += parseFloat(totalItemPrice);

      var newItem = `
                <li class="pb-7" data-product-id="${item.id}">
                    <div class="d-flex align-items-center">
                        <img src="${item.image}" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="${item.name}" />
                        <div>
                            <h6 class="mb-1">${item.name}</h6>
                            <p class="mb-0 text-muted fs-2 product-quantity">Cantidad: ${quantity}</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted product-price">$${totalItemPrice}</h6>
                            </div>
                        </div>
                    </div>
                </li>`;

      cartItems.append(newItem);
    });

    // Actualizar el contador de productos
    cartCount.text(`${totalQuantity} productos`);

    // Actualizar el subtotal
    cartSubtotal.text(`$${subtotal.toFixed(2)}`);
  }

  function loadCartFromLocalStorage() {
    var cart = JSON.parse(localStorage.getItem("shoppingCart")) || [];
    renderCart(cart);
  }

      // Sincronizar carrito con el servidor al iniciar sesión o registrarse
      function syncCartWithServer(userId) {
        var cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];

        $.ajax({
            url: 'ajax/carrito.ajax.php',
            method: 'POST',
            data: {
                action: 'syncCart',
                userId: userId,
                cart: cart
            },
            success: function(response) {
                console.log('Carrito sincronizado con el servidor:', response);
            },
            error: function(xhr, status, error) {
                console.error('Error al sincronizar el carrito:', error);
            }
        });
    }
});
