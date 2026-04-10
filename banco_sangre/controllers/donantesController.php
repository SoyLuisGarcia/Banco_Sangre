<?php
require_once '../models/Donante.php';

class donantes {

    private $model;

    public function __construct($db) {
        $this->model = new Donante($db);
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

    public function edit($id) {
        return $this->model->obtener($id);
    }

    public function update($id, $data) {
        return $this->model->actualizar($id, $data);
    }
}