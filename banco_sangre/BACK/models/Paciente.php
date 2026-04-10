<?php
class Paciente {

    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function listar() {
        $stmt = $this->conexion->query("
            SELECT p.*, t.tipo 
            FROM pacientes p
            JOIN tipos_sangre t ON p.tipo_sangre_id = t.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($data) {
        $stmt = $this->conexion->prepare("
            INSERT INTO pacientes (nombre, hospital, tipo_sangre_id, cantidad_requerida, fecha_solicitud)
            VALUES (?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([
            $data['nombre'],
            $data['hospital'],
            $data['tipo'],
            $data['cantidad']
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM pacientes WHERE id=?");
        return $stmt->execute([$id]);
    }
}