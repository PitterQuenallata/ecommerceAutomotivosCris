<?php
class ControladorRepuestosCards
{

  // Método para mostrar las marcas de vehículos
  public static function ctrMostrarMarcas()
  {
    return ModeloRepuestosCards::mdlMostrarMarcas();
  }

  // Método para mostrar modelos basado en la marca
  public static function ctrMostrarModelos($idMarca)
  {
    return ModeloRepuestosCards::mdlMostrarModelos($idMarca);
  }

  // Método para mostrar motores basado en el modelo
  public static function ctrMostrarMotores($idModelo)
  {
    return ModeloRepuestosCards::mdlMostrarMotores($idModelo);
  }

  // Método para mostrar repuestos basados en los filtros
  public static function ctrObtenerRepuestosFiltrados($idMotor, $idCategoria)
  {
    return ModeloRepuestosCards::mdlObtenerRepuestosFiltrados($idMotor, $idCategoria);
  }

      /*=============================================
    Obtener información de un repuesto por ID
    =============================================*/
    static public function ctrObtenerRepuestoPorId($idRepuesto) {
      $respuesta= ModeloRepuestosCards::mdlObtenerRepuestoPorId($idRepuesto);
      return $respuesta;

  }
}
