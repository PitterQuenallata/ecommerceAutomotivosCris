<?php

// Capturar los valores de la URL
$idMarca = isset($_GET['idMarca']) ? $_GET['idMarca'] : null;
$idModelo = isset($_GET['idModelo']) ? $_GET['idModelo'] : null;
$idMotor = isset($_GET['idMotor']) ? $_GET['idMotor'] : null;

// Obtener los nombres de marca, modelo y motor
if ($idMarca && $idModelo && $idMotor) {
    $nombres = ControladorRecambios::ctrObtenerNombres($idMarca, $idModelo, $idMotor);
    $nombreMarca = $nombres['nombreMarca'];
    $nombreModelo = $nombres['nombreModelo'];
    $nombreMotor = $nombres['nombreMotor'];
} else {
    $nombreMarca = "Marca no seleccionada";
    $nombreModelo = "Modelo no seleccionado";
    $nombreMotor = "Motor no seleccionado";
}

?>


<div class="body-wrapper">
  <div class="container-fluid">

    <?php include "modules/cabecera.php"; ?>

    <!-- Sección de Categorías y Filtros -->
    <div class="row">
    <?php
    $categorias = ControladorCategorias::ctrMostrarCategorias();
    foreach ($categorias as $categoria) {
        echo '
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card rounded-2 overflow-hidden" onclick="redirigirAProductos(' . $categoria["id_categoria"] . ')">
                <div class="position-relative">
                    <img src="' . $path . 'views/dist/images/products/s4.jpg" class="card-img-top rounded-0" alt="' . $categoria["nombre_categoria"] . '">
                </div>
                <div class="card-body p-4 text-center">
                    <h5 class="fw-semibold fs-4 mb-2">' . $categoria["nombre_categoria"] . '</h5>
                </div>
            </div>
        </div>
        ';
    }
    ?>
</div>



  </div>
</div>


<script>
// Función para redirigir a la página de productos con los parámetros de filtro
function redirigirAProductos(idCategoria) {
    const idMarca = localStorage.getItem("filtroMarca");
    const idModelo = localStorage.getItem("filtroModelo");
    const idMotor = localStorage.getItem("filtroMotor");

    let queryParams = [];

    if (idMarca) queryParams.push("idMarca=" + encodeURIComponent(idMarca));
    if (idModelo) queryParams.push("idModelo=" + encodeURIComponent(idModelo));
    if (idMotor) queryParams.push("idMotor=" + encodeURIComponent(idMotor));
    if (idCategoria) queryParams.push("idCategoria=" + encodeURIComponent(idCategoria));

    const queryString = queryParams.join("&");
    const url = "repuestos?" + queryString;

    window.location.href = url; // Redirigir a la página de productos con los filtros en la URL
}
</script>