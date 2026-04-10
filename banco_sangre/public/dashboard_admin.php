<?php

require_once "../middleware/auth.php";

if ($_SESSION['user']['permiso'] != "admin") {
    header("Location: dashboard.php");
    exit;
}

$nombre = $_SESSION['user']['nombre'];

?>

<link rel="stylesheet" href="../assets/style.css">

<h1>Bienvenido, <?= $nombre ?></h1>

<p>Panel de administración del sistema.</p>


<div class="dashboard-cards">


<a href="usuarios.php" style="text-decoration:none;">

<div class="card-dashboard">

<div class="icon-circle">👥</div>

<h3>Usuarios</h3>

<p>Administrar usuarios</p>

</div>

</a>



<a href="citas_admin.php" style="text-decoration:none;">

<div class="card-dashboard">

<div class="icon-circle">📅</div>

<h3>Citas</h3>

<p>Gestionar citas</p>

</div>

</a>



<a href="reportes.php" style="text-decoration:none;">

<div class="card-dashboard">

<div class="icon-circle">📄</div>

<h3>Reportes</h3>

<p>Reportes del sistema</p>

</div>

</a>



<a href="inventario.php" style="text-decoration:none;">

<div class="card-dashboard">

<div class="icon-circle">🩸</div>

<h3>Inventario</h3>

<p>Control de sangre</p>

</div>

</a>



<a href="perfil.php" style="text-decoration:none;">

<div class="card-dashboard">

<div class="icon-circle">⚙️</div>

<h3>Ajustes</h3>

<p>Configurar perfil</p>

</div>

</a>



<a href="../controllers/logout.php" style="text-decoration:none;">

<div class="card-dashboard">

<div class="icon-circle">🚪</div>

<h3>Salir</h3>

<p>Cerrar sesión</p>

</div>

</a>


</div>