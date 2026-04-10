<?php
require'../config/database.php';
require_once '../controllers/PacienteController.php';

$controller = new pacientes($conexion);

if ($_POST) {
    $controller->store($_POST);
}

if (isset($_GET['delete'])) {
    $controller->destroy($_GET['delete']);
}

$pacientes = $controller->index();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<h2 class="text-primary">Pacientes</h2>

<form method="POST" class="row g-2 mb-4">
<input type="text" name="nombre" placeholder="Nombre" class="form-control col" required>
<input type="text" name="hospital" placeholder="Hospital" class="form-control col" required>
<input type="number" name="cantidad" placeholder="Cantidad" class="form-control col" required>

<select name="tipo" class="form-control col">
<?php
$tipos = $conexion->query("SELECT * FROM tipos_sangre")->fetchAll();
foreach($tipos as $t){
    echo "<option value='{$t['id']}'>{$t['tipo']}</option>";
}
?>
</select>

<button class="btn btn-primary">Agregar</button>
</form>

<table class="table table-striped">
<tr>
<th>Nombre</th>
<th>Hospital</th>
<th>Tipo</th>
<th>Cantidad</th>
<th>Acción</th>
</tr>

<?php foreach($pacientes as $p): ?>
<tr>
<td><?= $p['nombre'] ?></td>
<td><?= $p['hospital'] ?></td>
<td><?= $p['tipo'] ?></td>
<td><?= $p['cantidad_requerida'] ?></td>
<td>
<a href="?delete=<?= $p['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<a href="index.php" class="btn btn-secondary">Volver</a>
</div>