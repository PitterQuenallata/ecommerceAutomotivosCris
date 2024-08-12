<?php

require_once "conexion.php";

class ModeloCarrito {


    /*=============================================
    Guardar o Actualizar Carrito
    =============================================*/
    static public function mdlGuardarCarrito($tabla, $userId, $cart) {
        $stmt = Conexion::conectar()->prepare("REPLACE INTO $tabla (id_usuario, carrito) VALUES (:id_usuario, :carrito)");
        
        $stmt->bindParam(":id_usuario", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":carrito", json_encode($cart), PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    AGREGAR PRODUCTO AL CARRITO
    =============================================*/
    static public function mdlAgregarProductoAlCarrito($idCliente, $idProducto, $cantidad, $precioUnitario) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO carritos (id_cliente, id_producto, cantidad, precio_unitario) VALUES (:id_cliente, :id_producto, :cantidad, :precio_unitario)");

        $stmt->bindParam(":id_cliente", $idCliente, PDO::PARAM_INT);
        $stmt->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":precio_unitario", $precioUnitario, PDO::PARAM_STR);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    OBTENER CARRITO DE UN CLIENTE
    =============================================*/
    static public function mdlObtenerCarrito($idCliente) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM carritos WHERE id_cliente = :id_cliente");

        $stmt->bindParam(":id_cliente", $idCliente, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    ACTUALIZAR CANTIDAD DE UN PRODUCTO EN EL CARRITO
    =============================================*/
    static public function mdlActualizarCantidadProducto($idCarrito, $nuevaCantidad) {
        $stmt = Conexion::conectar()->prepare("UPDATE carritos SET cantidad = :cantidad WHERE id_carrito = :id_carrito");

        $stmt->bindParam(":cantidad", $nuevaCantidad, PDO::PARAM_INT);
        $stmt->bindParam(":id_carrito", $idCarrito, PDO::PARAM_INT);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    ELIMINAR PRODUCTO DEL CARRITO
    =============================================*/
    static public function mdlEliminarProductoDelCarrito($idCarrito) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM carritos WHERE id_carrito = :id_carrito");

        $stmt->bindParam(":id_carrito", $idCarrito, PDO::PARAM_INT);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

