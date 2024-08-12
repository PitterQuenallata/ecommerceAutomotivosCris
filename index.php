<?php
//deputar errores
ini_set("display_errors", 1);
ini_set("log-errors", 1);
ini_set("error-log", "C:/xampp/htdocs/ecommerceAutomotivosCris/php_error.log");


/*=============================================
Require
=============================================*/
require_once "models/conexion.php";
require_once "controllers/template.controller.php";

require_once "controllers/marcas.controller.php";
require_once "controllers/modelos.controller.php";
require_once "controllers/motores.controller.php";
require_once "controllers/categorias.controller.php";
require_once "controllers/repuestosCards.controller.php";
require_once "controllers/recambios.controller.php";
require_once "controllers/repuestosCards.controller.php";
require_once "controllers/clientes.controller.php";
require_once "controllers/carrito.controller.php";

require_once "models/marcas.model.php";
require_once "models/modelos.model.php";
require_once "models/motores.model.php";
require_once "models/categorias.model.php";
require_once "models/repuestosCards.model.php";
require_once "models/recambios.model.php";
require_once "models/repuestosCards.model.php";
require_once "models/clientes.model.php";
require_once "models/carrito.model.php";



/*=============================================
Plantilla
=============================================*/

$index = new TemplateController();
$index -> index();