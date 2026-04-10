<?php
session_start();
require_once "../config/database.php";

$db = $conexion;

$id = $_SESSION['user']['id'];

$sql = "SELECT * FROM users WHERE id=?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="perfil-page">

<div class="perfil-wrapper">

<h2 class="main-name">Editar perfil</h2>

<form action="actualizar_perfil.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $user['id'] ?>">

<div class="perfil-grid">

<div>
<label>Nombre</label>
<input type="text" name="nombre" value="<?= $user['nombre'] ?>" required>
</div>

<div>
<label>Correo</label>
<input type="email" name="correo" value="<?= $user['correo'] ?>" required>
</div>

<div>
<label>Teléfono</label>
<input type="text" name="telefono" value="<?= $user['telefono'] ?>">
</div>

<div>
<label>Tipo sanguíneo</label>
<select name="tipo_sanguineo">

<option value="A+" <?= $user['tipo_sanguineo']=="A+"?"selected":"" ?>>A+</option>
<option value="A-" <?= $user['tipo_sanguineo']=="A-"?"selected":"" ?>>A-</option>
<option value="B+" <?= $user['tipo_sanguineo']=="B+"?"selected":"" ?>>B+</option>
<option value="B-" <?= $user['tipo_sanguineo']=="B-"?"selected":"" ?>>B-</option>
<option value="AB+" <?= $user['tipo_sanguineo']=="AB+"?"selected":"" ?>>AB+</option>
<option value="AB-" <?= $user['tipo_sanguineo']=="AB-"?"selected":"" ?>>AB-</option>
<option value="O+" <?= $user['tipo_sanguineo']=="O+"?"selected":"" ?>>O+</option>
<option value="O-" <?= $user['tipo_sanguineo']=="O-"?"selected":"" ?>>O-</option>

</select>
</div>

<div>
<label>Ciudad</label>
<input type="text" name="ciudad" value="<?= $user['ciudad'] ?>">
</div>

<div>
<label>Foto de perfil</label>
<input type="file" name="imagen">
</div>

</div>

<br>

<div class="perfil-buttons">

<button type="submit" class="btn-perfil">
Guardar cambios
</button>

<a href="perfil.php">
<button type="button" class="btn-perfil">
Cancelar
</button>
</a>

</div>

</form>

</div>
</div>