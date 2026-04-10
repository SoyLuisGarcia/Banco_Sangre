<?php
require '../config/database.php';

$id = $_GET['id'];
$tabla = $_GET['tabla'];

$stmt = $conexion->prepare("DELETE FROM $tabla WHERE id=?");
$stmt->execute([$id]);

header("Location: $tabla.php");