<?php
require_once "../controllers/repuestosCards.controller.php";
require_once "../models/repuestosCards.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si hay filtros enviados por el formulario
    if (isset($_POST['listaFiltros']) && !empty($_POST['listaFiltros'])) {
        // Decodificar la lista de filtros de JSON a un array asociativo
        $filtros = json_decode($_POST['listaFiltros'], true);

        // Imprimir el array de filtros para ver lo que se está recibiendo
        // echo '<pre>';
        // var_dump($filtros);
        // echo '</pre>';

        // Obtener los repuestos basados en los filtros
        $repuestos = ControladorRepuestosCards::ctrMostrarRepuestos($filtros);

        // Imprimir los repuestos obtenidos desde la base de datos
        // echo '<pre>';
        // var_dump($repuestos);
        // echo '</pre>';

        // Aquí es donde normalmente iterarías sobre los $repuestos para mostrarlos en la interfaz
        foreach ($repuestos as $repuesto) {
            echo '
            <div class="col-sm-6 col-xl-4">
                <div class="card hover-img overflow-hidden rounded-2">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="' . $repuesto["img_repuesto"] . '" class="card-img-top rounded-0" alt="' . $repuesto["nombre_repuesto"] . '"></a>
                        <a class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Añadir al Carrito"><i class="ti ti-basket fs-4"></i></a>
                    </div>
                    <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4">' . $repuesto["nombre_repuesto"] . '</h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">$' . number_format($repuesto["precio_repuesto"], 2) . '</h6>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    } else {
        // Si no hay filtros, cargar todos los repuestos
        $repuestos = ControladorRepuestosCards::ctrMostrarRepuestos([]);

        // Imprimir todos los repuestos obtenidos desde la base de datos
        // echo '<pre>';
        // var_dump($repuestos);
        // echo '</pre>';

        foreach ($repuestos as $repuesto) {
            echo '
            <div class="col-sm-6 col-xl-4">
                <div class="card hover-img overflow-hidden rounded-2">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="' . $repuesto["img_repuesto"] . '" class="card-img-top rounded-0" alt="' . $repuesto["nombre_repuesto"] . '"></a>
                        <a class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Añadir al Carrito"><i class="ti ti-basket fs-4"></i></a>
                    </div>
                    <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4">' . $repuesto["nombre_repuesto"] . '</h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">$' . number_format($repuesto["precio_repuesto"], 2) . '</h6>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
}
