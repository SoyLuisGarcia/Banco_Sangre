<?php

class User {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($nombre, $correo, $telefono, $password) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Verificar si ya existe un admin
        $check = $this->db->query("SELECT COUNT(*) FROM users WHERE rol='admin'");
        $adminExiste = $check->fetchColumn();

        // Primer usuario será admin
        $rol = ($adminExiste == 0) ? 'admin' : 'usuario';

        $sql = "INSERT INTO users (nombre, correo, telefono, password, rol)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$nombre, $correo, $telefono, $hash, $rol]);
    }

    public function promoverAdmin($id) {
        $sql = "UPDATE users SET rol='admin' WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function login($correo, $password) {

        $sql = "SELECT * FROM users WHERE correo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$correo]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function getById($id){

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);

}
}