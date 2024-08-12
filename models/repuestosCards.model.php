<?php
require_once "conexion.php";

class ModeloRepuestosCards
{
  public static function mdlObtenerRepuestosFiltrados($idMotor, $idCategoria)
  {
    // Conectar a la base de datos
    $stmt = Conexion::conectar()->prepare("
        SELECT r.*
        FROM repuestos r
        INNER JOIN modelo_repuestos mr ON r.id_repuesto = mr.id_repuesto
        INNER JOIN motores m ON mr.id_modelo = m.id_modelo
        WHERE m.id_motor = :idMotor AND r.id_categoria = :idCategoria
    ");

    // Enlazar parámetros
    $stmt->bindParam(":idMotor", $idMotor, PDO::PARAM_INT);
    $stmt->bindParam(":idCategoria", $idCategoria, PDO::PARAM_INT);

    // Ejecutar la consulta
    $stmt->execute();

    // Retornar los resultados
    return $stmt->fetchAll();
  }
  

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

/*=============================================
Obtener información de un repuesto por ID
=============================================*/
static public function mdlObtenerRepuestoPorId($idRepuesto) {
  $stmt = Conexion::conectar()->prepare("
      SELECT 
          r.*, 
          c.nombre_categoria 
      FROM 
          repuestos r 
      INNER JOIN 
          categorias c 
      ON 
          r.id_categoria = c.id_categoria 
      WHERE 
          r.id_repuesto = :id_repuesto
  ");
  $stmt->bindParam(":id_repuesto", $idRepuesto, PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetch();
}

}
