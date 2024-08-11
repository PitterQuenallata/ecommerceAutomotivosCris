<?php
require_once "../controllers/repuestosCards.controller.php";
require_once "../models/repuestosCards.model.php";

if(isset($_POST['action'])) {
    if($_POST['action'] == 'cargarModelos' && isset($_POST['idMarca'])) {
        $modelos = ControladorRepuestosCards::ctrMostrarModelos($_POST['idMarca']);
        echo '<option selected disabled>Elige un Modelo</option>';
        foreach ($modelos as $modelo) {
            echo '<option value="' . $modelo["id_modelo"] . '">' . $modelo["nombre_modelo"] . '</option>';
        }
    }

    if($_POST['action'] == 'cargarMotores' && isset($_POST['idModelo'])) {
        $motores = ControladorRepuestosCards::ctrMostrarMotores($_POST['idModelo']);
        echo '<option selected disabled>Elige un Motor</option>';
        foreach ($motores as $motor) {
            echo '<option value="' . $motor["id_motor"] . '">' . $motor["nombre_motor"] . '</option>';
        }
    }
}
