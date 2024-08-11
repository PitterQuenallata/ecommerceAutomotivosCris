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
                <option selected disabled>Seleccione una categoría</option>
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
              <div class="mb-3 mx-4">
                <label for="filtroMarca" class="form-label">Marca del Vehículo</label>
                <select class="form-select" id="filtroMarca" name="filtroMarca">
                  <option selected disabled>Seleccione una marca</option>
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
          <div id="swup" class="transition-fade">
            <div class="container">
              <div id="contenedorRepuestos" class="row">
                <!-- Aquí se cargarán los elementos de los repuestos -->
              </div>
              <div class="page-load-status">
                <div class="loader">Cargando más repuestos...</div>
                <div class="no-more-results">No hay más resultados</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
