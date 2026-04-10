<?php
class Donante {

    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    // Listar todos los donantes
    public function listar() {
        $stmt = $this->conexion->query("
            SELECT d.*, t.tipo 
            FROM donantes d
            JOIN tipos_sangre t ON d.tipo_sangre_id = t.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar donante
    public function agregar($data) {
        $stmt = $this->conexion->prepare("
            INSERT INTO donantes (nombre, edad, telefono, direccion, tipo_sangre_id, fecha_registro)
            VALUES (?, ?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([
            $data['nombre'],
            $data['edad'],
            $data['telefono'],
            $data['direccion'],
            $data['tipo']
        ]);
    }

    // Eliminar donante
    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM donantes WHERE id=?");
        return $stmt->execute([$id]);
    }

    // Obtener uno para editar
    public function obtener($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM donantes WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar
    public function actualizar($id, $data) {
        $stmt = $this->conexion->prepare("
            UPDATE donantes 
            SET nombre=?, edad=?, telefono=?, direccion=?, tipo_sangre_id=?
            WHERE id=?
        ");
        return $stmt->execute([
            $data['nombre'],
            $data['edad'],
            $data['telefono'],
            $data['direccion'],
            $data['tipo'],
            $id
        ]);
    }
}