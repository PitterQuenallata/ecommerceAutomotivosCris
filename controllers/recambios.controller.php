<?php

class ControladorRecambios {

    // Método para obtener los nombres de marca, modelo y motor
    public static function ctrObtenerNombres($idMarca, $idModelo, $idMotor) {
        return ModeloRecambios::mdlObtenerNombres($idMarca, $idModelo, $idMotor);
    }

}
