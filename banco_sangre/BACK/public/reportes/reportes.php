<?php
require_once "../middleware/auth.php";

if($_SESSION['user']['permiso'] != "admin"){
    exit("No permitido");
}
?>

<link rel="stylesheet" href="../assets/style.css">

<h1>Reportes</h1>

<div class="dashboard-cards">


<a href="reportes/dia.php">

<div class="card-dashboard">

<div class="icon-circle">📅</div>

<h3>Reporte día</h3>

<p>Ver reporte diario</p>

</div>

</a>



<a href="reportes/semana.php">

<div class="card-dashboard">

<div class="icon-circle">📆</div>

<h3>Reporte semana</h3>

<p>Ver reporte semanal</p>

</div>

</a>



<a href="reportes/mes.php">

<div class="card-dashboard">

<div class="icon-circle">🗓️</div>

<h3>Reporte mes</h3>

<p>Ver reporte mensual</p>

</div>

</a>



<a href="reportes/anio.php">

<div class="card-dashboard">

<div class="icon-circle">📊</div>

<h3>Reporte año</h3>

<p>Ver reporte anual</p>

</div>

</a>


</div>