<?php
require_once "../middleware/admin.php";
require_once "../config/database.php";

$db = $conexion;

$sql = "SELECT * FROM citas WHERE DATE(fecha)=CURDATE()";

$stmt = $db->query($sql);

$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Reporte del día</h1>

<table border="1">

<tr>
<th>ID</th>
<th>Usuario</th>
<th>Fecha</th>
</tr>

<?php foreach($citas as $c){ ?>

<tr>

<td><?= $c['id'] ?></td>
<td><?= $c['user_id'] ?></td>
<td><?= $c['fecha'] ?></td>

</tr>

<?php } ?>

</table>