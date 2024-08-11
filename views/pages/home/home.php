<div class="body-wrapper">
  <div class="container-fluid">
    <!-- Bienvenida y Breadcrumb -->
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
      <div class="card-body px-4 py-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8">Bienvenidos</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a class="text-muted" href="home">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
              </ol>
            </nav>
          </div>
          <div class="col-3 text-center">
            <img src="<?php $path ?>views/dist/images/breadcrumb/ChatBc.png" alt="Breadcrumb Image" class="img-fluid mb-n4">
          </div>
        </div>
      </div>
    </div>

    <!-- Sección de Categorías y Filtros -->
    <div class="card position-relative overflow-hidden">
      <div class="shop-part d-flex w-100">

        <!-- Filtros (Sidebar) -->
        <div class="shop-filters flex-shrink-0 border-end d-none d-lg-block">
          <div class="list-group pt-2 border-bottom rounded-0">
            <h6 class="my-3 mx-4 fw-semibold">Categorías</h6>
            <div class="mb-3 mx-4">
              <select class="form-select" id="filtroCategoria" name="filtroCategoria">
                <option selected disabled>Elige una Categoría</option>
                <?php
                $categorias = ControladorCategorias::ctrMostrarCategorias();
                foreach ($categorias as $categoria) {
                  echo '<option value="' . $categoria["id_categoria"] . '">' . $categoria["nombre_categoria"] . '</option>';
                }
                ?>
              </select>
            </div>
          </div>

          <div class="list-group pt-2 border-bottom rounded-0">
            <h6 class="my-3 mx-4 fw-semibold">Filtros</h6>
            <form id="formFiltrosRepuestos" method="POST">
              <div class="mb-3 mx-4">
                <label for="filtroMarca" class="form-label">Marca del Vehículo</label>
                <select class="form-select" id="filtroMarca" name="filtroMarca">
                  <option selected disabled>Elige una Marca</option>
                  <?php
                  $marcas = ControladorRepuestosCards::ctrMostrarMarcas();
                  foreach ($marcas as $marca) {
                    echo '<option value="' . $marca["id_marca"] . '">' . $marca["nombre_marca"] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3 mx-4">
                <label for="filtroModelo" class="form-label">Modelo del Vehículo</label>
                <select class="form-select" id="filtroModelo" name="filtroModelo">
                  <option selected disabled>Elige un Modelo</option>
                  <!-- Opciones generadas dinámicamente -->
                </select>
              </div>

              <div class="mb-3 mx-4">
                <label for="filtroMotor" class="form-label">Motor del Vehículo</label>
                <select class="form-select" id="filtroMotor" name="filtroMotor">
                  <option selected disabled>Elige un Motor</option>
                  <!-- Opciones generadas dinámicamente -->
                </select>
              </div>

              <div class="p-4">
                <button id="btnResetearFiltros" class="btn btn-secondary w-100">Resetear Filtros</button>
              </div>

            </form>
          </div>
        </div>


        <!-- Sección de Productos -->
        <div class="card-body p-4 pb-0">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#offcanvasFiltros" role="button" aria-controls="offcanvasFiltros">
              <i class="ti ti-menu-2 fs-6"></i>
            </a>
            <h5 class="fs-5 fw-semibold mb-0 d-none d-lg-block">Repuestos</h5>
            <form class="position-relative">
              <input type="text" class="form-control search-input py-2 ps-5" id="buscarRepuesto" placeholder="Buscar Repuesto">
              <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
          </div>
          <div class="row" id="contenedorRepuestos">
            <div class="col-sm-6 col-xl-4">
              <div class="card hover-img overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="<?php $path ?>views/dist/images/products/suspension.png" class="card-img-top rounded-0" alt="Repuesto 1"></a>
                  <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Añadir al Carrito"><i class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">Repuesto 1</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">$285</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-4">
              <div class="card hover-img overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="<?php $path ?>views/dist/images/repuestos/suspension.png" class="card-img-top rounded-0" alt="Repuesto 2"></a>
                  <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Añadir al Carrito"><i class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">Repuesto 2</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">$650</h6>
                  </div>
                </div>
              </div>
            </div>
            <!-- Aquí se generarán dinámicamente los repuestos -->
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  //   $(document).ready(function () {
  //   // Inicializar el plugin backToTop
  //   $.backToTop({
  //     backgroundColor: "#007bff", // Color de fondo del botón
  //     textColor: "#ffffff", // Color del texto
  //     position: "right", // Posición del botón: 'right' o 'left'
  //     fadeIn: 400, // Tiempo de fadeIn
  //     fadeOut: 400, // Tiempo de fadeOut
  //     scrollDuration: 1000, // Duración del scroll hacia arriba
  //     showWhenScrollTopIs: 100, // Mostrar el botón cuando se hace scroll hacia abajo
  //     zIndex: 999, // z-index del botón
  //   });
  // });
</script>