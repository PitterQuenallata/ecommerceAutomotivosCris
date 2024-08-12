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




echo '<div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">';

// Página contenedora
echo '<input type="hidden" id="urlPath" value="' . $path . '">';

// Verificar si la ruta es de login, register o ingresar
if ($routesArray[0] == "login" || $routesArray[0] == "register") {
    
    if ($routesArray[0] == "register") {
        include "pages/login/register.php";
    }else {
        include "pages/login/login.php";
    }
} else {
    // Incluye la barra de navegación
    include "modules/navbar.php";

    // Incluir el menú lateral solo si es admin
    if (isset($_SESSION["admin"])) {
        include "modules/sidebar.php";
    }

    /*=============================================
    Filtro de lista blanca
    =============================================*/
    if ($routesArray[0] == "recambios" ||
        $routesArray[0] == "repuestos" ||
        $routesArray[0] == "repuesto" ||
        $routesArray[0] == "admin" ||
        $routesArray[0] == "salir") {

        include "pages/" . $routesArray[0] . "/" . $routesArray[0] . ".php";

    } elseif ($routesArray[0] == "checkout") {
        // Verificar si el usuario está registrado
        if (isset($_SESSION["cliente"]) || isset($_SESSION["usuario"])) {
            include "pages/checkout/checkout.php";
        } else {
            if (!isset($_SESSION['cliente']) && $routesArray[0] == 'checkout') {
                $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];  // Guardar la URL actual en una variable de sesión
                header('Location: ' . $path . 'login');  // Redirigir a la página de inicio de sesión
                exit();
            }
            
        }

    } elseif (empty($routesArray[0])) {
        // Si no se especifica ninguna ruta en la URL, cargar la página de inicio por defecto
        include "pages/home/home.php";

    } else {
        // Página 404 si la ruta no está permitida
        include "pages/404/404.php"; 
    }
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
