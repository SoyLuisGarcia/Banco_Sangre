<?php
require_once "../middleware/auth.php";
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banco de Sangre</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Banco Sangre</h2>

        <a href="dashboard.php">Inicio</a>

        <?php if ($user['rol'] == 'admin'): ?>
            <a href="usuarios.php">Usuarios</a>
            <a href="donantes.php">Donantes</a>
            <a href="pacientes.php">Pacientes</a>
            <a href="inventario.php">Inventario</a>
            <a href="todas_citas.php">Todas las Citas</a>
        <?php else: ?>
            <a href="agendar.php">Agendar Cita</a>
            <a href="mis_citas.php">Mis Citas</a>
            <a href="perfil.php">Mi Perfil</a>
        <?php endif; ?>

        <a href="logout.php">Cerrar sesión</a>
    </div>

    <div class="content">