<?php

require_once "../controllers/carrito.controller.php";
require_once "../models/carrito.model.php";

if (isset($_POST['action']) && $_POST['action'] == 'syncCart') {
    $userId = $_POST['userId'];
    $cart = $_POST['cart'];

    $respuesta = ControladorCarrito::ctrSincronizarCarrito($userId, $cart);

    echo json_encode($respuesta);
}
