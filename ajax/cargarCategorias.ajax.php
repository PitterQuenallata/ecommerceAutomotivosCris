<?php
require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

$categorias = ControladorCategorias::ctrMostrarCategorias();

foreach ($categorias as $categoria) {
    echo '
    <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
            <div class="position-relative">
                <a href="javascript:void(0)" class="card-categoria" data-id="' . $categoria["id_categoria"] . '">
                    <img src="views/dist/images/repuestos/neumaticos.png" class="card-img-top rounded-0" alt="' . $categoria["nombre_categoria"] . '">
                </a>
                <a class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver Repuestos">
                    <i class="ti ti-eye fs-4"></i>
                </a>
            </div>
            <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">' . $categoria["nombre_categoria"] . '</h6>
            </div>
        </div>
    </div>
    ';
}
