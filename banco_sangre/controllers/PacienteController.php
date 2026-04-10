<?php
require_once '../models/Paciente.php';

class pacientes{

    private $model;

    public function __construct($db) {
        $this->model = new Paciente($db);
    }

    public function index() {
        return $this->model->listar();
    }

    public function store($data) {
        return $this->model->agregar($data);
    }

    public function destroy($id) {
        return $this->model->eliminar($id);
    }
}