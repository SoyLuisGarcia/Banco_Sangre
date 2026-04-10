<?php

require_once "../config/database.php";

$db = $conexion;

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];

$sql = "UPDATE users
SET nombre=?,correo=?,rol=?
WHERE id=?";

$stmt = $db->prepare($sql);

$stmt->execute([
$nombre,
$correo,
$rol,
$id
]);

header("Location: ../public/usuarios.php");