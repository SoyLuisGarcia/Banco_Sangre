<?php
require_once "../middleware/auth.php";
require_once "../config/database.php";
require_once "../models/Cita.php";

$db = $conexion;
$citaModel = new Cita($db);

$citas = $citaModel->getByUser($_SESSION['user']['id']);
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="container-cita">

<div class="perfil-actions">
    <a href="./dashboard.php" class="btn-volver">Menú principal</a>
</div>

<h2 class="titulo">📋 Historial de Citas</h2>

<div class="card">

<h3>Información del Donante</h3>

<div class="grid-2">

<div>
<strong>Nombre:</strong> <?= $_SESSION['user']['nombre'] ?>
</div>

<div>
<strong>Correo:</strong> <?= $_SESSION['user']['correo'] ?>
</div>

</div>

</div>


<div class="card">

<h3>Mis Citas</h3>

<table class="tabla-citas">

<thead>

<tr>

<th>Fecha</th>
<th>Hora</th>
<th>Tipo</th>
<th>Sede</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

<?php foreach($citas as $cita): ?>

<tr>

<td><?= $cita['fecha'] ?></td>
<td><?= $cita['hora'] ?></td>
<td><?= $cita['tipo_donacion'] ?></td>
<td><?= $cita['sede'] ?></td>
<td><?= $cita['estado'] ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>