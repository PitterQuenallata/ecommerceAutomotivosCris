<div class="card shadow-none border">
  <div class="card-body p-4">
    <div class="row">
      <!-- Columna izquierda: Imagen del producto -->
      <div class="col-lg-6">
        <div id="sync1" class="owl-carousel owl-theme">
          <div class="item rounded overflow-hidden">
            <img src="<?php echo $repuesto['img_repuesto']; ?>" alt="Imagen del producto" class="img-fluid">
          </div>
        </div>
      </div>

      <!-- Columna derecha: Detalles del producto -->
      <div class="col-lg-6">
        <div class="shop-content">
          <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold rounded-3">
              <?php echo $repuesto['stock_repuesto'] > 0 ? 'En Stock' : 'Sin Stock'; ?>
            </span>
            <span class="fs-2"><?php echo $repuesto['marca_repuesto']; ?></span>
          </div>
          <h4 class="fw-semibold"><?php echo $repuesto['nombre_repuesto']; ?></h4>
          <p class="mb-3"><?php echo $repuesto['descripcion_repuesto']; ?></p>
          <h4 class="fw-semibold mb-3">
            <del class="fs-5 text-muted">$<?php echo number_format($repuesto['precio_repuesto'] * 2, 2); ?></del>
            $<?php echo number_format($repuesto['precio_repuesto'], 2); ?>
          </h4>

          <div class="d-flex align-items-center gap-7 pb-7 mb-7 border-bottom">
            <h6 class="mb-0 fs-4 fw-semibold">Cantidad:</h6>
            <div class="input-group input-group-sm rounded">
              <button class="btn min-width-40 py-0 border-end border-secondary fs-5 text-secondary minus" type="button" id="add1">
                <i class="ti ti-minus"></i>
              </button>
              <input type="text" class="min-width-40 border border-secondary text-secondary fs-4 fw-semibold text-center " value="1" id="cantidad_repuesto" min="1">

              <button class="btn min-width-40 py-0 border-start border-secondary fs-5 text-secondary" type="button" id="addo2">
                <i class="ti ti-plus"></i>
              </button>
            </div>
          </div>

          <div class="d-flex align-items-center gap-7 pb-7 mb-7 border-bottom">
            <h5>Precio total: $<span id="precio_total"><?php echo number_format($repuesto['precio_repuesto'], 2); ?></span></h5>
          </div>

          <div class="d-sm-flex align-items-center gap-3 pt-8 mb-7">
            <a id="btnComprar" class="btn d-block btn-primary px-5 py-8 mb-2 mb-sm-0">Comprar</a>
            <a  href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
              class="btn d-block btn-danger px-7 py-8 btn-add-to-cart"
              data-product-id="<?php echo $repuesto['id_repuesto']; ?>"
              data-product-name="<?php echo $repuesto['nombre_repuesto']; ?>"
              data-product-price="<?php echo $repuesto['precio_repuesto']; ?>"
              data-product-image="<?php echo $repuesto['img_repuesto']; ?>">
              Añadir al Carrito
            </a>

          </div>
          <p class="mb-0">Envíos disponibles</p>
          <a href="javascript:void(0)">¿Tiempo de envío?</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var idRepuesto = <?php echo $idRepuesto; ?>; // ID del repuesto que obtienes del PHP

  $('#btnComprar').click(function() {
    var cantidad = $('#cantidad_repuesto').val(); // Obtener la cantidad seleccionada
    window.location.href = "checkout?id_repuesto=" + idRepuesto + "&cantidad=" + cantidad;
  });

  $('#btnCarrito').click(function() {
    var cantidad = $('#cantidad_repuesto').val(); // Obtener la cantidad seleccionada
    window.location.href = "cart?id_repuesto=" + idRepuesto + "&cantidad=" + cantidad;
  });
</script>