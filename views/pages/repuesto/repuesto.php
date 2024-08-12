<?php




// // Capturar los valores de la URL
$idMarca = isset($_GET['idMarca']) ? $_GET['idMarca'] : null;
$idModelo = isset($_GET['idModelo']) ? $_GET['idModelo'] : null;
$idMotor = isset($_GET['idMotor']) ? $_GET['idMotor'] : null;
$idCategoria = isset($_GET['idCategoria']) ? $_GET['idCategoria'] : null;

$nombres = ControladorRecambios::ctrObtenerNombres($idMarca, $idModelo, $idMotor);
$nombreMarca = $nombres['nombreMarca'] ?? "Marca no seleccionada";
$nombreModelo = $nombres['nombreModelo'] ?? "Modelo no seleccionado";
$nombreMotor = $nombres['nombreMotor'] ?? "Motor no seleccionado";
// Capturar los valores de la URL
$idRepuesto = isset($_GET['idRepuesto']) ? $_GET['idRepuesto'] : null;

if ($idRepuesto) {
  $repuesto = ControladorRepuestosCards::ctrObtenerRepuestoPorId($idRepuesto);
} else {
  // Manejar el caso en el que no se haya proporcionado un ID de repuesto
  echo "ID de repuesto no proporcionado.";
  exit;
}
// Verificar si los valores se recibieron correctamente (puedes eliminar esto si no lo necesitas)
//var_dump($idMarca, $idModelo, $idMotor, $idCategoria, $idRepuesto);

// A partir de aquí, puedes utilizar estas variables para cargar la información correspondiente del producto.
?>

<div class="body-wrapper">
  <div class="container-fluid">
    <?php include "modules/cabecera.php"; ?>
    <div class="shop-detail">

      <?php include "modules/productDetail.php"; ?>

      <?php include "modules/description.php"; ?>

    </div>
  </div>
</div>

<script src="<?php echo $path ?>views/dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="<?php echo $path ?>views/dist/js/productDetail.js"></script>
<script src="<?php echo $path ?>views/dist/js/ecommerce/repuestoDetail.js"></script>




