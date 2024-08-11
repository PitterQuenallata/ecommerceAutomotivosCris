<?php
require_once "../controllers/repuestosCards.controller.php";
require_once "../models/repuestosCards.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'cargarModelos' && isset($_GET['idMarca'])) {
            $modelos = ControladorRepuestosCards::ctrMostrarModelos($_GET['idMarca']);
            echo '<option value="" selected disabled>Elige un Modelo</option>';
            foreach ($modelos as $modelo) {
                echo '<option value="' . $modelo["id_modelo"] . '">' . $modelo["nombre_modelo"] . '</option>';
            }
        }

        if($_GET['action'] == 'cargarMotores' && isset($_GET['idModelo'])) {
            $motores = ControladorRepuestosCards::ctrMostrarMotores($_GET['idModelo']);
            echo '<option value="" selected disabled>Elige un Motor</option>';
            foreach ($motores as $motor) {
                echo '<option value="' . $motor["id_motor"] . '">' . $motor["nombre_motor"] . '</option>';
            }
        }
    }
}
