<?php
require_once "../middleware/admin.php";
require_once "../config/database.php";

$db = $conexion;

$sql = "SELECT * FROM users";

$stmt = $db->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Usuarios</h1>

<table border="1">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Correo</th>
<th>Rol</th>
</tr>

<?php foreach($users as $u){ ?>

<tr>

<td><?= $u['id'] ?></td>
<td><?= $u['nombre'] ?></td>
<td><?= $u['correo'] ?></td>
<td><?= $u['rol'] ?></td>

</tr>

<?php } ?>

</table>