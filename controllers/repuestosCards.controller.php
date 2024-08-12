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
  public static function ctrMostrarRepuestos($filtros) {
    $tabla = "repuestos";
    return ModeloRepuestosCards::mdlMostrarRepuestos($tabla, $filtros);
}
}
