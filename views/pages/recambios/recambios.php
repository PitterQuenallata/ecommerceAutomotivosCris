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
          <div id="contenedorRepuestos" class="row">
            <!-- Aquí se cargarán los elementos de los repuestos -->
          </div>
        </div>