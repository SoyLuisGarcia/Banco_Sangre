<?php
require_once "../middleware/auth.php";
require_once "../config/database.php";

$db = $conexion;
$id = $_SESSION['user']['id'];

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="perfil-page">

<div class="perfil-wrapper">

    <!-- FOTO -->
    <div class="avatar-section">
        <div class="circular-frame">
            <img src="uploads/<?= $user['imagen'] ?? 'avatar.png' ?>" class="perfil-avatar">
        </div>
    </div>

    <!-- NOMBRE -->
    <h2 class="main-name"><?= $user['nombre'] ?></h2>

    <!-- INFO -->
    <div class="perfil-grid">

        <p><strong>Correo:</strong> <?= $user['correo'] ?></p>

        <p><strong>Teléfono:</strong> <?= $user['telefono'] ?></p>

        <p><strong>Rol:</strong> <?= $user['rol'] ?></p>

        <p><strong>Tipo sanguíneo:</strong> <?= $user['tipo_sanguineo'] ?? 'No registrado' ?></p>

        <p><strong>Ciudad:</strong> <?= $user['ciudad'] ?? 'No registrada' ?></p>

        <p><strong>Usuario ID:</strong> <?= $user['id'] ?></p>

    </div>

    <!-- BOTONES -->
    <div class="perfil-buttons">

        <a href="editar_perfil.php">
            <button class="btn-perfil">Editar perfil</button>
        </a>

        <?php
            $permiso = $_SESSION['user']['permiso'];

            if($permiso == "admin"){
                $menu = "admin_dashboard.php";
            }else{
                $menu = "dashboard.php";
            }
        ?>

            <a href="<?= $menu ?>">
            <button class="btn-perfil">Menú principal</button>
            </a>
        <a href="logout.php">
            <button class="btn-perfil logout">Cerrar sesión</button>
        </a>

    </div>     

</div>
</div>