<?php
require_once "../middleware/auth.php";
require_once "../config/database.php";


require_once "../middleware/auth.php";

if($_SESSION['user']['permiso'] == "admin"){
    header("Location: admin_dashboard.php");
    exit;
}



$user_id = $_SESSION['user']['id'];

// Consultas de base de datos
$stmt = $conexion->prepare("SELECT COUNT(*) FROM citas WHERE user_id = ?");
$stmt->execute([$user_id]);
$total_citas = $stmt->fetchColumn();

$stmt = $conexion->prepare("SELECT COUNT(*) FROM citas WHERE user_id = ? AND estado = 'Completada'");
$stmt->execute([$user_id]);
$donaciones = $stmt->fetchColumn();

$stmt = $conexion->prepare("SELECT fecha FROM citas WHERE user_id = ? AND fecha >= CURDATE() ORDER BY fecha ASC LIMIT 1");
$stmt->execute([$user_id]);
$proxima = $stmt->fetchColumn();

// Consulta para la tabla de historial (limitada a 5 para el dashboard)
$stmt = $conexion->prepare("SELECT * FROM citas WHERE user_id = ? ORDER BY fecha DESC LIMIT 5");
$stmt->execute([$user_id]);
$historial = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Banco de Sangre</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="content">
    <header class="dashboard-header">
        <h1>Bienvenido, <?= $_SESSION['user']['nombre'] ?></h1>
        <p>Gestiona tus citas y perfil de manera profesional.</p>
    </header>

    <div class="dashboard-cards">
        <a href="agendar.php" class="card-dashboard">
            <div class="icon-circle">🗓</div>
            <h3>Agendar cita</h3>
            <p>Revisa fechas disponibles</p>
        </a>
        <a href="mis_citas.php" class="card-dashboard">
            <div class="icon-circle">📋</div>
            <h3>Historial</h3>
            <p>Revisa tus citas pasadas</p>
        </a>
        <a href="#" class="card-dashboard">
            <div class="icon-circle">❤️</div>
            <h3>Donador</h3>
            <p>Campañas de donación</p>
        </a>
        <a href="perfil.php" class="card-dashboard">
            <div class="icon-circle">⚙</div>
            <h3>Ajustes</h3>
            <p>Modificar información</p>
        </a>
    </div>

    <div class="info-panel">
        <h2>Panel de información</h2>
        <div class="info-grid">
            <div class="info-box">
                <h4>📊 Estadísticas Personales</h4>
                <div class="stat-row"><strong>Citas agendadas:</strong> <span><?= $total_citas ?></span></div>
                <div class="stat-row"><strong>Donaciones:</strong> <span><?= $donaciones ?></span></div>
                <div class="stat-row"><strong>Próxima cita:</strong> <span><?= $proxima ?: "Sin programar" ?></span></div>
            </div>
            <div class="info-box">
                <h4>🏥 Campaña Actual</h4>
                <p><strong>Campaña:</strong> Donación para pediátricos</p>
                <p><strong>Lugar:</strong> Hospital General de Tuxtla</p>
                <p class="blood-note">Cada donación puede salvar hasta 3 vidas.</p>
            </div>
            <div class="info-box">
                <h4>🩸 Requisitos Médicos</h4>
                <ul>
                    <li>Peso mínimo de 50 kg</li>
                    <li>Edad: 18 a 65 años</li>
                    <li>No haber donado en 3 meses</li>
                </ul>
            </div>
            <div class="info-box">
                <h4>✔ Recomendaciones</h4>
                <ul>
                    <li>Ayuno ligero de 4 horas</li>
                    <li>Hidratación constante</li>
                    <li>No consumir alcohol 24hrs antes</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="table-container">
        <h3>Historial Reciente de Citas</h3>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hospital</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($historial as $cita): ?>
                <tr>
                    <td><?= $cita['fecha'] ?></td>
                    <td>Hospital General</td>
                    <td><span class="status-badge <?= strtolower($cita['estado']) ?>"><?= $cita['estado'] ?></span></td>
                    <td><a href="#" class="btn-action">Ver detalles</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>