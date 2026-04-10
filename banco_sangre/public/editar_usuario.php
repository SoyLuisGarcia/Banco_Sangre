<?php

require_once "../config/database.php";

$db = $conexion;

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id=?";

$stmt = $db->prepare($sql);

$stmt->execute([$id]);

$user = $stmt->fetch();

?>

<form action="../controllers/actualizar_usuario.php" method="POST">

<input type="hidden" name="id" value="<?= $user['id'] ?>">

Nombre
<input name="nombre" value="<?= $user['nombre'] ?>">

Correo
<input name="correo" value="<?= $user['correo'] ?>">

Rol
<select name="rol">

<option value="usuario">Usuario</option>
<option value="admin">Admin</option>

</select>

<button>Actualizar</button>

</form>