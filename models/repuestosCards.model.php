<?php
require_once "conexion.php";

class ModeloRepuestosCards
{

  // Método para obtener las marcas de vehículos
  public static function mdlMostrarMarcas()
  {
    $stmt = Conexion::conectar()->prepare("SELECT id_marca, nombre_marca FROM marcas");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  // Método para obtener los modelos basado en la marca
  public static function mdlMostrarModelos($idMarca)
  {
    $stmt = Conexion::conectar()->prepare("
          SELECT m.id_modelo, m.nombre_modelo 
          FROM modelos m
          WHERE m.id_marca = :id_marca
      ");
    $stmt->bindParam(":id_marca", $idMarca, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  // Método para obtener los motores basado en el modelo
  public static function mdlMostrarMotores($idModelo) {
    $stmt = Conexion::conectar()->prepare("SELECT id_motor, nombre_motor FROM motores WHERE id_modelo = :idModelo");
    $stmt->bindParam(":idModelo", $idModelo, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

  // Método para obtener repuestos basados en los filtros de categoría y motor
  public static function mdlMostrarRepuestos($filtros)
  {
    $sql = "SELECT repuestos.* FROM repuestos";

    $conditions = [];
    $params = [];

    // Si se selecciona una categoría
    if (!empty($filtros['idCategoria'])) {
      $conditions[] = "id_categoria = :idCategoria";
      $params[':idCategoria'] = $filtros['idCategoria'];
    }

    // Si se selecciona un motor
    if (!empty($filtros['idMotor'])) {
      $sql .= " 
        INNER JOIN modelo_repuestos mr ON repuestos.id_repuesto = mr.id_repuesto
        INNER JOIN motores mot ON mr.id_modelo = mot.id_modelo";
      $conditions[] = "mot.id_motor = :idMotor";
      $params[':idMotor'] = $filtros['idMotor'];
    }

    // Si hay condiciones, agregarlas a la consulta
    if ($conditions) {
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = Conexion::conectar()->prepare($sql);

    foreach ($params as $key => $value) {
      $stmt->bindParam($key, $value, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll();
  }
}
