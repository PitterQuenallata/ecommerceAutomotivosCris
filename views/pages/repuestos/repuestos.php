<?php

// Capturar los valores de la URL
$idMarca = isset($_GET['idMarca']) ? $_GET['idMarca'] : null;
$idModelo = isset($_GET['idModelo']) ? $_GET['idModelo'] : null;
$idMotor = isset($_GET['idMotor']) ? $_GET['idMotor'] : null;
$idCategoria = isset($_GET['idCategoria']) ? $_GET['idCategoria'] : null;

// Obtener los nombres de marca, modelo y motor
$nombres = ControladorRecambios::ctrObtenerNombres($idMarca, $idModelo, $idMotor);
$nombreMarca = $nombres['nombreMarca'] ?? "Marca no seleccionada";
$nombreModelo = $nombres['nombreModelo'] ?? "Modelo no seleccionado";
$nombreMotor = $nombres['nombreMotor'] ?? "Motor no seleccionado";

// Obtener los repuestos filtrados
if ($idMotor && $idCategoria) {
  $repuestos = ControladorRepuestosCards::ctrObtenerRepuestosFiltrados($idMotor, $idCategoria);
} else {
  $repuestos = [];
}

?>

<div class="body-wrapper">
  <div class="container-fluid">

    <?php include "modules/cabecera.php"; ?>

    <div class="card position-relative overflow-hidden">
      <div class="shop-part d-flex w-100">

        <!-- Columna Izquierda: Filtros del Formulario -->
        <div class="shop-filters flex-shrink-0 border-end d-none d-lg-block p-4">
          <form id="formFiltrosRepuestosIndependiente" method="GET">
            <div class="mb-3">
              <label for="filtroMarca" class="form-label">Marca del Vehículo</label>
              <select class="form-select" id="filtroMarca" name="idMarca">
                <option value="" selected disabled>Seleccione una Marca</option>
                <?php
                $marcas = ControladorRepuestosCards::ctrMostrarMarcas();
                foreach ($marcas as $marca) {
                  echo '<option value="' . $marca["id_marca"] . '">' . $marca["nombre_marca"] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="filtroModelo" class="form-label">Modelo del Vehículo</label>
              <select class="form-select" id="filtroModelo" name="idModelo">
                <option value="" selected disabled>Seleccione un Modelo</option>
                <!-- Opciones generadas dinámicamente -->
              </select>
            </div>

            <div class="mb-3">
              <label for="filtroMotor" class="form-label">Motor del Vehículo</label>
              <select class="form-select" id="filtroMotor" name="idMotor">
                <option value="" selected disabled>Seleccione un Motor</option>
                <!-- Opciones generadas dinámicamente -->
              </select>
            </div>

            <div class="row mb-2">
              <div class="col">
                <button type="submit" class="btn btn-primary w-100">Buscar</button>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <button type="reset" id="btnResetearFiltros" class="btn btn-secondary w-100">Resetear Filtros</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Columna Derecha: Cards de Repuestos -->
        <div class="card-body p-4 pb-0 flex-grow-1">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
              <i class="ti ti-menu-2 fs-6"></i>
            </a>
            <h5 class="fs-5 fw-semibold mb-0 d-none d-lg-block">Repuestos</h5>
            <form class="position-relative">
              <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Buscar Repuesto">
              <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
          </div>
          <div class="row">
            <?php
            if (!empty($repuestos)) {
              foreach ($repuestos as $repuesto) {
                $url = "repuesto?idMarca={$idMarca}&idModelo={$idModelo}&idMotor={$idMotor}&idCategoria={$idCategoria}&idRepuesto={$repuesto['id_repuesto']}";
                echo '
                  <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card rounded-2 overflow-hidden">
                      <div class="position-relative">
                        <a href="' . $url . '">
                          <img src="' . $repuesto['img_repuesto'] . '" class="card-img-top rounded-0" alt="' . $repuesto['nombre_repuesto'] . '">
                        </a>
                        <a href="javascript:void(0)" 
                           class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3 btn-add-to-cart" 
                           data-bs-toggle="offcanvas" 
                           data-bs-target="#offcanvasRight"
                           aria-controls="offcanvasRight"
                           data-product-id="' . $repuesto['id_repuesto'] . '"
                           data-product-name="' . $repuesto['nombre_repuesto'] . '"
                           data-product-price="' . $repuesto['precio_repuesto'] . '"
                           data-product-image="' . $repuesto['img_repuesto'] . '">
                           <i class="ti ti-basket fs-4"></i>
                        </a>
                      </div>
                      <div class="card-body p-4 text-center">
                        <h5 class="fw-semibold fs-4 mb-2">' . $repuesto['nombre_repuesto'] . '</h5>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center gap-2">
                            <h5 class="fw-semibold fs-4 mb-0">$' . number_format($repuesto['precio_repuesto'], 2) . '</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
            }
            
            
            } else {
              echo '<p>No se encontraron repuestos para los filtros seleccionados.</p>';
            }
            ?>
          </div>


        </div>
      </div>
    </div>

  </div>
</div>


<script src="<?php $path ?>views/dist/js/ecommerce/actualizarFormRespuesto.js"></script>