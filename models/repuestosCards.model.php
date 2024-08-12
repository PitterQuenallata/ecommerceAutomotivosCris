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
  public static function mdlMostrarMotores($idModelo)
  {
    $stmt = Conexion::conectar()->prepare("SELECT id_motor, nombre_motor FROM motores WHERE id_modelo = :idModelo");
    $stmt->bindParam(":idModelo", $idModelo, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
  }

// Función para mostrar repuestos basados en filtros
public static function mdlMostrarRepuestos($tabla, $filtros) {

  $sql = "SELECT repuestos.* FROM $tabla repuestos";

  $conditions = [];
  $params = [];

  // Filtrar por Categoría
  if (!empty($filtros['idCategoria'])) {
      $conditions[] = "id_categoria = :idCategoria";
      $params[':idCategoria'] = $filtros['idCategoria'];
  }

  // Filtrar por Marca (mediante modelo)
  if (!empty($filtros['idMarca'])) {
      $sql .= " INNER JOIN modelo_repuestos mr ON repuestos.id_repuesto = mr.id_repuesto";
      $sql .= " INNER JOIN modelos mo ON mr.id_modelo = mo.id_modelo";
      $conditions[] = "mo.id_marca = :idMarca";
      $params[':idMarca'] = $filtros['idMarca'];
  }

  // Filtrar por Modelo
  if (!empty($filtros['idModelo'])) {
      $sql .= " AND mr.id_modelo = :idModelo";
      $params[':idModelo'] = $filtros['idModelo'];
  }

  // Filtrar por Motor
  if (!empty($filtros['idMotor'])) {
      $sql .= " INNER JOIN motores mo ON mo.id_modelo = mr.id_modelo";
      $conditions[] = "mo.id_motor = :idMotor";
      $params[':idMotor'] = $filtros['idMotor'];
  }

  // Agregar las condiciones a la consulta
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
