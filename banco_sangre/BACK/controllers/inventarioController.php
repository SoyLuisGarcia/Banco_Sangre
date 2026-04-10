<?php

require_once '../models/Inventario.php';

class InventarioController {

    private $model;

    public function __construct($conexion) {
        $this->model = new Inventario($conexion);
    }

    public function index() {
        return $this->model->listar();
    }
}