<!-- Columna Izquierda: Formulario de Filtros -->
<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Filtrar Repuestos</h5>
    </div>
    <div class="card-body">
      <form id="formFiltrosRepuestos" method="GET" action="recambios">
        <input type="hidden" id="listaFiltros" name="listaFiltros" value="">

        <!-- Selección de Marca -->
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

        <!-- Selección de Modelo -->
        <div class="mb-3">
          <label for="filtroModelo" class="form-label">Modelo del Vehículo</label>
          <select class="form-select" id="filtroModelo" name="idModelo">
            <option value="" selected disabled>Seleccione un Modelo</option>
            <!-- Opciones generadas dinámicamente -->
          </select>
        </div>

        <!-- Selección de Motor -->
        <div class="mb-3">
          <label for="filtroMotor" class="form-label">Motor del Vehículo</label>
          <select class="form-select" id="filtroMotor" name="idMotor">
            <option value="" selected disabled>Seleccione un Motor</option>
            <!-- Opciones generadas dinámicamente -->
          </select>
        </div>

        <!-- Botones de Acción -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="reset" id="btnResetearFiltros" class="btn btn-secondary me-md-2">Resetear Filtros</button>
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>

      </form>
    </div>
  </div>
</div>
