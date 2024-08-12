<?php

require_once "conexion.php"; // Asegúrate de que este archivo exista y esté configurado correctamente.

class ModeloRecambios
{

  // Método para obtener los nombres basados en las IDs
  public static function mdlObtenerNombres($idMarca, $idModelo, $idMotor)
  {
    $stmt = Conexion::conectar()->prepare("
            SELECT 
                m.nombre_marca AS nombreMarca, 
                mo.nombre_modelo AS nombreModelo, 
                mot.nombre_motor AS nombreMotor
            FROM marcas m
            LEFT JOIN modelos mo ON m.id_marca = mo.id_marca
            LEFT JOIN motores mot ON mo.id_modelo = mot.id_modelo
            WHERE m.id_marca = :idMarca AND mo.id_modelo = :idModelo AND mot.id_motor = :idMotor
        ");

    $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
    $stmt->bindParam(":idModelo", $idModelo, PDO::PARAM_INT);
    $stmt->bindParam(":idMotor", $idMotor, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); // Devolverá un array asociativo con los nombres
  }


}
