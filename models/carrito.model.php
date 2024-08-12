<?php

require_once "conexion.php";

class ModeloCarrito
{


    /*=============================================
    Guardar o Actualizar Carrito
    =============================================*/
    static public function mdlGuardarCarrito($tabla, $userId, $repuestoId, $cantidad, $precioUnitario)
    {
        try {
            // Conectar a la base de datos
            $stmt = Conexion::conectar()->prepare("
                INSERT INTO $tabla (id_cliente, id_repuesto, cantidad_carrito, precio_unitario_carrito)
                VALUES (:id_cliente, :id_repuesto, :cantidad_carrito, :precio_unitario_carrito)
                ON DUPLICATE KEY UPDATE 
                    cantidad_carrito = :cantidad_carrito,
                    precio_unitario_carrito = :precio_unitario_carrito,
                    fecha_agregado_carrito = NOW()
            ");

            // Vincular los parámetros
            $stmt->bindParam(":id_cliente", $userId, PDO::PARAM_INT);
            $stmt->bindParam(":id_repuesto", $repuestoId, PDO::PARAM_INT);
            $stmt->bindParam(":cantidad_carrito", $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":precio_unitario_carrito", $precioUnitario, PDO::PARAM_STR);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            // Manejo de errores de PDO
            return "error: " . $e->getMessage();
        }
    }
}
