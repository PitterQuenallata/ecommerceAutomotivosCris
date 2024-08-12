<?php

class ControladorCarrito
{

    public function ctrSincronizarCarrito($userId, $cart)
    {
        foreach ($cart as $item) {
            $repuestoId = $item['id'];
            $cantidad = $item['quantity'];
            $precioUnitario = $item['price'];

            $resultado = ModeloCarrito::mdlGuardarCarrito("carritos", $userId, $repuestoId, $cantidad, $precioUnitario);

            if ($resultado != "ok") {
                echo "Error al sincronizar el carrito: " . $resultado;
                break;
            }
        }

        if ($resultado == "ok") {
            echo "Carrito sincronizado correctamente.";
        }
    }
}
