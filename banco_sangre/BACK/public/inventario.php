<?php
require_once '../config/database.php';
require_once '../controllers/InventarioController.php';

$controller = new InventarioController($conexion);

if ($_POST) {
    $controller->store($_POST);
}

if (isset($_GET['delete'])) {
    $controller->destroy($_GET['delete']);
}

$inventario = $controller->index();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<h2 class="text-dark">Inventario</h2>

<form method="POST" class="row g-2 mb-4">
<select name="tipo" class="form-control col">
<?php
$tipos = $conexion->query("SELECT * FROM tipos_sangre")->fetchAll();
foreach($tipos as $t){
    echo "<option value='{$t['id']}'>{$t['tipo']}</option>";
}
?>
</select>

<input type="number" name="cantidad" placeholder="Cantidad Disponible" class="form-control col" required>

<button class="btn btn-dark">Agregar</button>
</form>

<table class="table table-bordered">
<tr>
<th>Tipo</th>
<th>Cantidad Disponible</th>
<th>Acción</th>
</tr>

<?php foreach($inventario as $i): ?>
<tr>
<td><?= $i['tipo'] ?></td>
<td><?= $i['cantidad_disponible'] ?></td>
<td>
<a href="?delete=<?= $i['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<a href="index.php" class="btn btn-secondary">Volver</a>
</div>