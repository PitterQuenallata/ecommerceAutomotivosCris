<?php

class ControladorCarrito {

    /*=============================================
    AGREGAR PRODUCTO AL CARRITO
    =============================================*/
    static public function ctrAgregarProductoAlCarrito($idCliente, $idProducto, $cantidad, $precioUnitario) {
        if (!isset($idCliente) || !isset($idProducto) || !isset($cantidad) || !isset($precioUnitario)) {
            return "error";
        }

        $respuesta = ModeloCarrito::mdlAgregarProductoAlCarrito($idCliente, $idProducto, $cantidad, $precioUnitario);

        return $respuesta;
    }

    /*=============================================
    OBTENER CARRITO DE UN CLIENTE
    =============================================*/
    static public function ctrObtenerCarrito($idCliente) {
        if (!isset($idCliente)) {
            return [];
        }

        $respuesta = ModeloCarrito::mdlObtenerCarrito($idCliente);

        return $respuesta;
    }

    /*=============================================
    ACTUALIZAR CANTIDAD DE UN PRODUCTO EN EL CARRITO
    =============================================*/
    static public function ctrActualizarCantidadProducto($idCarrito, $nuevaCantidad) {
        if (!isset($idCarrito) || !isset($nuevaCantidad)) {
            return "error";
        }

        $respuesta = ModeloCarrito::mdlActualizarCantidadProducto($idCarrito, $nuevaCantidad);

        return $respuesta;
    }

    /*=============================================
    ELIMINAR PRODUCTO DEL CARRITO
    =============================================*/
    static public function ctrEliminarProductoDelCarrito($idCarrito) {
        if (!isset($idCarrito)) {
            return "error";
        }

        $respuesta = ModeloCarrito::mdlEliminarProductoDelCarrito($idCarrito);

        return $respuesta;
    }

        /*=============================================
    Sincronizar Carrito
    =============================================*/
    static public function ctrSincronizarCarrito($userId, $cart) {
        $tabla = "carritos";
        
        // Llamar al modelo para guardar o actualizar el carrito en la base de datos
        $respuesta = ModeloCarrito::mdlGuardarCarrito($tabla, $userId, $cart);

        return $respuesta;
    }
}

