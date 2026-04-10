<?php

require_once "../config/database.php";

$db = $conexion;

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$rol = $_POST['rol'];

$sql = "INSERT INTO users(nombre,correo,password,rol)
VALUES(?,?,?,?)";

$stmt = $db->prepare($sql);

$stmt->execute([
$nombre,
$correo,
$password,
$rol
]);

header("Location: ../public/usuarios.php");