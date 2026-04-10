<?php
require '../config/database.php';

$tabla = $_GET['tabla'];

if ($_POST) {

    if ($tabla == "donantes") {
        $stmt = $conexion->prepare("INSERT INTO donantes (nombre, edad, tipo_sangre_id, fecha_registro) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$_POST['nombre'], $_POST['edad'], $_POST['tipo']]);
    }

    header("Location: $tabla.php");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<h3>Agregar <?= ucfirst($tabla) ?></h3>

<form method="POST">
<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-3" required>
<input type="number" name="edad" placeholder="Edad" class="form-control mb-3" required>

<select name="tipo" class="form-control mb-3">
<?php
$tipos = $conexion->query("SELECT * FROM tipos_sangre")->fetchAll();
foreach($tipos as $t){
    echo "<option value='{$t['id']}'>{$t['tipo']}</option>";
}
?>
</select>

<button class="btn btn-danger w-100">Guardar</button>
</form>
</div>