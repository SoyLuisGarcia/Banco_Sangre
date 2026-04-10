<?php

require_once "../middleware/auth.php";
require_once "../config/database.php";

if($_SESSION['user']['permiso'] != "admin"){
    exit("No permitido");
}

$db = $conexion;

$sql = "SELECT * FROM citas";

$stmt = $db->query($sql);

$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="../assets/style.css">

<h1>Gestión de citas</h1>

<div class="card">

<table class="tabla-citas">

<tr>

<th>ID</th>
<th>Usuario</th>
<th>Fecha</th>
<th>Hora</th>
<th>Acciones</th>

</tr>

<?php foreach($citas as $c){ ?>

<tr>

<td><?= $c['id'] ?></td>
<td><?= $c['user_id'] ?></td>
<td><?= $c['fecha'] ?></td>
<td><?= $c['hora'] ?></td>

<td>

<a href="editar_cita.php?id=<?= $c['id'] ?>">
<button>Editar</button>
</a>

<a href="../controllers/eliminar_cita.php?id=<?= $c['id'] ?>">
<button class="btn-danger">Eliminar</button>
</a>

</td>

</tr>

<?php } ?>

</table>

</div>