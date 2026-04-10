<?php
$host = "localhost";
$port = "3306";
$db = "banco_sangre";
$user = "root";
$pass = "";

try {
    $conexion = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>