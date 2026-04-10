<?php

require_once "../config/database.php";

$db = $conexion;

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=?";

$stmt = $db->prepare($sql);

$stmt->execute([$id]);

header("Location: ../public/usuarios.php");