<?php
require '../config/database.php';
require '../controllers/donantesController.php';

$controller = new donantes($conexion);

// Agregar
if ($_POST && !isset($_POST['update'])) {
    $controller->store($_POST);
}

// Actualizar
if (isset($_POST['update'])) {
    $controller->update($_POST['id'], $_POST);
}

// Eliminar
if (isset($_GET['delete'])) {
    $controller->destroy($_GET['delete']);
}

$donantes = $controller->index();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<h2 class="text-danger">Donantes</h2>

<form method="POST" class="row g-2 mb-4">

<input type="hidden" name="id" id="id">

<input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control col" required>
<input type="number" name="edad" id="edad" placeholder="Edad" class="form-control col" required>
<input type="text" name="telefono" id="telefono" placeholder="Teléfono" class="form-control col">
<input type="text" name="direccion" id="direccion" placeholder="Dirección" class="form-control col">

<select name="tipo" id="tipo" class="form-control col">
<?php
$tipos = $conexion->query("SELECT * FROM tipos_sangre")->fetchAll();
foreach($tipos as $t){
    echo "<option value='{$t['id']}'>{$t['tipo']}</option>";
}
?>
</select>

<button class="btn btn-danger">Guardar</button>

</form>

<table class="table table-striped shadow">
<tr>
<th>Nombre</th>
<th>Edad</th>
<th>Tipo</th>
<th>Teléfono</th>
<th>Acciones</th>
</tr>

<?php foreach($donantes as $d): ?>
<tr>
<td><?= $d['nombre'] ?></td>
<td><?= $d['edad'] ?></td>
<td><?= $d['tipo'] ?></td>
<td><?= $d['telefono'] ?></td>
<td>
<a href="?delete=<?= $d['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<a href="index.php" class="btn btn-secondary">Volver</a>
</div>