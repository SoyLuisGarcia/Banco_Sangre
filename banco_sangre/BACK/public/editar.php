<?php
require '../config/database.php';

$id = $_GET['id'];
$tabla = $_GET['tabla'];

$stmt = $conexion->prepare("SELECT * FROM $tabla WHERE id=?");
$stmt->execute([$id]);
$dato = $stmt->fetch();

if ($_POST) {
    $stmt = $conexion->prepare("UPDATE $tabla SET nombre=?, edad=? WHERE id=?");
    $stmt->execute([$_POST['nombre'], $_POST['edad'], $id]);
    header("Location: $tabla.php");
}
?>

<div class="container mt-5">
<form method="POST">
<input type="text" name="nombre" value="<?= $dato['nombre'] ?>" class="form-control mb-3">
<input type="number" name="edad" value="<?= $dato['edad'] ?>" class="form-control mb-3">
<button class="btn btn-warning w-100">Actualizar</button>
</form>
</div>
