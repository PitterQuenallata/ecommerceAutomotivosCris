
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">
          <?php echo "Marca: $nombreMarca, Modelo: $nombreModelo, Motor: $nombreMotor"; ?>
        </h4>
        <h5 class="fw-normal mb-4">
          <?php echo "Repuesto: " . $repuesto['nombre_repuesto']; ?>
        </h5>
        <h5 class="fw-normal mb-4">
          <?php echo "Precio: $" . number_format($repuesto['precio_repuesto'], 2); ?>
        </h5>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="/">Inicio</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="javascript:void(0)"><?php echo $repuesto["nombre_categoria"]; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $repuesto['nombre_repuesto']; ?></li>
          </ol>
        </nav>
      </div>
      <div class="col-3">
        <div class="text-center mb-n5">
          <img src="<?php echo $path ?>views/dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
        </div>
      </div>
    </div>
  </div>
</div>
