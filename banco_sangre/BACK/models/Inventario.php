<?php
class Inventario {

    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function listar() {
        $stmt = $this->conexion->query("
            SELECT i.*, t.tipo
            FROM inventario i
            JOIN tipos_sangre t ON i.tipo_sangre_id = t.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($data) {
        $stmt = $this->conexion->prepare("
            INSERT INTO inventario (tipo_sangre_id, cantidad_disponible, fecha_actualizacion)
            VALUES (?, ?, NOW())
        ");
        return $stmt->execute([
            $data['tipo'],
            $data['cantidad']
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM inventario WHERE id=?");
        return $stmt->execute([$id]);
    }
}