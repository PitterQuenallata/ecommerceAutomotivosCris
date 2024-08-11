<?php
// Iniciar buffering y sesiones
ob_start();
session_start();

// Ruta principal
$path = TemplateController::path();

// Capturar las rutas de la URL
$routesArray = explode("/", $_SERVER["REQUEST_URI"]);
array_shift($routesArray); // Elimina el primer elemento que está vacío
foreach ($routesArray as $key => $value) {
    $routesArray[$key] = explode("?", $value)[0]; // Remueve los parámetros de la URL
}

// Incluye la cabecera
include "modules/header.php";

// Página contenedora
echo '<input type="hidden" id="urlPath" value="' . $path . '">';
echo '<div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">';

// Incluye la barra de navegación
include "modules/navbar.php";

// Incluir el menú lateral solo si es admin
if (isset($_SESSION["admin"])) {
    include "modules/sidebar.php";
}

// Manejo de rutas con filtro de lista blanca basado en tus carpetas
if (!empty($routesArray[0])) {

    if (file_exists("pages/" . $routesArray[0] . "/" . $routesArray[0] . ".php")) {
        include "pages/" . $routesArray[0] . "/" . $routesArray[0] . ".php";
    } else {
        include "pages/404/404.php"; // Página 404 si la ruta no está permitida
    }

} else {
    include "pages/home/home.php"; // Página de inicio por defecto
}

// Cierra el contenedor principal
echo '</div>';

// Incluye el carrito, scripts y footer
include "modules/trasparentsidebar.php";
include "modules/carrito.php";
include "modules/mobilenavbar.php";
include "modules/scripts.php";
include "modules/footerEnd.php";
?>
