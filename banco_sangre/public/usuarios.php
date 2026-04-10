<?php

require_once "../middleware/auth.php";
require_once "../config/database.php";

if($_SESSION['user']['permiso'] != "admin"){
    exit("No permitido");
}

$db = $conexion;

$sql = "SELECT * FROM users";

$stmt = $db->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="../assets/style.css">

<h1>Usuarios</h1>

<div class="card">

<a href="agregar_usuario.php">
<button>Agregar usuario</button>
</a>

<table>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Correo</th>
<th>Permiso</th>
<th>Acciones</th>

</tr>

<?php foreach($users as $u){ ?>

<tr>

<td><?= $u['id'] ?></td>
<td><?= $u['nombre'] ?></td>
<td><?= $u['correo'] ?></td>
<td><?= $u['permiso'] ?></td>

<td>

<a href="editar_usuario.php?id=<?= $u['id'] ?>">
<button>Editar</button>
</a>

<a href="../controllers/eliminar_usuario.php?id=<?= $u['id'] ?>">
<button class="btn-danger">Eliminar</button>
</a>

</td>

</tr>

<?php } ?>

</table>

</div>