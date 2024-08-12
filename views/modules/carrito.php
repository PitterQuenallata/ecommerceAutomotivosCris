<!--  Shopping Cart -->
<div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Carrito de Compras</h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm" id="cart-count">0 productos</span>
    </div>
    <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
        <ul class="mb-0" id="cart-items">
            <!-- Los productos se añadirán dinámicamente aquí -->
        </ul>
        <div class="align-bottom">
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Sub Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3" id="cart-subtotal">$0.00</span>
                </div>
            </div>
            <a href="checkout" class="btn btn-outline-primary w-100">Ir a la compra</a>
        </div>
    </div>
</div>
